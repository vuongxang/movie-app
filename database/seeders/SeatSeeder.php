<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Hall;

class SeatSeeder extends Seeder
{
    public function run()
    {
        $halls = Hall::all();

        foreach ($halls as $hall) {
            $capacity = $hall->seat_capacity;
            $rows = ceil($capacity / 13); // Giả định mỗi hàng có 13 ghế
            $columns = 13;

            $alphabet = range('A', 'Z'); // Mã hàng: A, B, C, ...

            for ($row = 0; $row < $rows; $row++) {
                for ($col = 1; $col <= $columns; $col++) {
                    if (($row * $columns + $col) > $capacity) break;

                    Seat::create([
                        'hall_id' => $hall->id,
                        'seat_number' => $alphabet[$row] . $col,
                        'seat_type' => 'standard', // Hoặc kiểu ghế khác nếu có
                        'row_name' => $row + 1,
                        'column_name' => $alphabet[$row],
                    ]);
                }
            }
        }
    }
}
