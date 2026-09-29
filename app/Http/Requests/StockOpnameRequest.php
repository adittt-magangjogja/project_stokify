<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockOpnameRequest extends FormRequest
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
            'physical_stock' => 'required|integer|min:0',
            'opname_date' => 'nullable|date',
            'note' => 'nullable|string',
        ];
    }
}