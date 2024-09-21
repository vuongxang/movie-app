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
        // Lấy thông tin showtime
        $showtime = Showtime::with(['movie', 'hall'])->findOrFail($request->showtime_id);

        // Lấy mảng chứa ID ghế đã chọn
        $selectedSeatIds = explode(',', $request->input('selected_seats'));

        // Tạo booking
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

        // Chuyển hướng đến trang đặt vé thành công
        return redirect()->route('booking.success', ['booking' => $booking->id]);

//        // Thông tin cần thiết để gọi API MoMo
//        $client = new Client();
//        $response = $client->post('https://test-payment.momo.vn/v2/gateway/api/create', [
//            'json' => [
//                'partnerCode' => env('MOMO_PARTNER_CODE'),
//                'accessKey' => env('MOMO_ACCESS_KEY'),
//                'requestId' => Str::random(10),
//                'amount' => $request->input('total_amount'), // tổng tiền
//                'orderId' => Str::random(10),
//                'orderInfo' => 'Thanh toán vé xem phim',
//                'returnUrl' => route('payment.success'),
//                'notifyUrl' => route('payment.notify'),
//                'extraData' => '',
//            ],
//        ]);
//
//        $data = json_decode($response->getBody()->getContents(), true);
//
//        // Chuyển hướng đến MoMo để thanh toán
//        return redirect($data['payUrl']);
    }

}
