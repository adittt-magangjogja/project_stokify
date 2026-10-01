<?php

namespace App\Repositories\Contracts;

use App\Models\ProductAttribute;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductAttributeRepositoryInterface
{
    public function all(): \Illuminate\Database\Eloquent\Collection;
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function create(array $data): ProductAttribute;
    public function update(ProductAttribute $attribute, array $data): ProductAttribute;
    public function delete(ProductAttribute $attribute): bool;
}
