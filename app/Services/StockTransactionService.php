<?php

namespace App\Services;

use App\Models\StockTransaction;
use App\Repositories\Contracts\StockTransactionRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StockTransactionService
{
    public function __construct(private readonly StockTransactionRepositoryInterface $stockTransactions)
    {
    }

    public function getAll(): Collection
    {
        return $this->stockTransactions->getAll();
    }

    public function findById(int $id): ?StockTransaction
    {
        return $this->stockTransactions->findById($id);
    }

    public function create(array $data): StockTransaction
    {
        return $this->stockTransactions->create($data);
    }

    public function delete(StockTransaction $stockTransaction): bool
    {
        return $this->stockTransactions->delete($stockTransaction);
    }
}
