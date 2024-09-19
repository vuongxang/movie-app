<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    public function run()
    {
        $actors = [
            [
                'name' => 'Ngô Thanh Vân',
            ],
            [
                'name' => 'Hồng Ánh',
            ],
            [
                'name' => 'Lý Hải',
            ],
        ];

        DB::table('actors')->insert($actors);
    }
}
