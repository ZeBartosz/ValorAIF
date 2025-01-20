<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\posts;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->sentence(),
            'user_id' => User::factory(), // Associate with a user
            'posts_id' => posts::factory(), // Associate with a post
            'parent_id' => null, // Default to a top-level comment
        ];
    }

    /**
     * Indicate that the comment is a reply to another comment.
     */
    public function reply($parentId): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => $parentId,
        ]);
    }
}
