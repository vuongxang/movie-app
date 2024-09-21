<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function showSuccess($bookingId)
    {
        $booking = Booking::with(['showtime', 'bookingSeats.seat'])->findOrFail($bookingId);

        return view('client.pages.success', compact('booking'));
    }

}
