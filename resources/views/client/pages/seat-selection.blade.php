@extends('client.layouts.index')

@section('title', 'Chọn Ghế')

@section('content')
    <div class="container mt-4 mb-4">
        <h2>Chọn ghế cho suất chiếu {{ $showtime->time }} - {{ $showtime->hall->name }}</h2>
        <div class="seat-selection">
            <div class="screen text-center mb-4">
            </div>
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
                                echo '<div class="row justify-content-center mt-2">';
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
                                   class="seat btn {{ $isBooked ? 'btn-danger' : 'btn-outline-success' }} m-1">
                                {{ $seat->seat_number }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary">Tiếp theo</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <h4>Tổng tiền: <span id="totalAmount">0</span> VNĐ</h4>
    </div>
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

                $('#totalAmount').text(totalAmount);
            });
        });
    </script>
@endsection


<style>
    .seat-checkbox {
        display: none; /* Ẩn checkbox */
    }

    .seat {
        cursor: pointer; /* Chỉ thị con trỏ khi hover */
    }

    .seat-checkbox:checked + .seat {
        background-color: #007bff; /* Màu khi chọn ghế */
        color: white; /* Màu chữ khi chọn */
    }

    .seat-danger {
        background-color: #dc3545; /* Màu cho ghế đã đặt */
        color: white;
    }

</style>
