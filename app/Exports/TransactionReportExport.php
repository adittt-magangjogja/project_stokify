<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping};

class TransactionReportExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $data) {}

    public function collection() { return $this->data; }

    public function headings(): array
    {
        return ['Tanggal', 'Produk', 'Tipe', 'Jumlah', 'Supplier', 'Petugas'];
    }

    public function map($t): array
    {
        return [
            $t->transaction_date->format('Y-m-d'),
            $t->product->name,
            $t->type === 'in' ? 'Masuk' : 'Keluar',
            $t->quantity,
            $t->supplier?->name,
            $t->user?->name,
        ];
    }
}