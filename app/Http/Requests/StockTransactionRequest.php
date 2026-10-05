<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class StockTransactionRequest extends FormRequest
{
    /**
     * Menentukan apakah user diizinkan melakukan request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Aturan validasi.
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',

            'type' => 'required|in:in,out',

            'quantity' => 'required|numeric|decimal:0,3|gt:0|max:999999999.999',

            'supplier_id' => 'required_if:type,in|nullable|exists:suppliers,id',

            'transaction_date' => 'nullable|date',

            'note' => 'nullable|string',
            'request_key' => 'required|uuid',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            if ($this->input('type') !== 'in' || ! $this->filled('product_id') || ! $this->filled('supplier_id')) {
                return;
            }

            $productCategoryId = DB::table('products')->where('id', $this->input('product_id'))->value('category_id');
            $supplierCategoryId = DB::table('suppliers')->where('id', $this->input('supplier_id'))->value('category_id');

            // Supplier tanpa kategori tetap dapat digunakan, sesuai aturan data produk.
            if ($productCategoryId && $supplierCategoryId && (int) $productCategoryId !== (int) $supplierCategoryId) {
                $validator->errors()->add('supplier_id', 'Kategori supplier harus sesuai dengan kategori produk.');
            }
        });
    }
}
