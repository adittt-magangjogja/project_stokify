<?php

namespace App\Services;

use App\Models\{ActivityLog, Product, StockTransaction};

class ReportService
{
    public function stock(array $f)
    {
        return Product::with('category')
            ->when($f['category_id'] ?? null, fn ($q, $c) => $q->where('category_id', $c))
            ->orderBy('name')->get();
    }

    public function transactions(array $f)
    {
        return StockTransaction::with(['product', 'supplier', 'user'])
            ->where('status', 'confirmed')
            ->when($f['type'] ?? null, fn ($q, $t) => $q->where('type', $t))
            ->when($f['from'] ?? null, fn ($q, $d) => $q->whereDate('transaction_date', '>=', $d))
            ->when($f['to'] ?? null, fn ($q, $d) => $q->whereDate('transaction_date', '<=', $d))
            ->latest('transaction_date')->get();
    }

    public function activities(array $f)
    {
        return ActivityLog::with('user')
            ->when($f['from'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '>=', $d))
            ->when($f['to'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '<=', $d))
            ->latest('created_at')->paginate(20);
    }
}