<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\Post;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PublicFeedTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_homepage_loads_posts_fetched_from_the_api(): void
    {
        Post::factory()->create([
            'lead' => 'Título de teste E2E',
            'role' => 'Backend · IA',
            'body' => 'Corpo do post de teste E2E.',
            'tags' => ['#e2e'],
            'published_at' => now(),
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->waitFor('.post', 10)
                ->assertSee('Título de teste E2E')
                ->assertSee('Backend · IA')
                ->assertSee('#e2e');
        });
    }

    public function test_homepage_shows_empty_end_message_without_posts(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(500)
                ->assertDontSee('Título de teste E2E')
                ->assertSee('você chegou ao fim do feed');
        });
    }

    public function test_follow_button_toggles_state(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Seguir')
                ->click('#btnFollow')
                ->waitForTextIn('#btnFollow', 'Seguindo')
                ->assertSeeIn('#followerCount', '2');
        });
    }

    public function test_admin_panel_link_navigates_to_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Painel')
                ->assertPathIs('/adm')
                ->assertSee('Entrar no painel');
        });
    }
}
