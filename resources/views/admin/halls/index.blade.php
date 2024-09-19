@extends('admin.layouts.index')
@section('title', 'Danh sách phòng chiếu phim')
@section('content')
    <div class="container mt-4">
        <h1>Danh Sách Các Phòng Chiếu</h1>
        <a class="btn btn-success mb-2" href="{{ route('halls.create') }}">Tạo Mới Phòng Chiếu</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
            <tr>
                <th>STT</th>
                <th>Rạp</th>
                <th>Tên Phòng</th>
                <th>Số Ghế</th>
                <th width="280px">Hành Động</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($halls as $hall)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hall->cinema->name }}</td>
                    <td>{{ $hall->name }}</td>
                    <td>{{ $hall->seat_capacity }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('halls.edit', $hall->id) }}">Sửa</a>
                        <form action="{{ route('halls.destroy', $hall->id) }}" method="POST" style="display:inline-block;">
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
