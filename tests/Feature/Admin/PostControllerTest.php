<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** 1x1 transparent PNG. */
    private const VALID_PNG_BASE64 = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII=';

    public function test_guest_cannot_access_posts_index(): void
    {
        $this->get(route('admin.posts.index'))->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_user_can_view_posts_index(): void
    {
        $user = User::factory()->create();
        Post::factory()->count(3)->create();

        $this->actingAs($user)
            ->get(route('admin.posts.index'))
            ->assertOk();
    }

    public function test_authenticated_user_can_create_post(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
            'tags' => 'ia, backend',
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseHas('posts', [
            'role' => 'Backend · IA',
            'lead' => 'Um resumo qualquer',
        ]);

        $post = Post::firstOrFail();
        $this->assertSame(['#ia', '#backend'], $post->tags);
    }

    public function test_creating_post_fails_with_invalid_illustration(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'invalido',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
        ]);

        $response->assertSessionHasErrors('illustration');
        $this->assertDatabaseCount('posts', 0);
    }

    public function test_authenticated_user_can_upload_cover_image_file(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
            'cover_image' => UploadedFile::fake()->image('capa.jpg'),
        ]);

        $response->assertRedirect(route('admin.posts.index'));

        $post = Post::firstOrFail();
        $this->assertNotNull($post->cover_image_path);
        Storage::disk('public')->assertExists($post->cover_image_path);
    }

    public function test_authenticated_user_can_upload_cover_image_via_base64(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
            'cover_image_base64' => 'data:image/png;base64,'.self::VALID_PNG_BASE64,
        ]);

        $response->assertRedirect(route('admin.posts.index'));

        $post = Post::firstOrFail();
        $this->assertNotNull($post->cover_image_path);
        Storage::disk('public')->assertExists($post->cover_image_path);
    }

    public function test_creating_post_fails_when_base64_cover_is_not_a_real_image(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
            'cover_image_base64' => 'data:text/plain;base64,'.base64_encode('isso nao e uma imagem'),
        ]);

        $response->assertSessionHasErrors('cover_image_base64');
        $this->assertDatabaseCount('posts', 0);
    }

    public function test_creating_post_fails_when_base64_cover_exceeds_size_limit(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $oversized = base64_encode(str_repeat('a', 11 * 1024 * 1024));

        $response = $this->actingAs($user)->post(route('admin.posts.store'), [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
            'cover_image_base64' => $oversized,
        ]);

        $response->assertSessionHasErrors('cover_image_base64');
        $this->assertDatabaseCount('posts', 0);
    }

    public function test_authenticated_user_can_update_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['lead' => 'Original']);

        $response = $this->actingAs($user)->put(route('admin.posts.update', $post), [
            'role' => $post->role,
            'illustration' => $post->illustration,
            'lead' => 'Atualizado',
            'body' => $post->body,
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertSame('Atualizado', $post->fresh()->lead);
    }

    public function test_authenticated_user_can_delete_post(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.posts.destroy', $post));

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }

    public function test_deleting_post_removes_stored_cover_image(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $path = 'covers/existing.png';
        Storage::disk('public')->put($path, 'conteudo');
        $post = Post::factory()->create(['cover_image_path' => $path]);

        $this->actingAs($user)->delete(route('admin.posts.destroy', $post));

        Storage::disk('public')->assertMissing($path);
    }
}
