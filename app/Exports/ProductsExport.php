<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;

class ProductsExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles, WithEvents
{
    public function query()
    {
        return Product::query()->with(['category', 'supplier'])->orderBy('name');
    }

    public function headings(): array
    {
        return ['code', 'name', 'description', 'category_name', 'supplier_name', 'unit', 'purchase_price', 'selling_price', 'stock', 'minimum_stock'];
    }

    public function map($product): array
    {
        return [$product->code, $product->name, $product->description, $product->category?->name, $product->supplier?->name, $product->unit, $product->purchase_price, $product->selling_price, $product->stock, $product->minimum_stock];
    }

    public function registerEvents(): array
    {
        return [AfterSheet::class => function (AfterSheet $event): void {
            $sheet = $event->sheet->getDelegate();
            $table = (new Table('A1:J' . $sheet->getHighestRow(), 'Produk'));
            $table->setStyle((new TableStyle())->setTheme(TableStyle::TABLE_STYLE_MEDIUM2));
            $sheet->addTable($table);
        }];
    }

    public function styles(Worksheet $sheet): array
    {
        $lastRow = $sheet->getHighestRow();
        $sheet->freezePane('A2');
        $sheet->getStyle("A1:J{$lastRow}")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
        $sheet->getStyle("A1:J{$lastRow}")->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN, 'color' => ['rgb' => 'D5DFED']]],
        ]);
        $sheet->getStyle('C:C')->getAlignment()->setWrapText(true);

        // Apply an explicit blue style so the table remains clearly formatted in Excel-compatible apps.
        $sheet->getStyle('A1:J1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4472C4']],
            'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
        ]);
        $sheet->getRowDimension(1)->setRowHeight(24);

        return [];
    }
}
