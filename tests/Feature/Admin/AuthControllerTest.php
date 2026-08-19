<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_accessible(): void
    {
        $this->get(route('admin.login'))->assertOk();
    }

    public function test_authenticated_user_is_redirected_away_from_login_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.login'))
            ->assertRedirect(route('admin.posts.index'));
    }

    public function test_user_can_login_with_valid_credentials(): void
    {
        $user = User::factory()->create(['password' => Hash::make('senha-correta')]);

        $response = $this->post(route('admin.login.attempt'), [
            'email' => $user->email,
            'password' => 'senha-correta',
        ]);

        $response->assertRedirect(route('admin.posts.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_login_fails_with_invalid_credentials(): void
    {
        $user = User::factory()->create(['password' => Hash::make('senha-correta')]);

        $response = $this->post(route('admin.login.attempt'), [
            'email' => $user->email,
            'password' => 'senha-errada',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_login_is_throttled_after_too_many_attempts(): void
    {
        $user = User::factory()->create(['password' => Hash::make('senha-correta')]);

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('admin.login.attempt'), [
                'email' => $user->email,
                'password' => 'senha-errada',
            ]);
        }

        $response = $this->post(route('admin.login.attempt'), [
            'email' => $user->email,
            'password' => 'senha-errada',
        ]);

        $response->assertStatus(429);
    }

    public function test_authenticated_user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post(route('admin.logout'))
            ->assertRedirect(route('admin.login'));

        $this->assertGuest();
    }
}
