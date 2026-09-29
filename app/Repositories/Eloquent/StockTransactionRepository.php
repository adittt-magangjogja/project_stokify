<?php

namespace App\Repositories\Eloquent;

use App\Models\StockTransaction;
use App\Repositories\Contracts\StockTransactionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class StockTransactionRepository implements StockTransactionRepositoryInterface
{
    public function __construct(protected StockTransaction $model)
    {
    }

    public function all(): Collection
    {
        return $this->model
            ->with(['product', 'supplier', 'user'])
            ->latest('transaction_date')
            ->get();
    }

    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = $this->model->with(['product', 'supplier', 'user']);

        if (! empty($filters['type'])) {
            $query->where('type', $filters['type']);
        }

        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (! empty($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }
        if (! empty($filters['from'])) $query->whereDate('transaction_date', '>=', $filters['from']);
        if (! empty($filters['to'])) $query->whereDate('transaction_date', '<=', $filters['to']);

        return $query->latest('transaction_date')->paginate($perPage);
    }

    public function find(int $id): ?StockTransaction
    {
        return $this->model
            ->with(['product', 'supplier', 'user', 'confirmer'])
            ->find($id);
    }

    public function findForUpdate(int $id): ?StockTransaction
    {
        return $this->model
            ->where('id', $id)
            ->lockForUpdate()
            ->first();
    }

    public function pending(): Collection
    {
        return $this->model
            ->with(['product', 'supplier', 'user'])
            ->where('status', 'pending')
            ->latest('transaction_date')
            ->get();
    }

    public function create(array $data): StockTransaction
    {
        return $this->model->create($data);
    }

    public function update(StockTransaction $stockTransaction, array $data): StockTransaction
    {
        $stockTransaction->update($data);

        return $stockTransaction->fresh();
    }

    public function delete(StockTransaction $stockTransaction): bool
    {
        return (bool) $stockTransaction->delete();
    }

    public function getByType(string $type): Collection
    {
        return $this->model
            ->with(['product', 'supplier'])
            ->where('type', $type)
            ->latest('transaction_date')
            ->get();
    }

    public function getByStatus(string $status): Collection
    {
        return $this->model
            ->with(['product', 'supplier'])
            ->where('status', $status)
            ->latest('transaction_date')
            ->get();
    }
}
