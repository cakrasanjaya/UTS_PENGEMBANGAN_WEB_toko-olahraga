<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StockIn extends Model
{
    use HasFactory; // 🟢 ini WAJIB supaya bisa pakai .factory()

    protected $fillable = [
        'supplier_id',
        'invoice_number',
        'purchase_date',
        'total_amount',
        'status',
        'notes'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'total_amount' => 'decimal:2'
    ];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(StockInDetail::class);
    }

    // ✅ Method untuk complete purchase dan update stok
    public function completePurchase(): bool
    {
        if ($this->status === 'completed') {
            return false;
        }

        \DB::beginTransaction();
        try {
            foreach ($this->details as $detail) {
                $product = $detail->product;
                $product->increment('stock', $detail->quantity);
            }

            $this->update(['status' => 'completed']);
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }

    // ✅ Method untuk cancel purchase dan kembalikan stok
    public function cancelPurchase(): bool
    {
        if ($this->status !== 'completed') {
            $this->update(['status' => 'cancelled']);
            return true;
        }

        \DB::beginTransaction();
        try {
            foreach ($this->details as $detail) {
                $product = $detail->product;
                $product->decrement('stock', $detail->quantity);
            }

            $this->update(['status' => 'cancelled']);
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
            throw $e;
        }
    }
}
