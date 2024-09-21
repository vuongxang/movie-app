<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'showtime_id',
        'total_price',
        'status',
    ];

    // Định nghĩa quan hệ với model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Định nghĩa quan hệ với model Showtime
    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    // Quan hệ với bảng booking_seats
    public function bookingSeats()
    {
        return $this->hasMany(BookingSeat::class);
    }
}
