<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AdminController
 */
final class AdminControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $admins = Admin::factory()->count(3)->create();

        $response = $this->get(route('admins.index'));

        $response->assertOk();
        $response->assertViewIs('admin.index');
        $response->assertViewHas('admins');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('admins.create'));

        $response->assertOk();
        $response->assertViewIs('admin.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AdminController::class,
            'store',
            \App\Http\Requests\AdminStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('admins.store'));

        $response->assertRedirect(route('admins.index'));
        $response->assertSessionHas('admin.id', $admin->id);

        $this->assertDatabaseHas(admins, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->get(route('admins.show', $admin));

        $response->assertOk();
        $response->assertViewIs('admin.show');
        $response->assertViewHas('admin');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->get(route('admins.edit', $admin));

        $response->assertOk();
        $response->assertViewIs('admin.edit');
        $response->assertViewHas('admin');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AdminController::class,
            'update',
            \App\Http\Requests\AdminUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->put(route('admins.update', $admin));

        $admin->refresh();

        $response->assertRedirect(route('admins.index'));
        $response->assertSessionHas('admin.id', $admin->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $admin = Admin::factory()->create();

        $response = $this->delete(route('admins.destroy', $admin));

        $response->assertRedirect(route('admins.index'));

        $this->assertModelMissing($admin);
    }
}
