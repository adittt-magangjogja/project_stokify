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
        return ['Kode', 'Nama', 'Kategori', 'Stok pada tanggal', 'Masuk dalam periode', 'Keluar dalam periode', 'Stok Minimum'];
    }

    public function map($p): array
    {
        return [$p->code, $p->name, $p->category?->name, $p->stock_at_date, $p->period_in, $p->period_out, $p->minimum_stock];
    }
}
