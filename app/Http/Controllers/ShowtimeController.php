<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Showtime;
use App\Models\Movie;
use App\Models\Hall;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::with(['movie', 'hall'])->get();
        return view('admin.showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $halls = Hall::all();

        return view('admin.showtimes.create', compact('movies', 'halls'));
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'movie_id' => 'required|exists:movies,id',
//            'hall_id' => 'required|exists:halls,id',
//            'show_date' => 'required|date',
//            'show_time' => 'required|date_format:H:i:s',
//            'price' => 'required|numeric',
//        ]);

        Showtime::create($request->all());
        return redirect()->route('showtimes.index')->with('success', 'Showtime created successfully.');
    }

    public function edit(Showtime $showtime)
    {
        $movies = Movie::all();
        $halls = Hall::all();
        return view('admin.showtimes.edit', compact('showtime', 'movies', 'halls'));
    }

    public function update(Request $request, Showtime $showtime)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
            'show_date' => 'required|date',
            'show_time' => 'required|date_format:H:i:s',
            'price' => 'required|numeric',
        ]);

        $showtime->update($request->all());
        return redirect()->route('showtimes.index')->with('success', 'Showtime updated successfully.');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Showtime deleted successfully.');
    }

    public function getShowtimes(Request $request)
    {
        $date = $request->input('date');
        $city = $request->input('city');
        $movieId = $request->input('movieId'); // Nhận movieId từ request

        // Lọc các rạp theo city và lấy các showtimes theo movieId và date
        $cinemas = Cinema::where('city', $city)
            ->with(['halls.showtimes' => function ($query) use ($date, $movieId) {
                $query->where('show_date', $date)
                    ->where('movie_id', $movieId); // Lọc theo movieId
            }])
            ->get();

        // Render view cho suất chiếu
        return view('client.blocks.showtimes', ['cinemas' => $cinemas]);
    }

}
