@extends('admin.layouts.index')
@section('title', 'Tạo Suất Chiếu Mới')

@section('content')
    <div class="container mt-4">
        <h1>Tạo Suất Chiếu Mới</h1>
        <form action="{{ route('showtimes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="movie_id" class="form-label">Phim</label>
                <select id="movie_id" name="movie_id" class="form-select" required>
                    <option value="">Chọn Phim</option>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hall_id" class="form-label">Phòng Chiếu</label>
                <select id="hall_id" name="hall_id" class="form-select" required>
                    <option value="">Chọn Phòng Chiếu</option>
                    @foreach ($halls as $hall)
                        <option value="{{ $hall->id }}">{{ $hall->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="show_date" class="form-label">Ngày Chiếu</label>
                <input type="date" class="form-control" id="show_date" name="show_date" required>
            </div>

            <div class="mb-3">
                <label for="show_time" class="form-label">Thời Gian Chiếu</label>
                <input type="time" class="form-control" id="show_time" name="show_time" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá Vé</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
            <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
@endsection
