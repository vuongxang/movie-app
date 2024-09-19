<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Hall;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $halls = Hall::all();

        foreach ($halls as $hall) {
            $capacity = $hall->seat_capacity;
            $rows = ceil($capacity / 15);

            for ($row = 'A'; $row < chr(ord('A') + $rows); $row++) {
                for ($i = 1; $i <= min(15, $capacity); $i++) {
                    Seat::create([
                        'hall_id' => $hall->id,
                        'seat_number' => $row . $i,
                        'seat_type' => ($i % 3 == 0) ? 'VIP' : 'Standard',
                    ]);
                    $capacity--;
                    if ($capacity <= 0) break 2;
                }
            }
        }
    }
}
