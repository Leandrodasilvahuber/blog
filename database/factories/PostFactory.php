<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role' => fake()->jobTitle(),
            'illustration' => fake()->randomElement(['brain', 'cloud', 'terminal', 'graph', 'branch', 'shield']),
            'lead' => fake()->sentence(),
            'body' => fake()->paragraphs(3, true),
            'tags' => ['#IA', '#Backend'],
            'likes' => fake()->numberBetween(0, 500),
            'comments' => fake()->numberBetween(0, 100),
            'reposts' => fake()->numberBetween(0, 50),
            'top_reactor' => fake()->name(),
            'comment_name' => fake()->name(),
            'comment_role' => fake()->jobTitle(),
            'comment_text' => fake()->sentence(),
            'published_at' => now(),
        ];
    }
}
