<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/cgvlogo.png') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @yield('css')
    <style>
        body {
            font-family: Verdana, Arial, sans-serif;
            font-size: 14px;
            background: #fdfcf0;
        }
        .container-custom, .breadcrumbs-container,footer .container {
            max-width: 980px;
            margin: 0 auto; /* Căn giữa */
        }
        .breadcrumbs {
            background-color: #f1f0e5;
            border-bottom: 1px solid #cacac0;
            padding: 5px 0;
            margin: 0;
            width: 100%;
        }
        .breadcrumb {
            background-color: #f1f0e5 !important;
            margin: 0;
        }

        .like-button {
            background-color: #1877f2;
            color: white;
            border: none;
            cursor: pointer;
        }

        .like-button i {
            margin-right: 5px;
        }
        .grid-custom .container, .border-thickx {
            border-bottom: 3px solid #241d1e;
            border-bottom-width: 3px;
            border-bottom-style: solid;
            border-bottom-color: rgb(36, 29, 30);
        }

        footer {
            border-top: 2px solid #ddd;
            border-bottom: 2px solid #ddd;
        }

        .footer-bottom {
            background: url({{asset('images/bg-bottom-footer.jpg')}}) repeat-x scroll center bottom rgba(0, 0, 0, 0);
            margin-top: 30px;
            padding-bottom: 120px;
        }

        footer a {
            text-decoration: none; /* Bỏ gạch chân */
        }

        footer a:hover {
            text-decoration: underline; /* Hiệu ứng hover */
        }

        footer h5 {
            font-weight: bold; /* Đậm tiêu đề */
        }

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

        .top-bar, header .container {
            max-width: 980px;
            margin: 0 auto; /* Căn giữa */
            padding-right: 0;
            padding-left: 0;
            font-size: 14px;

        }

        .top-bar-banner img {
            width: 980px;
        }

        .page-header {
            width: 100%;
            margin: 0 auto;
            background: url({{asset('images/bg-top.png')}}) repeat-x scroll left bottom transparent;
            background-size: 10px 135px;
            height: 135px;
        }

        .nav-primary {
            display: block;
            margin-top: 40px;
        }
        .screen {
            width: 100%;
            height: 45px;
            margin: 20px auto 40px;
            text-align: center;
            background: url({{asset('images/bg-screen.png')}}) no-repeat top center transparent;
            background-size:100% auto;
        }

        .seat-selection form {
            margin-top: 8.5rem;
        }
    </style>
</head>

<body>
@include('client.layouts.header')
<div class="breadcrumbs">
    <div class="breadcrumbs-container">
        @yield('breadcrumbs')
    </div>
</div>
<div class="container-custom">
    <div class="grid-custom">

        @yield('content')
    </div>

</div>
@include('client.layouts.footer')

<!-- Include full version of jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

@yield('script')

</body>

</html>
