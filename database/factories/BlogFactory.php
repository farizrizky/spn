<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'content' => fake()->paragraphs(3, true),
            'blog_category' => fake()->randomElement(['01985a0b-8344-7025-908a-7b4a5a00f60a', '01985a0b-a2b8-73f6-a521-21180dfc0776']),
            'status' => fake()->randomElement(['published']),
            'created_at' => now(),
            'updated_at' => now(),
            'image_path' => fake()->randomElement([
                'https://picsum.photos/id/1015/800/600',
                'https://picsum.photos/id/1025/800/600',
                'https://picsum.photos/id/1035/800/600',
                'https://picsum.photos/id/1045/800/600',
                'https://picsum.photos/id/1055/800/600',
                'https://picsum.photos/id/1065/800/600',
                'https://picsum.photos/id/1075/800/600',
                'https://picsum.photos/id/1085/800/600',
                'https://picsum.photos/id/1095/800/600',
                'https://picsum.photos/id/1105/800/600',
                'https://images.unsplash.com/photo-1506744038136-46273834b3fb',
                'https://images.unsplash.com/photo-1495567720989-cebdbdd97913',
                'https://images.unsplash.com/photo-1481349518771-20055b2a7b24',
                'https://images.unsplash.com/photo-1522202176988-66273c2fd55f',
                'https://images.unsplash.com/photo-1470770841072-f978cf4d019e',
                'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40',
                'https://images.unsplash.com/photo-1446776811953-b23d57bd21aa',
                'https://images.unsplash.com/photo-1516110833967-931f25b366ab',
                'https://images.unsplash.com/photo-1531256379411-3a5a6b9da979',
                'https://images.unsplash.com/photo-1503602642458-232111445657',
            ]),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
