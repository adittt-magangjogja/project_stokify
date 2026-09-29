<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge(['is_active' => $this->boolean('is_active')]);
    }
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
        $id = $this->route('user')?->id;

        return [
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id),
            ],

            'password' => [
                $id ? 'nullable' : 'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'role' => [
                'required',
                new Enum(Role::class),
            ],

            'is_active' => 'boolean',
        ];
    }
}
