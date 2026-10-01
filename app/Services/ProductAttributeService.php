<?php

namespace App\Services;

use App\Models\ProductAttribute;
use App\Repositories\Contracts\ProductAttributeRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ProductAttributeService
{
    public function __construct(private ProductAttributeRepositoryInterface $attributes) {}

    public function all() { return $this->attributes->all(); }
    public function list(): LengthAwarePaginator { return $this->attributes->paginate(); }
    public function create(array $data): ProductAttribute { return $this->attributes->create($data); }
    public function update(ProductAttribute $attribute, array $data): ProductAttribute { return $this->attributes->update($attribute, $data); }
    public function delete(ProductAttribute $attribute): bool { return $this->attributes->delete($attribute); }
}
