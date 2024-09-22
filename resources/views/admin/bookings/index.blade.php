@extends('admin.layouts.index')
@section('title', 'Danh Sách Vé Đã Đặt')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Danh Sách Vé Đã Đặt</h2>
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->user->name }}</h5>
                            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                            <p><strong>Số Ghế:</strong>
                                @foreach($booking->bookingSeats as $bookingSeat)
                                    {{ $bookingSeat->seat->seat_number }}{{ !$loop->last ? ', ' : '' }}
                                @endforeach
                            </p>
                            <p><strong>Rạp:</strong> {{ $booking->showtime->hall->cinema->name }}</p>
                            <p><strong>Phòng Chiếu:</strong> {{ $booking->showtime->hall->name }}</p>
                            <p><strong>Tổng Tiền:</strong> {{ number_format($booking->total_price, 0, ',', '.') }} VNĐ</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
