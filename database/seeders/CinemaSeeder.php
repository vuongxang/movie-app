<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemas = [
            [
                'name' => 'CGV Vincom Bà Triệu',
                'address' => 'Tầng 6, TTTM Vincom Bà Triệu, 191 Bà Triệu, Hai Bà Trưng, Hà Nội',
                'city' => 'Hà Nội',
                'state' => null,
                'zip_code' => null,
                'phone' => '024 3974 3350',
            ],
            [
                'name' => 'CGV Vincom Royal City',
                'address' => 'B1-R3, 72A Nguyễn Trãi, Thanh Xuân, Hà Nội',
                'city' => 'Hà Nội',
                'state' => null,
                'zip_code' => null,
                'phone' => '024 3200 4567',
            ],
            [
                'name' => 'CGV Aeon Mall Long Biên',
                'address' => 'Tầng 4, TTTM Aeon Mall, Số 27, Đường Cổ Linh, Long Biên, Hà Nội',
                'city' => 'Hà Nội',
                'state' => null,
                'zip_code' => null,
                'phone' => '024 3269 3000',
            ],
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }
    }
}
