<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;

class TransactionReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
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

    public function registerEvents(): array
    {
        return [AfterSheet::class => function (AfterSheet $event): void {
            $sheet = $event->sheet->getDelegate();
            $table = new Table('A1:F' . $sheet->getHighestRow(), 'LaporanTransaksi');
            $table->setStyle((new TableStyle())->setTheme(TableStyle::TABLE_STYLE_MEDIUM2));
            $sheet->addTable($table);
        }];
    }

    public function styles(Worksheet $sheet): array
    {
        $sheet->freezePane('A2');
        $sheet->getStyle('A1:F' . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:F' . $sheet->getHighestRow())->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['rgb' => 'D5DFED']]],
        ]);
        return [];
    }
}
