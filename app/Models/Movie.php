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

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
}
