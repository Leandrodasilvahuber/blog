<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\Company;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_settings_page(): void
    {
        $this->get(route('admin.settings.edit'))->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_user_can_view_settings_page(): void
    {
        $user = User::factory()->create();
        Company::create(['name' => 'Acme', 'logo_path' => 'logos/acme.png']);

        $this->actingAs($user)
            ->get(route('admin.settings.edit'))
            ->assertOk()
            ->assertSee('Acme');
    }

    public function test_authenticated_user_can_upload_resume_pdf(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.settings.resume'), [
            'resume_pdf' => UploadedFile::fake()->create('curriculo.pdf', 100, 'application/pdf'),
        ]);

        $response->assertRedirect(route('admin.settings.edit'));
        $path = Setting::get('resume_pdf_path');
        $this->assertNotNull($path);
        Storage::disk('public')->assertExists($path);
    }

    public function test_uploading_new_resume_deletes_previous_file(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        Storage::disk('public')->put('resume/old.pdf', 'conteudo');
        Setting::set('resume_pdf_path', 'resume/old.pdf');

        $this->actingAs($user)->post(route('admin.settings.resume'), [
            'resume_pdf' => UploadedFile::fake()->create('novo.pdf', 100, 'application/pdf'),
        ]);

        Storage::disk('public')->assertMissing('resume/old.pdf');
    }

    public function test_uploading_resume_fails_with_invalid_file_type(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.settings.resume'), [
            'resume_pdf' => UploadedFile::fake()->create('curriculo.txt', 100, 'text/plain'),
        ]);

        $response->assertSessionHasErrors('resume_pdf');
    }
}
