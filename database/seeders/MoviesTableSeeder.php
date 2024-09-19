<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'KHÔNG NÓI ĐIỀU DỮ',
            'description' => 'Một cặp vợ chồng trẻ tình cờ gặp một gia đình đang phải trải qua nỗi đau mất mát trong một kỳ nghỉ và nhanh chóng trở thành bạn bè thân thiết. Tuy nhiên, một buổi tối, họ bị cuốn vào một trò chơi kinh hoàng mà không thể thoát ra.',
            'duration' => 97,
            'release_date' => '2023-11-01',
            'poster_url' => 'https://cgv.vn/media/films/speak-no-evil-poster.jpg',
            'trailer_url' => 'https://cgv.vn/media/trailers/speak-no-evil-trailer.mp4',
            'language' => 'English',
            'rated' => 'T18 - Phim được phổ biến đến người xem từ đủ 18 tuổi trở lên (18+)'
        ]);
    }
}
