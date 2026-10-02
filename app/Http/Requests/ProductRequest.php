<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool { return true; } // akses dijaga middleware role

    protected function prepareForValidation(): void
    {
        $purchasePriceRaw = (string) $this->input('purchase_price', '');
        $sellingPriceRaw = (string) $this->input('selling_price', '');
        $purchasePrice = preg_match('/^[\d.]+$/', $purchasePriceRaw) ? preg_replace('/\D+/', '', $purchasePriceRaw) : '__invalid_price__';
        $sellingPrice = preg_match('/^[\d.]+$/', $sellingPriceRaw) ? preg_replace('/\D+/', '', $sellingPriceRaw) : '__invalid_price__';

        $this->merge([
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
            'unit' => ['required', Rule::in(['Pcs', 'Unit', 'Buah', 'Box', 'Pack', 'Kg', 'Gram', 'Liter', 'Meter', 'Set'])],
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
            'attribute_values' => 'nullable|array', // [attribute_id => value]
        ];
    }
}
