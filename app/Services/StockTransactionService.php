<?php

namespace App\Services;

use App\Repositories\Contracts\{ProductRepositoryInterface, StockTransactionRepositoryInterface};
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Models\Product;

class StockTransactionService
{
    public function __construct(
        private StockTransactionRepositoryInterface $transactions,
        private ProductRepositoryInterface $products,
        private ActivityLogService $activity,
    ) {}

    public function list(array $filters)
    {
        return $this->transactions->paginate($filters);
    }

    public function pending()
    {
        return $this->transactions->pending();
    }

    public function dailyConfirmedTotals($from, $to)
    {
        return $this->transactions->dailyConfirmedTotals($from, $to);
    }

    // Dibuat Manajer -> status pending
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            if ($existing = $this->transactions->findByRequestKey($data['request_key'])) {
                return $existing;
            }

            // Serialize outgoing reservations for this product, including simultaneous submissions.
            $product = Product::whereKey($data['product_id'])->lockForUpdate()->firstOrFail();
            // A parallel duplicate may have completed while this request waited for the row lock.
            if ($existing = $this->transactions->findByRequestKey($data['request_key'])) {
                return $existing;
            }
            if ($data['type'] === 'out') {
                $available = $product->stock - $this->transactions->pendingOutgoingQuantity($product->id);
                if ($available < $data['quantity']) {
                    throw ValidationException::withMessages([
                        'quantity' => "Stok tersedia untuk diajukan hanya {$available}.",
                    ]);
                }
                $data['supplier_id'] = null;
            }

            $data['user_id'] = auth()->id();
            $data['status'] = 'pending';
            $data['transaction_date'] ??= now()->toDateString();

            $trx = $this->transactions->create($data);
            $this->activity->record('create_transaction', "Transaksi {$trx->type} #{$trx->id} dibuat");
            return $trx;
        });
    }

    public function availableStock(int $productId): int
    {
        $product = $this->products->find($productId);
        return max(0, $product->stock - $this->transactions->pendingOutgoingQuantity($productId));
    }

    // Dikonfirmasi Staff -> stok berubah
    public function confirm(int $id)
    {
        return DB::transaction(function () use ($id) {
            $trx = $this->transactions->findForUpdate($id);

            if ($trx->status !== 'pending') {
                throw ValidationException::withMessages(['transaction' => 'Transaksi sudah dikonfirmasi.']);
            }

            $product = $this->products->find($trx->product_id);
            if ($trx->type === 'out' && $product->stock < $trx->quantity) {
                throw ValidationException::withMessages(['quantity' => "Stok {$product->name} tidak cukup (tersisa {$product->stock})."]);
            }

            $this->products->adjustStock($trx->product_id, $trx->type === 'in' ? $trx->quantity : -$trx->quantity);

            $trx = $this->transactions->update($trx, [
                'status' => 'confirmed',
                'confirmed_by' => auth()->id(),
                'confirmed_at' => now(),
            ]);
            $this->activity->record('confirm_transaction', "Transaksi {$trx->type} #{$trx->id} dikonfirmasi");

            return $trx;
        });
    }
}
