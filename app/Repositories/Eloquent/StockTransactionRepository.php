<?php

namespace App\Repositories\Eloquent;

use App\Models\StockTransaction;
use App\Repositories\Contracts\StockTransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StockTransactionRepository implements StockTransactionRepositoryInterface
{
    public function getAll(): Collection
    {
        return StockTransaction::with(['product', 'user'])
            ->latest('transaction_date')
            ->get();
    }

    public function findById(int $id): ?StockTransaction
    {
        return StockTransaction::with(['product', 'user'])->find($id);
    }

    public function create(array $data): StockTransaction
    {
        return StockTransaction::create($data);
    }

    public function delete(StockTransaction $stockTransaction): bool
    {
        return (bool) $stockTransaction->delete();
    }
}
