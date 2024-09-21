@extends('client.layouts.index')

@section('title', 'Đặt vé thành công')
@section('content')
    <div class="container">
        <h1>Đặt Vé Thành Công!</h1>
        <p>Cảm ơn bạn đã đặt vé!</p>
        <h2>Thông tin đặt vé:</h2>
        <p><strong>Phim:</strong> {{ $booking->showtime->movie->title }}</p>
        <p><strong>Rạp:</strong> {{ $booking->showtime->hall->cinema->name }}</p>
        <p><strong>Phòng chiếu:</strong> {{ $booking->showtime->hall->name }}</p>
        <p><strong>Xuất chiếu:</strong> {{ $booking->showtime->show_date }}</p>
        <p><strong>Ghế đã chọn:</strong>
            @foreach ($booking->bookingSeats as $bookingSeat)
                {{ $bookingSeat->seat->seat_number }}@if (!$loop->last), @endif
            @endforeach
        </p>
        <p><strong>Tổng tiền:</strong> {{ number_format($booking->total_amount) }} VNĐ</p>
    </div>
@endsection
