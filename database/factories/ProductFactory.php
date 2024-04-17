<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->numerify('P-####'),
            'name' => fake()->word(5),
            'quantity' => fake()->randomDigit(),
            'price' => fake()->randomNumber(4,true),
            'description' => fake()->sentence(5),
        ];
    }
}
