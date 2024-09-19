@extends('admin.layouts.index')
@section('title', 'Tạo mới rạp phim')

@section('content')
    <div class="container mt-4">
        <h1>Tạo Phòng Chiếu Mới</h1>
        <form action="{{ route('halls.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cinema_id" class="form-label">Rạp</label>
                <select id="cinema_id" name="cinema_id" class="form-select" required>
                    <option value="">Chọn Rạp</option>
                    @foreach ($cinemas as $cinema)
                        <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên Phòng</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="seat_capacity" class="form-label">Số Ghế</label>
                <input type="number" class="form-control" id="seat_capacity" name="seat_capacity" required>
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
            <a href="{{ route('halls.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
@endsection
