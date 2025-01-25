<?php

namespace Database\Seeders;

use App\Models\Knjiga;
use App\Models\Rezervacija;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;


class RezervacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Uzmi korisnika (npr. prvi korisnik u bazi)
      $user = User::first();

      // Uzmi knjigu koja je unapred rezervisana
      $knjiga = Knjiga::where('naziv', 'Gospodar prstenova')->first();

      // Kreiraj rezervaciju za ovu knjigu
      Rezervacija::create([
          'user_id' => $user->id, // Pretpostavljamo da postoji korisnik u bazi
          'knjiga_id' => $knjiga->id,
          'rezervisana_od' => Carbon::now(),
          'rezervisana_do' => '30.01.2025',
      ]);

      // Promeni status knjige u 'rezervisana'
      $knjiga->update(['status' => 'rezervisana']);
    }
}
