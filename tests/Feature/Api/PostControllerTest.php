<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_paginated_posts_ordered_by_published_at(): void
    {
        $older = Post::factory()->create(['published_at' => now()->subDay()]);
        $newer = Post::factory()->create(['published_at' => now()]);

        $response = $this->getJson(route('api.posts.index'));

        $response->assertOk();
        $response->assertJsonPath('data.0.id', $newer->id);
        $response->assertJsonPath('data.1.id', $older->id);
        $response->assertJsonStructure([
            'data' => [
                ['id', 'role', 'time', 'illustration', 'coverImageUrl', 'sourceUrl', 'lead', 'body', 'tags', 'likes', 'comments', 'reposts', 'topReactor', 'comment'],
            ],
            'current_page',
            'last_page',
        ]);
    }

    public function test_index_paginates_results(): void
    {
        Post::factory()->count(25)->create();

        $response = $this->getJson(route('api.posts.index'));

        $response->assertOk();
        $response->assertJsonCount(20, 'data');
        $response->assertJsonPath('last_page', 2);
    }

    public function test_index_does_not_require_authentication(): void
    {
        Post::factory()->create();

        $this->getJson(route('api.posts.index'))->assertOk();
    }
}
