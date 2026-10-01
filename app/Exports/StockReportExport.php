<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\{FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents};
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;

class StockReportExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithEvents
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

    public function registerEvents(): array
    {
        return [AfterSheet::class => function (AfterSheet $event): void {
            $sheet = $event->sheet->getDelegate();
            $table = new Table('A1:G' . $sheet->getHighestRow(), 'LaporanStok');
            $table->setStyle((new TableStyle())->setTheme(TableStyle::TABLE_STYLE_MEDIUM7)->setShowRowStripes(true));
            $sheet->addTable($table);
        }];
    }

    public function styles(Worksheet $sheet): array
    {
        $sheet->freezePane('A2');
        $sheet->getStyle('A1:G' . $sheet->getHighestRow())->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A1:G' . $sheet->getHighestRow())->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['rgb' => 'D5DFED']]],
        ]);
        $sheet->getStyle('A1:G1')->applyFromArray(['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID, 'startColor' => ['rgb' => '70AD47']]]);
        return [];
    }
}
