<?php

declare(strict_types=1);

namespace Tests\Browser;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminPostCrudTest extends DuskTestCase
{
    use DatabaseMigrations;

    private function loginAsAdmin(Browser $browser): User
    {
        $user = User::factory()->create();

        $browser->loginAs($user)->visit('/adm/posts');

        return $user;
    }

    public function test_admin_can_create_a_post_through_the_form(): void
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/adm/posts/create')
                ->type('lead', 'Post criado via Dusk')
                ->type('role', 'Backend · IA')
                ->select('illustration', 'terminal')
                ->type('body', 'Corpo do post criado via teste E2E.')
                ->type('tags', 'e2e, dusk')
                ->press('Publicar')
                ->waitForLocation('/adm/posts')
                ->assertSee('Publicação criada')
                ->assertSee('Post criado via Dusk');
        });

        $this->assertDatabaseHas('posts', ['lead' => 'Post criado via Dusk']);
    }

    public function test_admin_can_upload_a_cover_image_when_creating_a_post(): void
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/adm/posts/create')
                ->type('lead', 'Post com capa')
                ->type('role', 'Backend · IA')
                ->select('illustration', 'brain')
                ->type('body', 'Corpo do post com capa.')
                ->attach('cover_image', base_path('tests/Browser/fixtures/cover.jpg'))
                ->press('Publicar')
                ->assertPathIs('/adm/posts')
                ->assertSee('Publicação criada');
        });

        $post = Post::where('lead', 'Post com capa')->firstOrFail();
        $this->assertNotNull($post->cover_image_path);
        Storage::disk('public')->assertExists($post->cover_image_path);

        Storage::disk('public')->delete($post->cover_image_path);
    }

    public function test_admin_can_edit_an_existing_post(): void
    {
        $post = Post::factory()->create(['lead' => 'Título original']);

        $this->browse(function (Browser $browser) use ($post) {
            $this->loginAsAdmin($browser);

            $browser->visit("/adm/posts/{$post->id}/edit")
                ->assertInputValue('lead', 'Título original')
                ->clear('lead')
                ->type('lead', 'Título editado via Dusk')
                ->press('Salvar')
                ->waitForLocation('/adm/posts')
                ->assertSee('Publicação atualizada')
                ->assertSee('Título editado via Dusk');
        });

        $this->assertSame('Título editado via Dusk', $post->fresh()->lead);
    }

    public function test_admin_can_delete_a_post(): void
    {
        $post = Post::factory()->create(['lead' => 'Post para remover']);

        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);

            $browser->visit('/adm/posts')
                ->assertSee('Post para remover')
                ->press('Excluir')
                ->waitForLocation('/adm/posts')
                ->assertSee('Publicação removida')
                ->assertDontSee('Post para remover');
        });

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
