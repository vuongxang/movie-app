<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with(['actors', 'directors', 'genres'])->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();
        return view('admin.movies.create', compact('actors', 'directors', 'genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'duration' => 'required|integer',
            'release_date' => 'required|date',
//            'poster_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $movie = new Movie();
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;

        if ($request->hasFile('poster_url')) {
            $movie->poster_url = $request->file('poster_url')->store('posters', 'public');
        }

        $movie->save();


        return redirect()->route('movies.index')->with('success', 'Phim đã được tạo thành công!');
    }

    public function show(Movie $movie)
    {
        return view('movies.detail', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $actors = Actor::all();
        $directors = Director::all();
        $genres = Genre::all();
        $movieActors = $movie->actors->pluck('id')->toArray();
        $movieDirectors = $movie->directors->pluck('id')->toArray();
        $movieGenres = $movie->genres->pluck('id')->toArray();

        return view('admin.movies.edit', compact('movie', 'actors', 'directors', 'genres', 'movieActors', 'movieDirectors', 'movieGenres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'duration' => 'required|integer',
            'release_date' => 'required|date',
//            'poster_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->release_date = $request->release_date;

        // Xử lý upload ảnh
        if ($request->hasFile('poster_url')) {
            // Xóa ảnh cũ nếu có
            if ($movie->poster_url) {
                Storage::disk('public')->delete($movie->poster_url);
            }
            $movie->poster_url = $request->file('poster_url')->store('posters', 'public');
        }

        $movie->save();

        // Attach actors, directors, genres...

        return redirect()->route('movies.index')->with('success', 'Phim đã được cập nhật thành công!');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }

    public function nowShowing()
    {
        $nowShowingMovies = Movie::all();
        return view('client.pages.now-showing',['movies' => $nowShowingMovies]);
    }

    public function comingSoon()
    {
        $comingSoonMovies = Movie::all();
        return view('client.pages.coming-soon',['movies' => $comingSoonMovies]);
    }

    public function detail($id)
    {
        $movie = Movie::with(['actors', 'directors', 'genres'])->findOrFail($id);
        return view('client.pages.movie-detail', compact('movie'));
    }
}
