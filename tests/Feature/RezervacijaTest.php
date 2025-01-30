<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Knjiga;
use App\Models\Rezervacija;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RezervacijaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function korisnik_rezervise_knjigu()
    {
        $korisnik = User::factory()->create(['tip' => 'korisnik']);
        $knjiga = Knjiga::factory()->create(['status' => 'dostupna']);

        $this->actingAs($korisnik)
            ->post(route('rezervacijas.store'), [
                'knjiga_id' => $knjiga->id,
                'rezervisana_od' => now(),
                'rezervisana_do' => now()->addDays(7),
            ])
            ->assertRedirect(route('home'))
            ->assertSessionHas('success', 'Knjiga je uspešno rezervisana.');

        $this->assertDatabaseHas('rezervacijas', [
            'user_id' => $korisnik->id,
            'knjiga_id' => $knjiga->id,
        ]);

        $this->assertDatabaseHas('knjigas', [
            'id' => $knjiga->id,
            'status' => 'rezervisana',
        ]);
    }
}