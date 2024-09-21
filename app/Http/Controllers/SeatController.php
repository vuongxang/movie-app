<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSeat;
use App\Models\Showtime;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function seatSelection($showtime_id)
    {
        $showtime = Showtime::find($showtime_id);
        $hall = $showtime->hall;
        $seats = $hall->seats;  // Lấy danh sách ghế trong phòng chiếu
        // Lấy thông tin ghế đã được đặt
// Lấy tất cả ghế đã đặt cho showtime cụ thể
        $bookedSeats = BookingSeat::whereHas('booking', function ($query) use ($showtime_id) {
            $query->where('showtime_id', $showtime_id);
        })->pluck('seat_id')->toArray();

        return view('client.pages.seat-selection', compact('showtime', 'hall', 'seats', 'bookedSeats'));
    }

}
