@extends('client.layouts.index')

@section('title', $movie->title)

@section('content')

    <div class="container movie-detail-container">
        <div class="row">
            <!-- Phần ảnh bên trái -->
            <div class="col-md-4">
                <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}" class="img-fluid movie-poster">
            </div>

            <!-- Phần thông tin phim bên phải -->
            <div class="col-md-8">
                <div class="movie-info">
                    <h2 class="movie-title">{{ $movie->title }}</h2>
                    <ul class="list-unstyled movie-details">
                        <li><strong>Đạo diễn:</strong> {{ implode(', ', $movie->directors->pluck('name')->toArray()) }}</li>
                        <li><strong>Diễn viên:</strong> {{ implode(', ', $movie->actors->pluck('name')->toArray()) }}</li>
                        <li><strong>Thể loại:</strong> {{ implode(', ', $movie->genres->pluck('name')->toArray()) }}</li>
                        <li><strong>Khởi chiếu:</strong> {{ $movie->release_date}}</li>
                        <li><strong>Thời lượng:</strong> {{ $movie->duration }} phút</li>
                        <li><strong>Ngôn ngữ:</strong> {{ $movie->language }}</li>
                        <li><strong>Rated:</strong> {{ $movie->rated }}</li>
                    </ul>
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#bookingModal">
                        Đặt Vé
                    </button>
                </div>
            </div>
        </div>

        <!-- Mô tả phim -->
        <div class="row movie-description">
            <div class="col-12">
                <h3>Mô tả</h3>
                <p>{{ $movie->description }}</p>
            </div>
        </div>
    </div>
    @include('client.blocks.bocking-modal')

@endsection


<!-- Custom CSS -->
<style>
    .movie-detail-container {
        max-width: 980px;
        margin: 0 auto;
        padding-top: 20px;
    }
    .movie-poster {
        max-width: 100%;
        height: auto;
    }
    .movie-info {
        padding-left: 20px;
    }
    .movie-title {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    .movie-details li {
        margin-bottom: 10px;
    }
    .movie-description {
        margin-top: 30px;
    }
    .btn-primary {
        background-color: #e71a0f;
        border-color: #e71a0f;
    }
    .btn-primary:hover {
        background-color: #d4190e;
        border-color: #d4190e;
    }
</style>

