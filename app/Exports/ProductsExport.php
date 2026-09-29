<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductsExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
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
}
