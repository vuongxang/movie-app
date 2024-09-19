<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hall;
use App\Models\Cinema;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemas = Cinema::all();

        foreach ($cinemas as $cinema) {
            Hall::create([
                'cinema_id' => $cinema->id,
                'name' => $cinema->name . ' - Phòng 1',
                'seat_capacity' => 100,
            ]);

            Hall::create([
                'cinema_id' => $cinema->id,
                'name' => $cinema->name . ' - Phòng 2',
                'seat_capacity' => 150,
            ]);
        }
    }
}
