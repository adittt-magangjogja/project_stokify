<?php

namespace App\Services;

use App\Models\{ActivityLog, Product, StockTransaction};

class DashboardService
{
    public function admin(): array
    {
        $from = now()->subDays(30);
        return [
            'total_products' => Product::count(),
            'in_count' => StockTransaction::where('type', 'in')->where('status', 'confirmed')->where('created_at', '>=', $from)->count(),
            'out_count' => StockTransaction::where('type', 'out')->where('status', 'confirmed')->where('created_at', '>=', $from)->count(),
            'stock_chart' => Product::orderByDesc('stock')->limit(10)->pluck('stock', 'name'),
            'recent_activities' => ActivityLog::with('user')->latest('created_at')->limit(10)->get(),
        ];
    }

    public function manager(): array
    {
        return [
            'low_stock' => Product::lowStock()->orderBy('stock')->limit(10)->get(),
            'in_today' => StockTransaction::where('type', 'in')->whereDate('transaction_date', today())->count(),
            'out_today' => StockTransaction::where('type', 'out')->whereDate('transaction_date', today())->count(),
        ];
    }

    public function staff(): array
    {
        return [
            'pending_in' => StockTransaction::with('product')->where('type', 'in')->where('status', 'pending')->get(),
            'pending_out' => StockTransaction::with('product')->where('type', 'out')->where('status', 'pending')->get(),
        ];
    }
}