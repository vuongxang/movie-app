@extends('client.layouts.index')
@section('title', 'Thanh toán')

@section('content')
    <div class="container">
        <h2>Thanh Toán</h2>
        <p><strong>Phim:</strong> {{ $showtime->movie->title }}</p>
        <p><strong>Rạp:</strong> {{ $showtime->hall->cinema->name }}</p>
        <p><strong>Phòng chiếu:</strong> {{ $showtime->hall->name }}</p>
        <p><strong>Xuất chiếu:</strong> Ngày: {{ $showtime->show_date }} - Giờ: {{$showtime->show_time}}</p>
        <p><strong>Số ghế đã chọn:</strong>
            {{ implode(', ', $seatNumbers) }}

        </p>
        <p><strong>Tổng tiền:</strong> {{ number_format($totalAmount, 0, ',', '.') }} VNĐ</p>

        <form action="{{ route('payment.checkout') }}" method="POST">
            @csrf
            <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
            <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
            <input type="hidden" name="selected_seats" value="{{ implode(',',$selectedSeatIds) }}">
            <button type="submit" class="btn btn-success">Xác Nhận Thanh Toán</button>
        </form>
    </div>
@endsection


