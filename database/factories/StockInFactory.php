<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockInFactory extends Factory
{
    public function definition(): array
    {
        return [
            'supplier_id' => Supplier::factory(),
            'invoice_number' => 'IN-' . $this->faker->unique()->numerify('#####'),
            'purchase_date' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'total_amount' => 0,
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
