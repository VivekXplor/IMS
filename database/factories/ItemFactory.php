<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Item;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'description'=> fake()->sentence(),
            'price'=> fake()->numberBetween(1,1000000),
            'quantity'=> fake()->numberBetween(100,500)
        ];
    }
}
