<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockInDetail extends Model
{
    use HasFactory; // 🟢 penting supaya bisa dibuat dummy lewat factory

    protected $fillable = [
        'stock_in_id',
        'product_id',
        'quantity',
        'purchase_price',
        'subtotal'
    ];

    protected $casts = [
        'quantity' => 'integer',
        'purchase_price' => 'decimal:2',
        'subtotal' => 'decimal:2'
    ];

    public function stockIn(): BelongsTo
    {
        return $this->belongsTo(StockIn::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
