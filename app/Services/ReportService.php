<?php

namespace App\Services;

use App\Models\{ActivityLog, Product, StockOpname, StockTransaction};
use Illuminate\Support\Carbon;

class ReportService
{
    public function stock(array $f)
    {
        $to = Carbon::parse($f['to'] ?? today())->endOfDay();
        $from = Carbon::parse($f['from'] ?? $to->copy()->startOfMonth())->startOfDay();
        $products = Product::with('category')
            ->when($f['category_id'] ?? null, fn ($q, $c) => $q->where('category_id', $c))
            ->whereDate('created_at', '<=', $to->toDateString())
            ->orderBy('name')->get();

        $ids = $products->modelKeys();
        $futureTransactions = StockTransaction::whereIn('product_id', $ids)->where('status', 'confirmed')
            ->where('transaction_date', '>', $to)->get(['product_id', 'type', 'quantity'])->groupBy('product_id');
        $periodTransactions = StockTransaction::whereIn('product_id', $ids)->where('status', 'confirmed')
            ->whereBetween('transaction_date', [$from, $to])->get(['product_id', 'type', 'quantity'])->groupBy('product_id');
        $futureOpnames = StockOpname::whereIn('product_id', $ids)->whereDate('opname_date', '>', $to->toDateString())->get(['product_id', 'difference'])->groupBy('product_id');

        return $products->each(function (Product $product) use ($to, $futureTransactions, $futureOpnames, $periodTransactions) {
            $future = $futureTransactions->get($product->id, collect());
            $futureIn = (int) $future->where('type', 'in')->sum('quantity');
            $futureOut = (int) $future->where('type', 'out')->sum('quantity');
            $opnameAdjustments = (int) $futureOpnames->get($product->id, collect())->sum('difference');
            $movements = $periodTransactions->get($product->id, collect());

            $product->setAttribute('stock_at_date', max(0, $product->stock - $futureIn + $futureOut - $opnameAdjustments));
            $product->setAttribute('period_in', (int) $movements->where('type', 'in')->sum('quantity'));
            $product->setAttribute('period_out', (int) $movements->where('type', 'out')->sum('quantity'));
            $product->setAttribute('report_date', $to->toDateString());
        });
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
