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

    public function index()
    {
        $bookings = Booking::with(['user', 'showtime.hall', 'bookingSeats.seat'])->get();

        return view('admin.bookings.index', compact('bookings'));
    }

}
