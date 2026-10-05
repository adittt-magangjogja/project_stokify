<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function values(): HasMany
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_product_attribute');
    }
}
