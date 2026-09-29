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
            ->when($filters['search'] ?? null, function ($q, $s) {
                $q->where(function ($q) use ($s) {
                    $q->where('name', 'like', "%{$s}%")
                        ->orWhere('code', 'like', "%{$s}%");
                });
            })
            ->when($filters['category_id'] ?? null, function ($q, $id) {
                $q->where('category_id', $id);
            })
            ->latest()
            ->paginate($perPage);
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
}
