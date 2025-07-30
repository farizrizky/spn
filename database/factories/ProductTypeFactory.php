<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductType>
 */
class ProductTypeFactory extends Factory
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
            'type' => fake()->randomElement([
                '01985a0a-3954-73ee-9bfb-58c3be8cadea',
                '01985a0a-7892-704c-b3fd-a04321f02214',
                '01985a0a-a5c6-715a-91b7-74f538564120',
                '01985a0a-e4ac-71dd-a827-aac3e2c499bc',
                '01985a0b-2176-7219-af99-07d5778e4a73'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
