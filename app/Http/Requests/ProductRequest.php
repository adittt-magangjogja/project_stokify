<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\DB;

class ProductRequest extends FormRequest
{
    public function authorize(): bool { return true; } // akses dijaga middleware role

    protected function prepareForValidation(): void
    {
        $purchasePriceRaw = (string) $this->input('purchase_price', '');
        $sellingPriceRaw = (string) $this->input('selling_price', '');
        $purchasePrice = preg_match('/^[\d.]+$/', $purchasePriceRaw) ? preg_replace('/\D+/', '', $purchasePriceRaw) : '__invalid_price__';
        $sellingPrice = preg_match('/^[\d.]+$/', $sellingPriceRaw) ? preg_replace('/\D+/', '', $sellingPriceRaw) : '__invalid_price__';

        if ($this->input('unit') === 'Liter') {
            foreach (['units_per_package', 'liter_stock'] as $field) {
                if ($this->has($field)) {
                    $this->merge([$field => str_replace(',', '.', (string) $this->input($field))]);
                }
            }
        }

        // Liter uses a dedicated field in the form, then shares the product stock value.
        if ($this->input('unit') === 'Liter' && $this->has('liter_stock')) {
            $this->merge(['stock' => $this->input('liter_stock')]);
            $this->request->remove('liter_stock');
        }

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
            'supplier_id' => [
                'nullable',
                Rule::exists('suppliers', 'id')->where(fn ($query) => $query->where(function ($query) {
                    $query->whereNull('category_id')->orWhere('category_id', $this->input('category_id'));
                })),
            ],
            'code' => ['required', 'string', 'regex:/^JS[0-9]{3,10}$/i', Rule::unique('products', 'code')->ignore($id)],
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:5000',
            'unit' => ['required', Rule::in(['Pcs', 'Unit', 'Buah', 'Box', 'Pack', 'Kg', 'Gram', 'Liter', 'Meter', 'Set'])],
            'units_per_package' => [
                Rule::requiredIf(in_array($this->input('unit'), ['Box', 'Pack', 'Set', 'Liter'], true)),
                'nullable', 'numeric', $this->input('unit') === 'Liter' ? 'decimal:0,3' : 'integer', 'min:0.001', 'max:1000000',
            ],
            'purchase_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'stock' => 'nullable|numeric|decimal:0,3|min:0|max:999999999.999',
            'liter_stock' => 'nullable|numeric|decimal:0,3|min:0|max:999999999.999',
            'minimum_stock' => 'required|numeric|decimal:0,3|min:0|max:999999999.999',
            'image' => 'nullable|image|max:2048',
            'attribute_values' => 'nullable|array', // [attribute_id => value]
            'attribute_values.*' => 'nullable|string|max:255',
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $values = $this->input('attribute_values', []);
            if (! is_array($values) || ! count($values)) return;

            $ids = array_map('strval', array_keys($values));
            $validIds = DB::table('category_product_attribute')
                ->where('category_id', $this->input('category_id'))
                ->whereIn('product_attribute_id', $ids)
                ->pluck('product_attribute_id')
                ->map(fn ($id) => (string) $id)
                ->all();

            foreach (array_diff($ids, $validIds) as $id) {
                $validator->errors()->add("attribute_values.{$id}", 'Atribut tidak sesuai dengan kategori produk yang dipilih.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'code.regex' => 'Format kode produk harus JS diikuti 3â€“10 angka, contohnya JS001 atau JS1000.',
            'supplier_id.exists' => 'Pilih supplier dengan kategori yang sama dengan produk.',
        ];
    }
}
