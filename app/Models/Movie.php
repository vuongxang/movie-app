<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    const RATED_OPTIONS = [
        'T18' => 'T18 - Phim được phổ biến đến người xem từ đủ 18 tuổi trở lên (18+)',
        'T13' => 'T13 - Phim được phổ biến đến người xem từ đủ 13 tuổi trở lên (13+)',
        'T16' => 'T16 - Phim được phổ biến đến người xem từ đủ 16 tuổi trở lên (16+)',
        'K'   => 'K - Phim được phổ biến đến người xem dưới 13 tuổi và có người bảo hộ đi kèm',
        'P'   => 'P - Phim được phép phổ biến đến người xem ở mọi độ tuổi.',
    ];

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
