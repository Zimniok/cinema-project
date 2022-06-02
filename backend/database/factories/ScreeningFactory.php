<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Screening>
 */
class ScreeningFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'movie_id' => $this->faker->numberBetween(1, 10),
            'language' => $this->faker->languageCode(),
            'type' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'time' => $this->faker->dateTimeBetween('now', '+2 week'),
        ];
    }
}
