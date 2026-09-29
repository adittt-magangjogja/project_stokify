<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        protected CategoryRepositoryInterface $categoryRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->categoryRepository->all();
    }

    public function findById(int $id): ?Category
    {
        return $this->categoryRepository->findById($id);
    }

    public function create(array $data): Category
    {
        return $this->categoryRepository->create($data);
    }

    public function update(Category $category, array $data): ?Category
    {
        return $this->categoryRepository->update($category->id, $data);
    }

    public function delete(Category $category): bool
    {
        return $this->categoryRepository->delete($category->id);
    }
}