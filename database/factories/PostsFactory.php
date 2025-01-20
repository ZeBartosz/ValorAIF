<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\posts>
 */
class PostsFactory extends Factory
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
            'body' => fake()->paragraphs(3, true),
            'catagory' => fake()->randomElement(['General', 'Pro', 'Gameplay', 'LFT', 'Memes', 'Other']),
            'postsBanner' => 'https://picsum.photos/1200/600?random=' . fake()->unique()->numberBetween(1, 10000),
            'user_id' => User::factory(),
        ];
    }
}
