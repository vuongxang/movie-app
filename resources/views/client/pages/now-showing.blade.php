@extends('client.layouts.index')
@section('title', 'Phim Đang Chiếu')

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
                    <div class="card border-0" style="height: 500px;">
                        <!-- Movie Poster -->
                        <a href="{{ route('movies.detail', $movie->id) }}" class="movie-link">
                            <img src="{{ asset('storage/' . $movie->poster_url) }}" class="card-img-top" alt="{{ $movie->title }}" style="height: 300px; object-fit: cover;">
                        </a>
                        <!-- Movie Info -->
                        <div class="card-body d-flex flex-column" style="height: 150px; overflow: hidden;">
                            <h5 class="card-title text-truncate">{{ $movie->title }}</h5>
                            <p class="card-text" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                <strong>Thể loại:</strong> {{  $movie->genres->pluck('name')->implode(', ') }}<br>
                                <strong>Thời lượng:</strong> {{ $movie->duration }} phút<br>
                                <strong>Khởi chiếu:</strong> {{ $movie->release_date }}
                            </p>
                        </div>
                    </div>
                    <div class="add-to-links justify-content-between d-flex align-items-center mt-2">
                        <div>
                            <button class="btn btn-sm like-button">
                                <i class="fa fa-thumbs-up"></i> Like 199
                            </button>
                        </div>
                        <div>
                            <button type="button" title="Mua vé" class="btn btn-primary btn-booking rounded-pill"
                                    data-toggle="modal"
                                    data-target="#bookingModal"
                                    data-movie-id="{{$movie->id}}"
                                    style="border: 2px solid #e71a0f; background-color: #e71a0f; box-shadow: 0 0 0 2px white inset;">
                                <i class="fas fa-ticket-alt mr-2"></i>
                                <span>Mua vé</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('client.blocks.bocking-modal')

@endsection
