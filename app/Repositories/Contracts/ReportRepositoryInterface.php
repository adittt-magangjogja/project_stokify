<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Carbon;

interface ReportRepositoryInterface
{
    public function productsForStock(?int $categoryId, Carbon $to): Collection;
    public function confirmedTransactionsAfter(array $productIds, Carbon $to): Collection;
    public function confirmedTransactionsBetween(array $productIds, Carbon $from, Carbon $to): Collection;
    public function opnamesAfter(array $productIds, Carbon $to): Collection;
    public function transactions(array $filters): Collection;
    public function activities(array $filters): LengthAwarePaginator;
}
