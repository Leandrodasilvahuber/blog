<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_create_company(): void
    {
        $this->get(route('admin.companies.create'))->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_user_can_create_company_with_logo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.companies.store'), [
            'name' => 'Acme Corp',
            'logo' => UploadedFile::fake()->image('logo.png'),
        ]);

        $response->assertRedirect(route('admin.settings.edit'));
        $company = Company::sole();
        $this->assertSame('Acme Corp', $company->name);
        Storage::disk('public')->assertExists($company->logo_path);
    }

    public function test_creating_company_fails_without_logo(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.companies.store'), [
            'name' => 'Acme Corp',
        ]);

        $response->assertSessionHasErrors('logo');
        $this->assertDatabaseCount('companies', 0);
    }

    public function test_authenticated_user_can_update_company_name_without_changing_logo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $company = Company::create(['name' => 'Old Name', 'logo_path' => 'logos/original.png']);
        Storage::disk('public')->put('logos/original.png', 'conteudo');

        $response = $this->actingAs($user)->put(route('admin.companies.update', $company), [
            'name' => 'New Name',
        ]);

        $response->assertRedirect(route('admin.settings.edit'));
        $company->refresh();
        $this->assertSame('New Name', $company->name);
        $this->assertSame('logos/original.png', $company->logo_path);
        Storage::disk('public')->assertExists('logos/original.png');
    }

    public function test_updating_logo_deletes_previous_file(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $company = Company::create(['name' => 'Acme', 'logo_path' => 'logos/original.png']);
        Storage::disk('public')->put('logos/original.png', 'conteudo');

        $this->actingAs($user)->put(route('admin.companies.update', $company), [
            'name' => 'Acme',
            'logo' => UploadedFile::fake()->image('novo.png'),
        ]);

        Storage::disk('public')->assertMissing('logos/original.png');
    }

    public function test_authenticated_user_can_delete_company(): void
    {
        Storage::fake('public');
        $user = User::factory()->create();
        $company = Company::create(['name' => 'Acme', 'logo_path' => 'logos/acme.png']);
        Storage::disk('public')->put('logos/acme.png', 'conteudo');

        $response = $this->actingAs($user)->delete(route('admin.companies.destroy', $company));

        $response->assertRedirect(route('admin.settings.edit'));
        $this->assertDatabaseMissing('companies', ['id' => $company->id]);
        Storage::disk('public')->assertMissing('logos/acme.png');
    }
}
