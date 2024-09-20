<header id="header" class="bg-light py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="logo" href="https://www.cgv.vn/default/">
            <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo.png" alt="CGV Cinemas" class="img-fluid" />
            <img src="https://www.cgv.vn/skin/frontend/cgv/default/images/cgvlogo-small.png" alt="CGV Cinemas" class="img-fluid d-none d-sm-block" />
        </a>

        <!-- Navigation -->
        <nav id="nav" class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="moviesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phim</a>
                        <div class="dropdown-menu" aria-labelledby="moviesDropdown">
                            <a class="dropdown-item" href="https://www.cgv.vn/default/movies/now-showing.html">Phim Đang Chiếu</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/movies/coming-soon-1.html">Phim Sắp Chiếu</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="cinemasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rạp CGV</a>
                        <div class="dropdown-menu" aria-labelledby="cinemasDropdown">
                            <a class="dropdown-item" href="https://www.cgv.vn/default/cinox/site/">Tất Cả Các Rạp</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/theaters-special">Rạp Đặc Biệt</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/theaters/special/3d">Rạp 3D</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="membersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thành viên</a>
                        <div class="dropdown-menu" aria-labelledby="membersDropdown">
                            <a class="dropdown-item" href="https://www.cgv.vn/default/customer/account/login">Tài khoản CGV</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/cgv-membership">Quyền lợi</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="cultureplexDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cultureplex</a>
                        <div class="dropdown-menu" aria-labelledby="cultureplexDropdown">
                            <a class="dropdown-item" href="https://www.cgv.vn/default/online-store/movie-voucher.html">Quầy Online</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/cinemas/sale">Thuê Rạp & Vé Nhóm</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/cgv-online">e-CGV</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/gift">CGV eGift</a>
                            <a class="dropdown-item" href="https://www.cgv.vn/default/cgv-rules">CGV Rules</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="account-cart-wrapper">
            @if (Route::has('login'))
                @auth
                    <div class="dropdown">
                        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="accountDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </button>
                        <div class="dropdown-menu" aria-labelledby="accountDropdown">
                            <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @else
                    <a class="btn btn-outline-primary" href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</header>
