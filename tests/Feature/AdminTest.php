<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Knjiga;
use App\Models\Rezervacija;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function brisanje_korisnika()
    {
        $admin = User::factory()->create(['tip' => 'bibliotekar']);
        $korisnik = User::factory()->create(['tip' => 'korisnik']);
        $knjiga = Knjiga::factory()->create(['status' => 'rezervisana']);
        $rezervacija = Rezervacija::factory()->create([
            'user_id' => $korisnik->id,
            'knjiga_id' => $knjiga->id,
        ]);

        $this->actingAs($admin)
            ->delete(route('admins.destroy', $korisnik->id))
            ->assertRedirect(route('admins.index'))
            ->assertSessionHas('success', 'Korisnik je uspešno obrisan.');

        $this->assertDatabaseMissing('users', ['id' => $korisnik->id]);
        $this->assertDatabaseMissing('rezervacijas', ['id' => $rezervacija->id]);

        $this->assertDatabaseHas('knjigas', [
            'id' => $knjiga->id,
            'status' => 'rezervisana', //dostupna
        ]);
    }
}