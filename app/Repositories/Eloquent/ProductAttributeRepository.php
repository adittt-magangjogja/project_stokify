<?php

namespace App\Repositories\Eloquent;

use App\Models\ProductAttribute;
use App\Repositories\Contracts\ProductAttributeRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductAttributeRepository implements ProductAttributeRepositoryInterface
{
    public function all(): \Illuminate\Database\Eloquent\Collection
    {
        return ProductAttribute::with('categories:id,name')->orderBy('name')->get();
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return ProductAttribute::withCount('values')->orderBy('name')->paginate($perPage);
    }

    public function create(array $data): ProductAttribute
    {
        return ProductAttribute::create($data);
    }

    public function update(ProductAttribute $attribute, array $data): ProductAttribute
    {
        $attribute->update($data);
        return $attribute->refresh();
    }

    public function delete(ProductAttribute $attribute): bool
    {
        return (bool) $attribute->delete();
    }
}
