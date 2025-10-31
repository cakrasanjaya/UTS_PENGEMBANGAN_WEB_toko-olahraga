<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockOut extends Model
{
    use HasFactory; // 🟢 penting supaya bisa dipakai di Factory

    protected $fillable = [
        'invoice_number',
        'customer_name',
        'stock_out_date',
        'total_amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'stock_out_date' => 'date',
        'total_amount' => 'decimal:2',
    ];

    /**
     * Relasi ke tabel detail (stock_out_details)
     */
    public function details(): HasMany
    {
        return $this->hasMany(StockOutDetail::class);
    }

    /**
     * Method untuk menyelesaikan transaksi keluar
     * dan mengurangi stok produk
     */
    public function completeStockOut(): bool
    {
        if ($this->status === 'completed') {
            throw new \Exception('Stock out already completed.');
        }

        foreach ($this->details as $detail) {
            $product = $detail->product;

            if ($product->stock < $detail->quantity) {
                throw new \Exception("Insufficient stock for {$product->name}.");
            }

            $product->decrement('stock', $detail->quantity);
        }

        $this->update(['status' => 'completed']);
        return true;
    }

    /**
     * Method untuk membatalkan transaksi keluar
     */
    public function cancelStockOut(): bool
    {
        if ($this->status !== 'pending') {
            throw new \Exception('Only pending stock out can be cancelled.');
        }

        $this->update(['status' => 'cancelled']);
        return true;
    }
}
