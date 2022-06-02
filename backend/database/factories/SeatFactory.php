<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seat>
 */
class SeatFactory extends Factory
{
    const ROWS = 10;
    const NUMBERS = 10;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
        ];
    }

    public function setSeats()
    {
        $seats = [];
        for ($i = 0; $i < self::ROWS; $i++) {
            for ($j = 0; $j < self::NUMBERS; $j++) {
                $seats[] = array(
                    'row' => $i,
                    'numbver' => $j
                );
            }
        }
        return $seats;
    }
}
