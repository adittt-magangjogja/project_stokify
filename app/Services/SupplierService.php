<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierService
{
    public function __construct(private readonly SupplierRepositoryInterface $suppliers)
    {
    }

    public function getAll(): Collection
    {
        return $this->suppliers->all();
    }

    public function findById(int $id): ?Supplier
    {
        return $this->suppliers->findById($id);
    }

    public function create(array $data): Supplier
    {
        return $this->suppliers->create($data);
    }

    public function update(int $id, array $data): ?Supplier
    {
        return $this->suppliers->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->suppliers->delete($id);
    }
}
