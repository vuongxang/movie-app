@extends('admin.layouts.index')
@section('title', 'Thêm mới thể loại')

@section('content')
    <h1>Thêm thể loại mới</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên thể loại:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
@endsection
