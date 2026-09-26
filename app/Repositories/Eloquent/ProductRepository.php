<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(): Collection
    {
        return Product::with(['category', 'supplier'])
            ->orderBy('name')
            ->get();
    }

    public function findById(int $id): ?Product
    {
        return Product::with(['category', 'supplier'])->find($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);

        return $product->refresh()->load(['category', 'supplier']);
    }

    public function delete(Product $product): bool
    {
        return (bool) $product->delete();
    }
}
