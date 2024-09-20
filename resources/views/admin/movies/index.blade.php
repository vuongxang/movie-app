@extends('admin.layouts.index')
@section('title', 'Danh sách Phim')
@section('content')
    <div class="container">
        <h1 class="mb-4">Danh sách Phim</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Tạo Phim Mới</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tựa đề</th>
                <th>Ảnh bìa</th>
                <th>Thời lượng</th>
                <th>Ngày phát hành</th>
                <th>Rated</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>
                        @if($movie->poster_url)
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Poster" style="max-width: 100px;">
                        @endif
                    </td>
                    <td>{{ $movie->duration }} phút</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->rated }}</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
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
