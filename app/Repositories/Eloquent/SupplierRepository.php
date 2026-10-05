<?php

namespace App\Repositories\Eloquent;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function all(): Collection
    {
        return Supplier::query()->with('category')->orderBy('name')->get();
    }

    public function findById(int $id): ?Supplier
    {
        return Supplier::query()->find($id);
    }

    public function create(array $data): Supplier
    {
        return Supplier::query()->create($data);
    }

    public function update(int $id, array $data): ?Supplier
    {
        $supplier = $this->findById($id);

        if ($supplier === null) {
            return null;
        }

        $supplier->update($data);

        return $supplier->refresh();
    }

    public function delete(int $id): bool
    {
        $supplier = $this->findById($id);

        return $supplier !== null && (bool) $supplier->delete();
    }
}
