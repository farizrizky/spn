<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => \App\Models\Product::inRandomOrder()->first()->id,
            'image_path' => fake()->randomElement([
                'http://127.0.0.1:8000/storage/files/drum1-1.png',
                'http://127.0.0.1:8000/storage/files/drum1.png',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
