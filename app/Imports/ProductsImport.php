<?php

namespace App\Imports;

use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToCollection, WithHeadingRow
{
    private int $imported = 0;

    public function collection(Collection $rows): void
    {
        DB::transaction(function () use ($rows) {
            foreach ($rows as $index => $row) {
                $data = $row->toArray();
                if (blank($data['code'] ?? null) && blank($data['name'] ?? null)) continue;

                $data['category_id'] = $data['category_id'] ?? Category::where('name', $data['category_name'] ?? $data['category'] ?? '')->value('id');
                $data['supplier_id'] = $data['supplier_id'] ?? Supplier::where('name', $data['supplier_name'] ?? $data['supplier'] ?? '')->value('id');

                $validator = Validator::make($data, [
                    'code' => ['required', 'string', 'regex:/^JS[0-9]{3,10}$/i'],
                    'name' => 'required|string|max:150',
                    'description' => 'nullable|string|max:5000',
                    'category_id' => 'required|integer|exists:categories,id',
                    'supplier_id' => 'nullable|integer|exists:suppliers,id',
                    'unit' => 'required|string|max:30',
                    'purchase_price' => 'required|numeric|min:0',
                    'selling_price' => 'required|numeric|min:0',
                    'stock' => 'nullable|integer|min:0',
                    'minimum_stock' => 'required|integer|min:0',
                ], [
                    'code.regex' => 'Format kode produk harus JS diikuti 3–10 angka, contohnya JS001 atau JS1000.',
                ]);

                if ($validator->fails()) {
                    throw ValidationException::withMessages([
                        'file' => 'Baris '.($index + 2).': '.$validator->errors()->first(),
                    ]);
                }

                $values = $validator->validated();
                $values['price'] = $values['selling_price'];
                $product = Product::where('code', $values['code'])->first();
                if ($product) {
                    unset($values['stock']);
                    $product->update($values);
                } else {
                    $values['stock'] ??= 0;
                    $product = Product::create($values);
                    if ($product->stock > 0) {
                        $product->stockTransactions()->create([
                            'supplier_id' => $product->supplier_id,
                            'user_id' => auth()->id(),
                            'type' => 'in',
                            'quantity' => $product->stock,
                            'status' => 'confirmed',
                            'transaction_date' => now(),
                            'note' => 'Stok awal dari import produk',
                            'confirmed_by' => auth()->id(),
                            'confirmed_at' => now(),
                        ]);
                    }
                }
                $this->imported++;
            }

            ActivityLog::record('import_products', "Import {$this->imported} produk dari file.");
        });
    }

    public function importedCount(): int { return $this->imported; }
}
