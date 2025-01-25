<?php

namespace Database\Seeders;

use App\Models\Rezervacija;
use Illuminate\Database\Seeder;

class RezervacijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rezervacija::factory()
            ->count(5)
            ->create();
    }
}
