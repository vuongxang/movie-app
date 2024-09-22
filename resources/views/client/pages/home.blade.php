@extends('client.layouts.index')
@section('title', 'Trang Chủ')

@section('breadcrumbs')
    <!-- Breadcrumbs -->
    <div>
        {!! Breadcrumbs::render('now-showing') !!}
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 mb-4 border-thickx">
                <h1 class="my-4 font-weight-normal ">Phim Đang Chiếu</h1>
                <div class="d-flex justify-content-end">
                    <a class="text-dark mb-2 " href="{{route('coming-soon')}}">PHIM SẮP CHIẾU</a>
                </div>
            </div>

            <!-- Movie Cards -->
            @foreach($movies as $movie)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-85 border-0">
                        <!-- Movie Poster -->
                        <a href="{{ route('movies.detail', $movie->id) }}" class="movie-link">
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" class="card-img-top" alt="{{ $movie->title }}">
                        </a>
                        <!-- Movie Info -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <span><strong>Thể loại:</strong> {{  $movie->genres->pluck('name')->implode(', ') }}</span>
                            <span><strong>Thời lượng:</strong> {{ $movie->duration }} phút</span>
                            <span><strong>Khởi chiếu:</strong> {{ $movie->release_date }}</span>
                            <!-- Movie Details Button -->
                        </div>

                    </div>
                    <div class="add-to-links justify-content-between d-flex align-items-center">
                        <div>
                            <button class="btn btn-sm like-button">
                                <i class="fa fa-thumbs-up"></i> Like 199
                            </button>
                        </div>
                        <div>
                            <button type="button" title="Mua vé" class="btn btn-danger btn-booking"
                                    data-toggle="modal"
                                    data-target="#bookingModal"
                                    data-movie-id="{{$movie->id}}">
                                <i class="fa-solid fa-phone-flip"></i>
                                <span>MUA VÉ</span>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    @include('client.blocks.bocking-modal')

@endsection
