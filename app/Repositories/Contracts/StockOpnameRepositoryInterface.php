<?php

namespace App\Repositories\Contracts;

use App\Models\StockOpname;
use Illuminate\Database\Eloquent\Collection;

interface StockOpnameRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): ?StockOpname;

    public function create(array $data): StockOpname;

    public function delete(StockOpname $stockOpname): bool;
}
