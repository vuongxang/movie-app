@extends('admin.layouts.index')
@section('title', 'Tạo Phim Mới')
@section('content')
    <div class="container">
        <h1>Tạo Phim Mới</h1>

        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Tựa đề</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="poster_url">Ảnh bìa</label>
                <input type="file" name="poster_url" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                <label for="title">Trailer url</label>
                <input type="text" class="form-control" id="trailer_url" name="trailer_url" required>
            </div>

            <div class="form-group">
                <label for="duration">Thời lượng (phút)</label>
                <input type="number" class="form-control" id="duration" name="duration" required>
            </div>

            <div class="form-group">
                <label for="release_date">Ngày phát hành</label>
                <input type="date" class="form-control" id="release_date" name="release_date" required>
            </div>

            <div class="form-group">
                <label for="rated">Rated</label>
                <select name="rated" id="rated" class="form-control" required>
                    @foreach(Movie::RATED_OPTIONS as $code => $description)
                        <option value="{{ $code }}">
                            {{ $description }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="now-showing">Đang Chiếu</option>
                    <option value="coming-soon">Sắp Chiếu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="actors">Diễn viên</label>
                <select name="actors[]" class="form-control" multiple>
                    @foreach($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="directors">Đạo diễn</label>
                <select name="directors[]" class="form-control" multiple>
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genres">Thể loại</label>
                <select name="genres[]" class="form-control" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
