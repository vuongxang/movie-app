<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="icon" href="{{ asset('/images/logo.png') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

{{--    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/netdna.bootstrap.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/base.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/client/layouts/header.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('css/client/layouts/footer.css') }}">--}}
    @yield('css')
</head>

<body>
<div class="container-custom">
    <div class="grid-custom">
        @include('client.layouts.header')

        @yield('content')
    </div>
    @include('client.layouts.footer')

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@yield('script')

</body>

</html>
