@extends('client.layouts.index')

@section('title', 'Chọn Ghế')

@section('css')
<style>
    .seat-selection-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .screen {
        height: 50px;
        background-color: #e9ecef;
        margin-bottom: 30px;
        border-radius: 5px;
        position: relative;
    }

    .screen::after {
        content: 'Màn hình';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-weight: bold;
        color: #6c757d;
    }

    .seat-layout {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .seat-row {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .seat-checkbox {
        display: none;
    }

    .seat {
        width: 40px;
        height: 40px;
        margin: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .seat-checkbox:checked + .seat {
        background-color: #28a745;
        color: white;
    }

    .seat-checkbox:disabled + .seat {
        background-color: #dc3545;
        color: white;
        cursor: not-allowed;
    }

    .total-amount {
        font-size: 1.2em;
        font-weight: bold;
        color: #007bff;
    }

    .btn-next {
        margin-top: 20px;
    }
</style>
@endsection

@section('content')
    <div class="container mt-4 mb-4">
        <div class="seat-selection-container">
            <h2 class="text-center mb-4">Chọn ghế cho suất chiếu {{ $showtime->time }} - {{ $showtime->hall->name }}</h2>
            <div class="seat-selection">
                <div class="screen"></div>
                <form action="{{ route('payment.show') }}" method="POST">
                    @csrf
                    <input type="hidden" name="showtime_id" value="{{ $showtime->id }}">
                    <div class="seat-layout">
                        @php
                            $currentRow = null;
                        @endphp

                        @foreach($seats as $seat)
                            @php
                                $isBooked = in_array($seat->id, $bookedSeats);
                                if ($seat->row_name !== $currentRow) {
                                    if ($currentRow !== null) {
                                        echo '</div>';
                                    }
                                    echo '<div class="seat-row">';
                                    $currentRow = $seat->row_name;
                                }
                            @endphp

                            <div>
                                <input type="checkbox" id="seat-{{ $seat->id }}" class="seat-checkbox"
                                       value="{{$seat->id}}"
                                       name="selected_seats[]"
                                       data-price="{{ $showtime->price }}"
                                    {{ $isBooked ? 'disabled' : '' }} />
                                <label for="seat-{{ $seat->id }}"
                                       class="seat btn {{ $isBooked ? 'btn-danger' : 'btn-outline-success' }}">
                                    {{ $seat->seat_number }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="text-center mt-4">
                        <h4>Tổng tiền: <span id="totalAmount" class="total-amount">0</span> VNĐ</h4>
                        <button type="submit" class="btn btn-primary btn-lg btn-next">Tiếp theo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        let totalAmount = 0;

        $('.seat-checkbox').on('change', function () {
            let seatPrice = parseFloat($(this).data('price'));

            if (this.checked) {
                totalAmount += seatPrice;
            } else {
                totalAmount -= seatPrice;
            }

            $('#totalAmount').text(totalAmount.toLocaleString('vi-VN'));
        });
    });
</script>
@endsection
