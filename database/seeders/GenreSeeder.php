<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            ['name' => 'Hành Động'],
            ['name' => 'Kinh Dị'],
            ['name' => 'Hài'],
            ['name' => 'Tình Cảm'],
            ['name' => 'Phiêu Lưu'],
            ['name' => 'Khoa Học Viễn Tưởng'],
            ['name' => 'Hoạt Hình'],
            ['name' => 'Kịch Tính'],
            ['name' => 'Âm Nhạc'],
            ['name' => 'Tội Phạm'],
        ];

        DB::table('genres')->insert($genres);
    }
}
