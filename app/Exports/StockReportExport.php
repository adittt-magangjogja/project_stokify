<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping};

class StockReportExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $data) {}

    public function collection() { return $this->data; }

    public function headings(): array
    {
        return ['SKU', 'Nama', 'Kategori', 'Stok', 'Stok Minimum'];
    }

    public function map($p): array
    {
        return [$p->sku, $p->name, $p->category?->name, $p->stock, $p->min_stock];
    }
}