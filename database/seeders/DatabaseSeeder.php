<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        User::create([
            'ime' => 'admin',
            'prezime' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'tip' => 'bibliotekar',
        ]);

        $this->call(KnjigaSeeder::class);
        $this->call(RezervacijaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
