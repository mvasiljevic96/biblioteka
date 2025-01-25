<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        User::create([
            'ime' => 'Marko',
            'prezime' => 'Vasiljevic',
            'email' => 'mare@mare',
            'password' => Hash::make('mare'),
            'tip' => 'korisnik',
        ]);

    }
}
