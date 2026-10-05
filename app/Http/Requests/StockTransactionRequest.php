<?php

namespace App\Http\Requests;

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

            'quantity' => 'required|integer|min:1',

            'supplier_id' => 'required_if:type,in|nullable|exists:suppliers,id',

            'transaction_date' => 'nullable|date',

            'note' => 'nullable|string',
            'request_key' => 'required|uuid',
        ];
    }
}
