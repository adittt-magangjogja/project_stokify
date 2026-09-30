<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Category;
use App\Models\Supplier;

class ProductRequest extends FormRequest
{
    public function authorize(): bool { return true; } // akses dijaga middleware role

    protected function prepareForValidation(): void
    {
        $categoryName = trim((string) $this->input('category_lookup', ''));
        $supplierName = trim((string) $this->input('supplier_lookup', ''));
        $purchasePrice = preg_replace('/\D+/', '', (string) $this->input('purchase_price', ''));
        $sellingPrice = preg_replace('/\D+/', '', (string) $this->input('selling_price', ''));

        $categoryId = $this->input('category_id');
        if ($categoryName !== '') {
            $categoryId = Category::query()
                ->whereRaw('LOWER(name) = ?', [mb_strtolower($categoryName)])
                ->value('id') ?? '__invalid_category__';
        }

        $supplierId = $this->input('supplier_id');
        if ($this->exists('supplier_lookup')) {
            $supplierId = $supplierName === ''
                ? null
                : (Supplier::query()->whereRaw('LOWER(name) = ?', [mb_strtolower($supplierName)])->value('id') ?? '__invalid_supplier__');
        }

        $this->merge([
            'category_id' => $categoryId,
            'supplier_id' => $supplierId,
            'purchase_price' => $purchasePrice,
            'selling_price' => $sellingPrice,
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'nullable|exists:suppliers,id',
            'code' => ['required', 'string', 'max:50', Rule::unique('products', 'code')->ignore($id)],
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:5000',
            'unit' => 'required|string|max:30',
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'attribute_values' => 'nullable|array', // [attribute_id => value]
        ];
    }
}
