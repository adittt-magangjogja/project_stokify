<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * Menampilkan produk dengan pagination dan filter.
     */
    public function paginate(array $filters = [], int $perPage = 10)
    {
        return Product::with(['category', 'supplier'])
            ->when(filled($filters['search'] ?? null), function ($q) use ($filters) {
                $s = trim($filters['search']);
                $q->where(function ($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%")
                        ->orWhere('code', 'like', "%{$s}%");
                });
            })
            ->when(filled($filters['category_id'] ?? null), function ($q) use ($filters) {
                $q->where('category_id', $filters['category_id']);
            })
            ->when(filled($filters['stok'] ?? null), function ($q) use ($filters) {
                match ($filters['stok']) {
                    'tersedia' => $q->whereColumn('stock', '>', 'minimum_stock'),
                    'minimum' => $q->where('stock', '>', 0)->whereColumn('stock', '<=', 'minimum_stock'),
                    'habis' => $q->where('stock', 0),
                    default => null,
                };
            })
            ->latest()
            ->paginate($perPage)
            ->appends($filters);
    }

    /**
     * Menampilkan semua produk.
     */
    public function all()
    {
        return Product::with(['category', 'supplier'])->get();
    }

    /**
     * Mencari produk berdasarkan ID.
     */
    public function find(int $id)
    {
        return Product::with([
            'category',
            'supplier',
            'attributeValues'
        ])->findOrFail($id);
    }

    /**
     * Membuat produk baru.
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * Mengubah data produk.
     */
   public function update(int $id, array $data): Product
{
    $product = Product::findOrFail($id);

    $product->update($data);

    return $product->refresh()->load(['category', 'supplier']);
}

    /**
     * Menghapus produk.
     */
    public function delete(int $id): bool
    {
        return Product::findOrFail($id)->delete();
    }

    /**
     * Mengambil produk dengan stok rendah.
     */
    public function lowStock(int $limit = 10)
    {
        return Product::lowStock()
            ->orderBy('stock')
            ->limit($limit)
            ->get();
    }

    /**
     * Menambah atau mengurangi stok produk.
     */
    public function adjustStock(int $id, int $qty): void
    {
        $product = Product::lockForUpdate()->findOrFail($id);

        $product->stock += $qty;
        $product->save();
    }

    public function hasStockHistory(int $id): bool
    {
        $product = Product::findOrFail($id);
        return $product->stockTransactions()->exists() || $product->stockOpnames()->exists();
    }

    public function syncAttributes(int $id, array $values): void
    {
        $product = Product::findOrFail($id);
        $product->attributeValues()->delete();
        foreach ($values as $attributeId => $value) {
            if (filled($value)) $product->attributeValues()->create(['product_attribute_id' => $attributeId, 'value' => $value]);
        }
    }
}
