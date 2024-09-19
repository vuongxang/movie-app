<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Hall;
use Carbon\Carbon;

class ShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::all();
        $halls = Hall::all();

        foreach ($halls as $hall) {
            foreach ($movies as $movie) {
                Showtime::create([
                    'movie_id' => $movie->id,
                    'hall_id' => $hall->id,
                    'show_date' => Carbon::now()->addDays(rand(1, 30)),
                    'show_time' => '18:00:00',
                    'price' => 100.00,
                ]);
            }
        }
    }
}
