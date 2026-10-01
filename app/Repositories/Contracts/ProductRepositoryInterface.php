<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function paginate(array $filters = [], int $perPage = 10);

    public function all();

    public function find(int $id);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): bool;

    public function lowStock(int $limit = 10);

    public function adjustStock(int $id, int $qty): void;

    public function hasStockHistory(int $id): bool;

    public function syncAttributes(int $id, array $values): void;
}
