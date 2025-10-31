<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stock_outs', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique(); // nomor invoice unik
            $table->string('customer_name');             // nama pelanggan
            $table->date('stock_out_date');              // tanggal keluar
            $table->decimal('total_amount', 15, 2)->default(0); // total transaksi
            $table->string('status')->default('pending');       // status transaksi
            $table->text('notes')->nullable();                  // catatan tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_outs');
    }
};
