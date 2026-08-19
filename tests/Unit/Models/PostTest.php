<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_time_label_returns_human_readable_diff(): void
    {
        $post = Post::factory()->create(['published_at' => now()->subHours(2)]);

        $this->assertSame($post->published_at->diffForHumans(), $post->time_label);
    }

    public function test_cover_image_url_is_null_without_cover(): void
    {
        $post = Post::factory()->create(['cover_image_path' => null]);

        $this->assertNull($post->cover_image_url);
    }

    public function test_cover_image_url_resolves_from_public_disk(): void
    {
        Storage::fake('public');
        $post = Post::factory()->create(['cover_image_path' => 'covers/foo.png']);

        $this->assertSame(Storage::disk('public')->url('covers/foo.png'), $post->cover_image_url);
    }

    public function test_deleting_post_removes_cover_image_from_disk(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('covers/foo.png', 'conteudo');
        $post = Post::factory()->create(['cover_image_path' => 'covers/foo.png']);

        $post->delete();

        Storage::disk('public')->assertMissing('covers/foo.png');
    }

    public function test_deleting_post_without_cover_image_does_not_error(): void
    {
        $post = Post::factory()->create(['cover_image_path' => null]);

        $post->delete();

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_tags_are_cast_to_array(): void
    {
        $post = Post::factory()->create(['tags' => ['#a', '#b']]);

        $this->assertIsArray($post->fresh()->tags);
        $this->assertSame(['#a', '#b'], $post->fresh()->tags);
    }
}
