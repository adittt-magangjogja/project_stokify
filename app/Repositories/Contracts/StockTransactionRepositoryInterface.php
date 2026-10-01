<?php

namespace App\Repositories\Contracts;

use App\Models\StockTransaction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface StockTransactionRepositoryInterface
{
    public function all(): Collection;

    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator;

    public function find(int $id): ?StockTransaction;

    public function findForUpdate(int $id): ?StockTransaction;

    public function pending(): Collection;

    public function create(array $data): StockTransaction;

    public function update(StockTransaction $stockTransaction, array $data): StockTransaction;

    public function delete(StockTransaction $stockTransaction): bool;

    public function getByType(string $type): Collection;

    public function getByStatus(string $status): Collection;

    public function dailyConfirmedTotals($from, $to): \Illuminate\Support\Collection;
}
