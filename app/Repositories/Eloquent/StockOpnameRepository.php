<?php

namespace App\Repositories\Eloquent;

use App\Models\StockOpname;
use App\Repositories\Contracts\StockOpnameRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StockOpnameRepository implements StockOpnameRepositoryInterface
{
    public function getAll(): Collection
    {
        return StockOpname::all();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return StockOpname::with(['product', 'user'])->latest('opname_date')->paginate($perPage);
    }

    public function findById(int $id): ?StockOpname
    {
        return StockOpname::find($id);
    }

    public function create(array $data): StockOpname
    {
        return StockOpname::create($data);
    }

    public function delete(StockOpname $stockOpname): bool
    {
        return $stockOpname->delete();
    }
}
