<div class="top-bar">
    <div class="top-bar-banner">
        <img src="{{asset('images/top-bar-banner.jpg')}}"/>
    </div>
    <div class="d-flex justify-content-end mt-2 text-secondary">
        <div class="mx-2">
            <img src="{{asset('images/icon_promotion25.png')}}">
            <span>TIN MỚI & ƯU ĐÃI</span>
        </div>
        <div class="mx-2">
            <img src="{{asset('images/icon_ticket25.png')}}">
            <span>VÉ CỦA TÔI</span>
        </div>
        <div class="mx-2">
            <div>
                <img src="{{asset('images/icon_login25.png')}}">
                @if (Route::has('login'))
                    @auth
                            <a class="text-secondary text-uppercase"href="{{ url('/dashboard') }}">
                                XIN CHÀO {{ Auth::user()->name }}!
                            </a>
                            <a class="text-secondary" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >ĐĂNG XUẤT</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                    @else
                        <a class="text-secondary" href="{{ route('login') }}">ĐĂNG NHẬP</a> /
                        @if (Route::has('register'))
                            <a class="text-secondary" href="{{ route('register') }}">ĐĂNG KÝ</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
        <div class="mx-2">
            <div class="btn-group h-75 d-flex align-items-center" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-sm btn-danger">VN</button>
                <button type="button" class="btn btn-sm btn-secondary">EN</button>
            </div>
        </div>
    </div>
</div>
<header id="header" class="page-header mt-1">
    <div class="container d-flex justify-content-between align-items-center">

    <div class="d-flex justify-content-start align-items-center">
        <a class="logo" href="{{route('home')}}">
            <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinemas"
                 class="img-fluid"/>
        </a>

        <!-- Navigation -->
        <nav id="nav" class="navbar navbar-expand-lg nav-primary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link text-dark font-weight-bold" href="#" id="moviesDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PHIM</a>
                        <div class="dropdown-menu bg-dark border-light p-1" aria-labelledby="moviesDropdown">
                            <a class="dropdown-item text-light font-weight-bold" href="{{route('now-showing')}}">Phim Đang Chiếu</a>
                            <a class="dropdown-item text-light font-weight-bold" href="{{route('coming-soon')}}">Phim Sắp Chiếu</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link text-dark font-weight-bold" href="#" id="cinemasDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">RẠP CGV</a>
                        <div class="dropdown-menu  bg-dark border-light p-1" aria-labelledby="cinemasDropdown">
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/cinox/site/">Tất Cả Các Rạp</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/theaters-special">Rạp Đặc Biệt</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/theaters/special/3d">Rạp 3D</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mx-3">
                        <a class="nav-link text-dark font-weight-bold" href="#" id="membersDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">THÀNH VIÊN</a>
                        <div class="dropdown-menu  bg-dark border-light p-1" aria-labelledby="membersDropdown">
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/customer/account/login">Tài khoản CGV</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/cgv-membership">Quyền lợi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown mx-3">
                        <a class="nav-link text-dark font-weight-bold" href="#" id="cultureplexDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CURTULEPLEX</a>
                        <div class="dropdown-menu  bg-dark border-light p-1" aria-labelledby="cultureplexDropdown">
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/online-store/movie-voucher.html">Quầy Online</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/cinemas/sale">Thuê Rạp & Vé Nhóm</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/cgv-online">e-CGV</a>
                            <a class="dropdown-item text-light font-weight-bold" href="https://www.cgv.vn/default/gift">CGV
                                eGift</a>
                            <a class="dropdown-item text-light font-weight-bold"
                               href="https://www.cgv.vn/default/cgv-rules">CGV Rules</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div id="header-search" class="skip-content d-flex align-items-center pt-4">

        <div class="header-search-left">
            <p class="kenhcine"><a href="https://kenhcine.cgv.vn/"
                                   title="Kênh Cine - Tổng hợp tin tức điện ảnh mới nhất" target="_blank"><img
                        alt="kênh Cine"
                        src="https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/2019/AUG/kenhcine.gif"></a>
            </p>

        </div>
        <div class="header-search-right">
            <p><a href="https://www.cgv.vn/default/movies/now-showing.html"><img alt=""
                                                                                 src="https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/news-offers/mua-ve_ngay.png"/></a>
            </p>
        </div>
    </div>
    </div>
</header>
