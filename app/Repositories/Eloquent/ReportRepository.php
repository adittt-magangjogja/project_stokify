<?php

namespace App\Repositories\Eloquent;

use App\Models\{ActivityLog, Product, StockOpname, StockTransaction};
use App\Repositories\Contracts\ReportRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

class ReportRepository implements ReportRepositoryInterface
{
    public function productsForStock(?int $categoryId, Carbon $to): Collection
    {
        return Product::with('category')->when($categoryId, fn ($q) => $q->where('category_id', $categoryId))
            ->whereDate('created_at', '<=', $to->toDateString())->orderBy('name')->get();
    }

    public function confirmedTransactionsAfter(array $productIds, Carbon $to): Collection
    {
        return StockTransaction::whereIn('product_id', $productIds)->where('status', 'confirmed')
            ->where('transaction_date', '>', $to)->get(['product_id', 'type', 'quantity'])->groupBy('product_id');
    }

    public function confirmedTransactionsBetween(array $productIds, Carbon $from, Carbon $to): Collection
    {
        return StockTransaction::whereIn('product_id', $productIds)->where('status', 'confirmed')
            ->whereBetween('transaction_date', [$from, $to])->get(['product_id', 'type', 'quantity'])->groupBy('product_id');
    }

    public function opnamesAfter(array $productIds, Carbon $to): Collection
    {
        return StockOpname::whereIn('product_id', $productIds)->whereDate('opname_date', '>', $to->toDateString())
            ->get(['product_id', 'difference'])->groupBy('product_id');
    }

    public function transactions(array $filters): Collection
    {
        return StockTransaction::with(['product', 'supplier', 'user'])->where('status', 'confirmed')
            ->when($filters['type'] ?? null, fn ($q, $type) => $q->where('type', $type))
            ->when($filters['from'] ?? null, fn ($q, $date) => $q->whereDate('transaction_date', '>=', $date))
            ->when($filters['to'] ?? null, fn ($q, $date) => $q->whereDate('transaction_date', '<=', $date))
            ->latest('transaction_date')->get();
    }

    public function activities(array $filters): LengthAwarePaginator
    {
        return ActivityLog::with('user')->when($filters['from'] ?? null, fn ($q, $date) => $q->whereDate('created_at', '>=', $date))
            ->when($filters['to'] ?? null, fn ($q, $date) => $q->whereDate('created_at', '<=', $date))
            ->latest('created_at')->paginate(20);
    }
}
