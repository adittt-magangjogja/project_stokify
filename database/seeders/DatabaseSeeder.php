<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\ProductAttribute;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Menjalankan database seeder.
     */
    public function run(): void
    {
        // Membuat user default
        foreach ([
            ['Admin', 'admin@stockify.test', Role::ADMIN],
            ['Manajer Gudang', 'manager@stockify.test', Role::MANAGER],
            ['Staff Gudang', 'staff@stockify.test', Role::STAFF],
        ] as [$name, $email, $role]) {
            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => $name,
                    'password' => Hash::make('password'),
                    'role' => $role,
                    'is_active' => true,
                ]
            );
        }

        // Membuat atribut produk default
        foreach (['Ukuran', 'Warna', 'Berat'] as $attr) {
            ProductAttribute::firstOrCreate([
                'name' => $attr,
            ]);
        }
    }
}