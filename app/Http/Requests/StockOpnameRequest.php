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
            'physical_stock' => 'required|numeric|decimal:0,3|min:0|max:999999999.999',
            'opname_date' => 'nullable|date',
            'note' => 'nullable|string',
        ];
    }
}
