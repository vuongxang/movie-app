<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DirectorSeeder extends Seeder
{
    public function run()
    {
        $directors = [
            [
                'name' => 'Victor Vũ',
            ],
            [
                'name' => 'Đặng Nhật Minh',
            ],
            [
                'name' => 'Bùi Thạc Chuyên',
            ],
        ];

        DB::table('directors')->insert($directors);
    }
}
