<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\StockOut;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockOutDetailFactory extends Factory
{
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 50000, 250000);
        $qty = $this->faker->numberBetween(1, 5);

        return [
            'stock_out_id' => StockOut::factory(),
            'product_id' => Product::factory(),
            'quantity' => $qty,
            'price' => $price,
            'subtotal' => $qty * $price,
        ];
    }
}
