<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingSeat;
use App\Models\Cinema;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;
use GuzzleHttp\Client;


class PaymentController extends Controller
{
    public function showPayment(Request $request)
    {
        $showtime = Showtime::with(['movie', 'hall'])->findOrFail($request->showtime_id);
        $selectedSeatIds = $request->input('selected_seats');
        $selectedSeats = Seat::whereIn('id', $selectedSeatIds)->get();

        $totalAmount = count($selectedSeatIds) * $showtime->price;

        $seatNumbers = $selectedSeats->pluck('seat_number')->toArray();

        return view('client.pages.payment', compact('showtime', 'selectedSeats','selectedSeatIds', 'seatNumbers', 'totalAmount'));
    }

    public function checkout(Request $request)
    {
        $showtime = Showtime::with(['movie', 'hall'])->findOrFail($request->showtime_id);

        $selectedSeatIds = explode(',', $request->input('selected_seats'));

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'showtime_id' => $showtime->id,
            'total_price' => count($selectedSeatIds) * $showtime->price,
            'status' => 'booked',
        ]);

        foreach ($selectedSeatIds as $seatId) {
            BookingSeat::create([
                'booking_id' => $booking->id,
                'seat_id' => $seatId,
                'price' => $showtime->price,
            ]);
        }

        return redirect()->route('booking.success', ['booking' => $booking->id]);

    }

}
