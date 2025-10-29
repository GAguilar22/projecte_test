<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Joc>
 */
class JocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->words(2, true),

            'estudi' => $this->faker->randomElement([
                'Nintendo', 'Ubisoft', 'FromSoftware', 'Electronic Arts', 'Square Enix', 'Capcom', 'Valve', 'Bethesda', 'CD Projekt'
            ]),

            'data_publicacio' => $this->faker->date($format = 'Y-m-d', $max = 'now'),

            'genere' => $this->faker->randomElement([
                'Acció', 'Aventura', 'RPG', 'Esports', 'Simulació', 'Terror', 'Puzzle'
            ]),

            'puntuacio' => $this->faker->randomFloat(1, 0, 10),

            'fotografia' => $this->faker->imageUrl(640, 480, 'games', true),
        ];
    }
}
