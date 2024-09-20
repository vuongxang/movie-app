@extends('client.layouts.index')
@section('css')
<link rel="stylesheet" href="{{ asset('css/client/pages/home.css') }}">
@endsection
@section('title', 'Trang Chủ')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center mb-4">Phim Đang Chiếu</h2>
            @foreach($movies as $movie)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <div class="product-images">
                            <a class="product-images" href="{{ route('movies.show', $movie->id) }}">
                                <img src="{{ asset('storage/' . $movie->poster_url) }}" class="card-img-top" alt="{{ $movie->title }}">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->description, 100) }}</p>
                            <p><strong>Thời lượng:</strong> {{ $movie->duration }} phút</p>
                            <p><strong>Ngôn ngữ:</strong> {{ $movie->language }}</p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-primary">Chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
