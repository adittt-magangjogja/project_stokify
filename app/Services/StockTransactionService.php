<?php

namespace App\Services;

use App\Repositories\Contracts\{ProductRepositoryInterface, StockTransactionRepositoryInterface};
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

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
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        $data['transaction_date'] ??= now()->toDateString();
        if ($data['type'] === 'out') $data['supplier_id'] = null;

        $trx = $this->transactions->create($data);
        $this->activity->record('create_transaction', "Transaksi {$trx->type} #{$trx->id} dibuat");

        return $trx;
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
