@extends('admin.layouts.index')
@section('title', 'Danh Sách Phim')

@section('content')
    <div class="container mt-4">
        <h1>Danh Sách Phim</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-success mb-2">Tạo Phim Mới</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Tựa Đề</th>
                <th>Ảnh Bìa</th>
                <th>Thời Lượng</th>
                <th>Ngày Phát Hành</th>
                <th>Rated</th>
                <th width="280px">Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>
                        @if($movie->poster_url)
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Poster" style="max-width: 30px">
                        @endif
                    </td>
                    <td>{{ $movie->duration }} phút</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ \App\Models\Movie::RATED_OPTIONS[$movie->rated] ?? 'N/A' }}</td>

                    <td>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-info btn-sm">Sửa</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
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
