<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(private readonly CategoryRepositoryInterface $categories)
    {
    }

    public function getAll(): Collection
    {
        return $this->categories->all();
    }

    public function findById(int $id): ?Category
    {
        return $this->categories->findById($id);
    }

    public function create(array $data): Category
    {
        return $this->categories->create($data);
    }

    public function update(int $id, array $data): ?Category
    {
        return $this->categories->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->categories->delete($id);
    }
}
