<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const SEATS_ROWS = 10;
    const SEATS_NUMBERS = 10;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Movie::factory(10)->create();
        \App\Models\Screening::factory(50)->create();
        for ($i = 1; $i <= self::SEATS_ROWS; $i++) {
            for ($j = 1; $j <= self::SEATS_NUMBERS; $j++) {
                \App\Models\Seat::factory()->create([
                    'row' => $i,
                    'number' => $j,
                ]);

            }
        }
        \App\Models\Ticket::factory(10)->create();


    }
}
