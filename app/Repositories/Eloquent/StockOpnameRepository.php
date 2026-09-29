<?php

namespace App\Repositories\Eloquent;

use App\Models\StockOpname;
use App\Repositories\Contracts\StockOpnameRepositoryInterface;

class StockOpnameRepository implements StockOpnameRepositoryInterface
{
    public function paginate(int $perPage = 10)
    {
        return StockOpname::with(['product', 'user'])
            ->latest()
            ->paginate($perPage);
    }

    public function create(array $data)
    {
        return StockOpname::create($data);
    }
}