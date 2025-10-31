<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockIn;
use App\Models\StockInDetail;
use App\Models\StockOut;
use App\Models\StockOutDetail;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat data dasar
        $categories = Category::factory(10)->create();
        $suppliers = Supplier::factory(10)->create();
        $products = Product::factory(10)->create([
            'category_id' => $categories->random()->id,
        ]);

        // Buat data stok masuk (beserta detail)
        StockIn::factory(10)
            ->has(
                StockInDetail::factory(3)->state(function () use ($products) {
                    $product = $products->random();
                    $qty = rand(1, 10);
                    $price = rand(50000, 250000);

                    return [
                        'product_id' => $product->id,
                        'quantity' => $qty,
                        'purchase_price' => $price,
                        'subtotal' => $qty * $price,
                    ];
                }),
                'details'
            )
            ->create();

        // Buat data stok keluar (beserta detail)
        StockOut::factory(10)
            ->has(
                StockOutDetail::factory(3)->state(function () use ($products) {
                    $product = $products->random();
                    $qty = rand(1, 5);
                    $price = rand(50000, 250000);

                    return [
                        'product_id' => $product->id,
                        'quantity' => $qty,
                        'price' => $price,
                        'subtotal' => $qty * $price,
                    ];
                }),
                'details'
            )
            ->create();
    }
}
