<?php

namespace App\Repositories\Eloquent;

use App\Models\StockOpname;
use App\Repositories\Contracts\StockOpnameRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StockOpnameRepository implements StockOpnameRepositoryInterface
{
    public function getAll(): Collection
    {
        return StockOpname::with(['product', 'user'])
            ->latest()
            ->get();
    }

    public function findById(int $id): ?StockOpname
    {
        return StockOpname::with(['product', 'user'])
            ->find($id);
    }

    public function create(array $data): StockOpname
    {
        return StockOpname::create($data);
    }

    public function delete(StockOpname $stockOpname): bool
    {
        return (bool) $stockOpname->delete();
    }
}