<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\posts;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Associate with a user
            'posts_id' => posts::factory(), // Associate with a post
            'liked' => fake()->boolean(50), // Randomly true or false
            'disliked' => fake()->boolean(50), // Randomly true or false
        ];
    }

    /**
     * Indicate that the like is positive.
     */
    public function liked(): static
    {
        return $this->state(fn (array $attributes) => [
            'liked' => true,
            'disliked' => false,
        ]);
    }

    /**
     * Indicate that the like is negative (dislike).
     */
    public function disliked(): static
    {
        return $this->state(fn (array $attributes) => [
            'liked' => false,
            'disliked' => true,
        ]);
    }
}
