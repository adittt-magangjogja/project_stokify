<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): Collection
    {
        return Category::query()->orderBy('name')->get();
    }

    public function findById(int $id): ?Category
    {
        return Category::query()->find($id);
    }

    public function create(array $data): Category
    {
        return Category::query()->create($data);
    }

    public function update(int $id, array $data): ?Category
    {
        $category = $this->findById($id);

        if ($category === null) {
            return null;
        }

        $category->update($data);

        return $category->refresh();
    }

    public function delete(int $id): bool
    {
        $category = $this->findById($id);

        return $category !== null && (bool) $category->delete();
    }

    public function hasProducts(int $id): bool
    {
        return Category::query()->findOrFail($id)->products()->exists();
    }
}
