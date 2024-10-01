@extends('client.layouts.index')

@section('title', $movie->title)
@section('breadcrumbs')
    <!-- Breadcrumbs -->
    <div class="breadcrumb-wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                {!! Breadcrumbs::render('movies.detail', $movie) !!}
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <div class="container movie-detail-container">
        <div class="col-12 mb-4 border-thickx">
            <h1 class="my-4 font-weight-normal ">Nội dung phim</h1>

        </div>
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $movie->poster_url) }}" alt="{{ $movie->title }}"
                     class="img-fluid movie-poster">
            </div>

            <div class="col-md-9">
                <div class="movie-info">
                    <h2 class="movie-title">{{ $movie->title }}</h2>
                    <ul class="list-unstyled movie-details">
                        <li><strong>Đạo diễn:</strong> {{ implode(', ', $movie->directors->pluck('name')->toArray()) }}
                        </li>
                        <li><strong>Diễn viên:</strong> {{ implode(', ', $movie->actors->pluck('name')->toArray()) }}
                        </li>
                        <li><strong>Thể loại:</strong> {{ implode(', ', $movie->genres->pluck('name')->toArray()) }}
                        </li>
                        <li><strong>Khởi chiếu:</strong> {{ $movie->release_date}}</li>
                        <li><strong>Thời lượng:</strong> {{ $movie->duration }} phút</li>
                        <li><strong>Ngôn ngữ:</strong> {{ $movie->language }}</li>
                        <li><strong>Rated:</strong> {{ \App\Models\Movie::RATED_OPTIONS[$movie->rated] ?? 'N/A' }}</li>
                    </ul>

                    <div class="add-to-links justify-content-start d-flex align-items-center">
                        <div class="mr-4">
                            <button class="btn btn-sm like-button">
                                <i class="fa fa-thumbs-up"></i> Like 199
                            </button>
                        </div>
                        <button type="button" title="Mua vé" class="btn btn-danger btn-booking"
                                data-movie-id="{{$movie->id}}"
                                data-toggle="modal"
                                data-target="#bookingModal">
                            <i class="fa-solid fa-phone-flip"></i>
                            <span>MUA VÉ</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mô tả phim -->
        <div class="row movie-description">
            <div class="container">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                           aria-selected="true" style="color: #e71a0f; font-weight: bold; border-top: 3px solid #e71a0f;">Chi tiết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false" style="color: #333; font-weight: bold;">Trailer</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <p>{{ $movie->description }}</p>
                    </div>
                    <div class="tab-pane fade mt-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/_8qUFEmPQbc?si=HKzJT-ciUQk22prB"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('client.blocks.bocking-modal')

@endsection

