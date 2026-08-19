<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminAuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_user_can_login_and_logout_through_the_browser(): void
    {
        $user = User::factory()->create([
            'email' => 'admin-e2e@example.com',
            'password' => Hash::make('senha-correta'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/adm')
                ->type('email', $user->email)
                ->type('password', 'senha-correta')
                ->press('Entrar')
                ->assertPathIs('/adm/posts')
                ->assertSee('Publicações');

            $browser->press('Sair')
                ->assertPathIs('/adm')
                ->assertSee('Entrar no painel');
        });
    }

    public function test_login_shows_error_with_invalid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'admin-e2e-2@example.com',
            'password' => Hash::make('senha-correta'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/adm')
                ->type('email', $user->email)
                ->type('password', 'senha-errada')
                ->press('Entrar')
                ->assertPathIs('/adm')
                ->assertSee('Credenciais inválidas');
        });
    }

    public function test_guest_is_redirected_to_login_when_visiting_posts_directly(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/adm/posts')
                ->assertPathIs('/adm')
                ->assertSee('Entrar no painel');
        });
    }
}
