<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" @if(Route::currentRouteName() != 'admin.blogs') defer @endif></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @include('layouts.all_styles')
</head>
<body>
<div class="main-content" id="app">

    <!-- vertica sidebar start -->
@include('layouts.admin_sidebar')
<!-- vertica sidebar ends  -->


    <!-- content-right start -->
    <div class="content-right" id="contentWidth">

        <!-- top navbar start -->
    @include('layouts.logged_in_navbar')
    <!-- top navbar ends  -->

        <!-- admin area start -->
        <section class="blogger-admin">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
        <!-- admin area ends  -->

        <!-- footer area start -->
    @include('layouts.logged_in_footer')
    <!-- footer area ends  -->

    </div>
</div>
@include('layouts.all_scripts')

<script>
    // mobile menu responsive
    function menuAnimation(x) {
        x.classList.toggle("change");
        var element = document.getElementById("slideNav");
        element.classList.toggle("navSlide");
        var contentFade = document.getElementById("contentWidth");
        contentFade.classList.toggle("changeWidth");
    }

    // change content width
    function topNav(x) {
        x.classList.toggle("change");
        var element = document.getElementById("topList");
        element.classList.toggle("top-list");
    }
</script>
@yield('script')
</body>
</html>
