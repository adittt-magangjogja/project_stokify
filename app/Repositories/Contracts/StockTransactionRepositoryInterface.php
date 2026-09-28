<?php

namespace App\Repositories\Contracts;

use App\Models\StockTransaction;
use Illuminate\Database\Eloquent\Collection;

interface StockTransactionRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?StockTransaction;

    public function create(array $data): StockTransaction;

    public function delete(StockTransaction $stockTransaction): bool;
}
