<?php

namespace Database\Factories;

use App\Models\Rezervacija;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RezervacijaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rezervacija::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rezervisana_od' => $this->faker->date(),
            'rezervisana_do' => $this->faker->date(),
            'user_id' => \App\Models\User::factory(),
            'knjiga_id' => \App\Models\Knjiga::factory(),
        ];
    }
}
