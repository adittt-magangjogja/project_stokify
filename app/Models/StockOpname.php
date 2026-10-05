<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'system_stock',
        'physical_stock',
        // Compatibility for databases created by the older actual_stock schema.
        'actual_stock',
        'difference',
        'opname_date',
        'note',
    ];

    protected $casts = [
        'system_stock' => 'decimal:3',
        'physical_stock' => 'decimal:3',
        'difference' => 'decimal:3',
        'opname_date' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
