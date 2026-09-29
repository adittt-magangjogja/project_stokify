<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\StockTransaction;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function __construct(private ProductRepositoryInterface $products) {}

    public function list(array $filters) { return $this->products->paginate($filters); }

    public function find(int $id) { return $this->products->find($id); }

    public function store(array $data, ?UploadedFile $image = null)
    {
        return DB::transaction(function () use ($data, $image) {
            $values = Arr::pull($data, 'attribute_values', []);
            $data['price'] = $data['selling_price'];
            if ($image) $data['image'] = $image->store('products', 'public');

            $product = $this->products->create($data);
            $this->syncAttributes($product, $values);
            if ($product->stock > 0) {
                StockTransaction::create([
                    'product_id' => $product->id,
                    'supplier_id' => $product->supplier_id,
                    'user_id' => auth()->id(),
                    'type' => 'in',
                    'quantity' => $product->stock,
                    'status' => 'confirmed',
                    'transaction_date' => now(),
                    'note' => 'Stok awal produk',
                    'confirmed_by' => auth()->id(),
                    'confirmed_at' => now(),
                ]);
            }
            ActivityLog::record('create_product', "Menambah produk {$product->name}");

            return $product;
        });
    }

    public function update(int $id, array $data, ?UploadedFile $image = null)
    {
        return DB::transaction(function () use ($id, $data, $image) {
            $values = Arr::pull($data, 'attribute_values', []);
            unset($data['stock']); // stok hanya berubah lewat transaksi / opname
            $data['price'] = $data['selling_price'];

            $old = $this->products->find($id);
            if ($image) {
                if ($old->image) Storage::disk('public')->delete($old->image);
                $data['image'] = $image->store('products', 'public');
            }

            $product = $this->products->update($id, $data);
            $this->syncAttributes($product, $values);
            ActivityLog::record('update_product', "Mengubah produk {$product->name}");

            return $product;
        });
    }

    public function delete(int $id): bool
    {
        $product = $this->products->find($id);
        if ($product->stockTransactions()->exists() || $product->stockOpnames()->exists()) {
            return false;
        }

        if ($product->image) Storage::disk('public')->delete($product->image);
        ActivityLog::record('delete_product', "Menghapus produk {$product->name}");

        return $this->products->delete($id);
    }

    private function syncAttributes($product, array $values): void
    {
        $product->attributeValues()->delete();
        foreach ($values as $attributeId => $value) {
            if (filled($value)) {
                $product->attributeValues()->create(['product_attribute_id' => $attributeId, 'value' => $value]);
            }
        }
    }
}
