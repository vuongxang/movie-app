@extends('admin.layouts.index')
@section('title', 'Sửa Thông Tin Suất Chiếu')

@section('content')
    <div class="container mt-4">
        <h1>Sửa Thông Tin Suất Chiếu</h1>
        <form action="{{ route('showtimes.update', $showtime->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="movie_id" class="form-label">Phim</label>
                <select id="movie_id" name="movie_id" class="form-select" required>
                    @foreach ($movies as $movie)
                        <option value="{{ $movie->id }}" {{ $showtime->movie_id == $movie->id ? 'selected' : '' }}>
                            {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="hall_id" class="form-label">Phòng Chiếu</label>
                <select id="hall_id" name="hall_id" class="form-select" required>
                    @foreach ($halls as $hall)
                        <option value="{{ $hall->id }}" {{ $showtime->hall_id == $hall->id ? 'selected' : '' }}>
                            {{ $hall->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="show_date" class="form-label">Ngày Chiếu</label>
                <input type="date" class="form-control" id="show_date" name="show_date" value="{{ $showtime->show_date }}" required>
            </div>

            <div class="mb-3">
                <label for="show_time" class="form-label">Thời Gian Chiếu</label>
                <input type="time" class="form-control" id="show_time" name="show_time" value="{{ $showtime->show_time }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá Vé</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $showtime->price }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
@endsection


