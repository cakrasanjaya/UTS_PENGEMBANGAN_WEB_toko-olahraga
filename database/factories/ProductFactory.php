<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name' => ucfirst($this->faker->words(2, true)),
            'price' => $this->faker->randomFloat(2, 50000, 500000),
            'stock' => $this->faker->numberBetween(10, 100),
        ];
    }
}
