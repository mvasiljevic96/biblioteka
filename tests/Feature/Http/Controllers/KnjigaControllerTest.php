<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Knjiga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\KnjigaController
 */
final class KnjigaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $knjigas = Knjiga::factory()->count(3)->create();

        $response = $this->get(route('knjigas.index'));

        $response->assertOk();
        $response->assertViewIs('knjiga.index');
        $response->assertViewHas('knjigas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('knjigas.create'));

        $response->assertOk();
        $response->assertViewIs('knjiga.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KnjigaController::class,
            'store',
            \App\Http\Requests\KnjigaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('knjigas.store'));

        $response->assertRedirect(route('knjigas.index'));
        $response->assertSessionHas('knjiga.id', $knjiga->id);

        $this->assertDatabaseHas(knjigas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $knjiga = Knjiga::factory()->create();

        $response = $this->get(route('knjigas.show', $knjiga));

        $response->assertOk();
        $response->assertViewIs('knjiga.show');
        $response->assertViewHas('knjiga');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $knjiga = Knjiga::factory()->create();

        $response = $this->get(route('knjigas.edit', $knjiga));

        $response->assertOk();
        $response->assertViewIs('knjiga.edit');
        $response->assertViewHas('knjiga');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KnjigaController::class,
            'update',
            \App\Http\Requests\KnjigaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $knjiga = Knjiga::factory()->create();

        $response = $this->put(route('knjigas.update', $knjiga));

        $knjiga->refresh();

        $response->assertRedirect(route('knjigas.index'));
        $response->assertSessionHas('knjiga.id', $knjiga->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $knjiga = Knjiga::factory()->create();

        $response = $this->delete(route('knjigas.destroy', $knjiga));

        $response->assertRedirect(route('knjigas.index'));

        $this->assertModelMissing($knjiga);
    }
}
