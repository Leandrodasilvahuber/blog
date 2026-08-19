<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_paginated_videos_ordered_by_published_at(): void
    {
        $older = Video::factory()->create(['published_at' => now()->subDay()]);
        $newer = Video::factory()->create(['published_at' => now()]);

        $response = $this->getJson(route('api.videos.index'));

        $response->assertOk();
        $response->assertJsonPath('data.0.id', $newer->id);
        $response->assertJsonPath('data.1.id', $older->id);
        $response->assertJsonStructure([
            'data' => [
                ['id', 'title', 'description', 'time', 'youtubeId', 'thumbnailUrl', 'embedUrl', 'watchUrl'],
            ],
            'current_page',
            'last_page',
        ]);
    }

    public function test_index_paginates_results(): void
    {
        Video::factory()->count(25)->create();

        $response = $this->getJson(route('api.videos.index'));

        $response->assertOk();
        $response->assertJsonCount(20, 'data');
        $response->assertJsonPath('last_page', 2);
    }

    public function test_index_does_not_require_authentication(): void
    {
        Video::factory()->create();

        $this->getJson(route('api.videos.index'))->assertOk();
    }
}
