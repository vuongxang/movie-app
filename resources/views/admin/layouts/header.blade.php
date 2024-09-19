<header id="header" class="page-header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cinema App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('cinemas.index') }}">Rạp chiếu phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('genres.index') }}">Thể loại phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('halls.index') }}">Phòng chiếu phim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showtimes.index') }}">Xuất chiếu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>
