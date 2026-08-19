<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VideoControllerTest extends TestCase
{
    use RefreshDatabase;

    private function fakeOembed(string $title = 'Título de exemplo'): void
    {
        Http::fake([
            'https://www.youtube.com/oembed*' => Http::response(['title' => $title], 200),
        ]);
    }

    public function test_guest_cannot_access_videos_index(): void
    {
        $this->get(route('admin.videos.index'))->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_user_can_view_videos_index(): void
    {
        $user = User::factory()->create();
        Video::factory()->count(3)->create();

        $this->actingAs($user)
            ->get(route('admin.videos.index'))
            ->assertOk();
    }

    public function test_authenticated_user_can_create_video_from_full_url(): void
    {
        $this->fakeOembed('Como usar Laravel');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.videos.store'), [
            'youtube_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertDatabaseHas('videos', [
            'title' => 'Como usar Laravel',
            'youtube_id' => 'dQw4w9WgXcQ',
        ]);
    }

    public function test_authenticated_user_can_create_video_from_short_url(): void
    {
        $this->fakeOembed();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.videos.store'), [
            'youtube_url' => 'https://youtu.be/dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertDatabaseHas('videos', ['youtube_id' => 'dQw4w9WgXcQ']);
    }

    public function test_authenticated_user_can_create_video_from_raw_id(): void
    {
        $this->fakeOembed();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.videos.store'), [
            'youtube_url' => 'dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertDatabaseHas('videos', ['youtube_id' => 'dQw4w9WgXcQ']);
    }

    public function test_creating_video_fails_with_invalid_youtube_url(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.videos.store'), [
            'youtube_url' => 'not-a-valid-url',
        ]);

        $response->assertSessionHasErrors('youtube_url');
        $this->assertDatabaseCount('videos', 0);
    }

    public function test_creating_video_falls_back_to_generic_title_when_oembed_fails(): void
    {
        Http::fake(['https://www.youtube.com/oembed*' => Http::response(null, 404)]);
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.videos.store'), [
            'youtube_url' => 'dQw4w9WgXcQ',
        ]);

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertDatabaseHas('videos', ['title' => 'Vídeo dQw4w9WgXcQ']);
    }

    public function test_authenticated_user_can_update_video(): void
    {
        $this->fakeOembed('Título atualizado');
        $user = User::factory()->create();
        $video = Video::factory()->create(['title' => 'Original']);

        $response = $this->actingAs($user)->put(route('admin.videos.update', $video), [
            'youtube_url' => $video->youtube_id,
        ]);

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertSame('Título atualizado', $video->fresh()->title);
    }

    public function test_authenticated_user_can_delete_video(): void
    {
        $user = User::factory()->create();
        $video = Video::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.videos.destroy', $video));

        $response->assertRedirect(route('admin.videos.index'));
        $this->assertDatabaseMissing('videos', ['id' => $video->id]);
    }
}
