@extends('admin.layouts.index')
@section('title', 'Chỉnh sửa Phim')
@section('content')
    <div class="container">
        <h1>Chỉnh sửa Phim</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Tựa đề</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
            </div>

            <div class="form-group">
                <label for="poster_url">Ảnh bìa</label>
                <input type="file" name="poster_url" class="form-control" accept="image/*">
                @if ($movie->poster_url)
                    <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="Poster" class="img-thumbnail" style="max-width: 200px;">
                @endif
            </div>

            <div class="form-group">
                <label for="title">Trailer url</label>
                <input type="text" class="form-control" id="trailer_url" name="trailer_url" value="{{ old('title', $movie->trailer_url) }}" required>
            </div>

            <div class="form-group">
                <label for="duration">Thời lượng (phút)</label>
                <input type="number" class="form-control" id="duration" name="duration" value="{{ old('duration', $movie->duration) }}" required>
            </div>

            <div class="form-group">
                <label for="release_date">Ngày phát hành</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date) }}" required>
            </div>

            <div class="form-group">
                <label for="rated">Rated</label>
                <select name="rated" id="rated" class="form-control" required>
                    @foreach(\App\Models\Movie::RATED_OPTIONS as $code => $description)
                        <option value="{{ $code }}" {{ isset($movie) && $movie->rated == $code ? 'selected' : '' }}>
                            {{ $description }}
                        </option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="status">Trạng thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="now-showing" {{ $movie->status == 'now-showing' ? 'selected' : '' }}>Đang Chiếu</option>
                    <option value="coming-soon" {{ $movie->status == 'coming-soon' ? 'selected' : '' }}>Sắp Chiếu</option>
                </select>
            </div>

            <div class="form-group">
                <label for="actors">Diễn viên</label>
                <select name="actors[]" class="form-control" multiple>
                    @foreach($actors as $actor)
                        <option value="{{ $actor->id }}" {{ in_array($actor->id, $movieActors) ? 'selected' : '' }}>
                            {{ $actor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="directors">Đạo diễn</label>
                <select name="directors[]" class="form-control" multiple>
                    @foreach($directors as $director)
                        <option value="{{ $director->id }}" {{ in_array($director->id, $movie->directors->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $director->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="genres">Thể loại</label>
                <select name="genres[]" class="form-control" multiple>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}" {{ in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
@endsection
