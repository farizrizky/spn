<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAdditionalInformation>
 */
class ProductAdditionalInformationFactory extends Factory
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
            'title' => fake()->word,
            'information' => fake()->paragraphs(2, true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
