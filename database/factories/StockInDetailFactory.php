<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\StockIn;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockInDetailFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 50000, 250000);
        $qty = $this->faker->numberBetween(1, 10);

        return [
            'stock_in_id' => StockIn::factory(),
            'product_id' => Product::factory(),
            'quantity' => $qty,
            'purchase_price' => $price,
            'subtotal' => $qty * $price,
        ];
    }
}
