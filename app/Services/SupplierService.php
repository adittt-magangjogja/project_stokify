<?php

namespace App\Services;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierService
{
    public function __construct(
        protected SupplierRepositoryInterface $supplierRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->supplierRepository->all();
    }

    public function findById(int $id): ?Supplier
    {
        return $this->supplierRepository->findById($id);
    }

    public function create(array $data): Supplier
    {
        return $this->supplierRepository->create($data);
    }

    public function update(Supplier $supplier, array $data): ?Supplier
    {
        return $this->supplierRepository->update($supplier->id, $data);
    }

    public function delete(Supplier $supplier): bool
    {
        return $this->supplierRepository->delete($supplier->id);
    }
}