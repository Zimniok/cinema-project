<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'tag' => $this->faker->text(20),
            'duration' => $this->faker->randomNumber(2, true),
            'short_description' => $this->faker->text(50),
            'long_description' => $this->faker->text(),
        ];
    }
}
