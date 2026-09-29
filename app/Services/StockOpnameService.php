<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Repositories\Contracts\{ProductRepositoryInterface, StockOpnameRepositoryInterface};
use Illuminate\Support\Facades\DB;

class StockOpnameService
{
    public function __construct(
        private StockOpnameRepositoryInterface $opnames,
        private ProductRepositoryInterface $products,
    ) {}

    public function list() { return $this->opnames->paginate(); }

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {
            $product = $this->products->find($data['product_id']);
            $diff = $data['physical_stock'] - $product->stock;

            $opname = $this->opnames->create([
                'product_id' => $product->id,
                'user_id' => auth()->id(),
                'system_stock' => $product->stock,
                'physical_stock' => $data['physical_stock'],
                'difference' => $diff,
                'note' => $data['note'] ?? null,
                'opname_date' => $data['opname_date'] ?? now()->toDateString(),
            ]);

            if ($diff !== 0) $this->products->adjustStock($product->id, $diff);
            ActivityLog::record('stock_opname', "Opname {$product->name}, selisih {$diff}");

            return $opname;
        });
    }
}