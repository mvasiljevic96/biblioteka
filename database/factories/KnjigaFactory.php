<?php

namespace Database\Factories;

use App\Models\Knjiga;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class KnjigaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Knjiga::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'naziv' => $this->faker->text(255),
            'autor' => $this->faker->text(255),
            'opis' => $this->faker->text(),
            'status' => 'dostupna',
        ];
    }
}
