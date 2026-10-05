<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'supplier_id',
        'user_id',
        'type',
        'quantity',
        'status',
        'note',
        'transaction_date',
        'confirmed_by',
        'confirmed_at',
        'request_key',
    ];

    protected $casts = [
        'quantity' => 'decimal:3',
        'transaction_date' => 'date',
        'confirmed_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function confirmer()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }
}
