<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'duration', 'release_date', 'poster_url',
        'trailer_url', 'language', 'rated'
    ];

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor');
    }

    public function directors()
    {
        return $this->belongsToMany(Director::class, 'movie_director');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }
}
