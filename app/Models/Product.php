<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'supplier_id',
        'code',
        'name',
        'description',
        'unit',
        'units_per_package',
        'stock',
        'minimum_stock',
        'price',
        'purchase_price',
        'selling_price',
        'image',
    ];

    protected $casts = [
        'stock' => 'decimal:3',
        'minimum_stock' => 'decimal:3',
        'units_per_package' => 'decimal:3',
        'price' => 'decimal:2',
        'purchase_price' => 'decimal:2',
        'selling_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function stockTransactions(): HasMany
    {
        return $this->hasMany(StockTransaction::class);
    }

    public function stockOpnames(): HasMany
    {
        return $this->hasMany(StockOpname::class);
    }

    public function attributeValues(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock', '<=', 'minimum_stock');
    }
}
