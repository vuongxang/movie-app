@extends('admin.layouts.index')
@section('title', 'Danh Sách Các Suất Chiếu')

@section('content')
    <div class="container mt-4">
        <h1>Danh Sách Các Suất Chiếu</h1>
        <a class="btn btn-success mb-2" href="{{ route('showtimes.create') }}">Tạo Mới Suất Chiếu</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Phim</th>
                <th>Phòng Chiếu</th>
                <th>Ngày Chiếu</th>
                <th>Thời Gian Chiếu</th>
                <th>Giá Vé</th>
                <th width="280px">Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($showtimes as $showtime)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $showtime->movie->title }}</td>
                    <td>{{ $showtime->hall->name }}</td>
                    <td>{{ $showtime->show_date }}</td>
                    <td>{{ $showtime->show_time }}</td>
                    <td>{{ $showtime->price }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('showtimes.edit', $showtime->id) }}">Sửa</a>
                        <form action="{{ route('showtimes.destroy', $showtime->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
