<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ReportRepositoryInterface;
use Illuminate\Support\Carbon;

class ReportService
{
    public function __construct(private ReportRepositoryInterface $reports) {}

    public function stock(array $f)
    {
        $to = Carbon::parse($f['to'] ?? today())->endOfDay();
        $from = Carbon::parse($f['from'] ?? $to->copy()->startOfMonth())->startOfDay();
        $products = $this->reports->productsForStock(isset($f['category_id']) ? (int) $f['category_id'] : null, $to);

        $ids = $products->modelKeys();
        $futureTransactions = $this->reports->confirmedTransactionsAfter($ids, $to);
        $periodTransactions = $this->reports->confirmedTransactionsBetween($ids, $from, $to);
        $futureOpnames = $this->reports->opnamesAfter($ids, $to);

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
        return $this->reports->transactions($f);
    }

    public function activities(array $f)
    {
        return $this->reports->activities($f);
    }
}
