<?php

namespace App\Services;

use App\Models\StockOpname;
use App\Repositories\Contracts\StockOpnameRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StockOpnameService
{
    public function __construct(private readonly StockOpnameRepositoryInterface $stockOpnames)
    {
    }

    public function getAll(): Collection
    {
        return $this->stockOpnames->getAll();
    }

    public function findById(int $id): ?StockOpname
    {
        return $this->stockOpnames->findById($id);
    }

    public function create(array $data): StockOpname
    {
        return $this->stockOpnames->create($data);
    }

    public function delete(StockOpname $stockOpname): bool
    {
        return $this->stockOpnames->delete($stockOpname);
    }
}
