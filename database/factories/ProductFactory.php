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
            'name' => fake()->name,
            'slug' => fake()->unique()->slug(),
            'description' => fake()->paragraphs(3, true),
            'status' => fake()->randomElement(['published']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
