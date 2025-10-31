<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StockOutFactory extends Factory
{
    public function definition(): array
    {
        return [
            'invoice_number' => 'OUT-' . $this->faker->unique()->numerify('#####'),
            'customer_name' => $this->faker->name(),
            'stock_out_date' => $this->faker->dateTimeBetween('-1 months', 'now'),
            'total_amount' => 0,
            'status' => $this->faker->randomElement(['pending', 'completed']),
            'notes' => $this->faker->sentence(),
        ];
    }
}
