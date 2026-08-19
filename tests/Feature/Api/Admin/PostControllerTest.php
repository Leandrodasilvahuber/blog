<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_create_post_via_api(): void
    {
        $this->postJson('/api/adm/posts', [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
        ])->assertUnauthorized();
    }

    public function test_authenticated_token_can_create_post_via_api(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->postJson('/api/adm/posts', [
            'role' => 'Backend · IA',
            'illustration' => 'brain',
            'lead' => 'Um resumo qualquer',
            'body' => 'Corpo do post',
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('posts', ['role' => 'Backend · IA']);
    }

    public function test_guest_cannot_delete_post_via_api(): void
    {
        $post = Post::factory()->create();

        $this->deleteJson("/api/adm/posts/{$post->id}")->assertUnauthorized();
        $this->assertDatabaseHas('posts', ['id' => $post->id]);
    }

    public function test_authenticated_token_can_delete_post_via_api(): void
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user, 'sanctum')->deleteJson("/api/adm/posts/{$post->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
