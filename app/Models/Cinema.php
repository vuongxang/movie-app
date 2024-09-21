<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip_code',
        'phone',
    ];

    public function showtimes()
    {
        return $this->hasMany(Showtime::class);
    }

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}
