<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>
<style>
    .header-content h2::before{
        right: 75% !important;
    }
    .header-content h2::after{
        left: 75% !important;
    }
</style>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- page header area start -->
<section class="page-header style-one">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>Blogs</h2>
            <p class="text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero, ex!</p>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- blog card area start -->
<section class="blog-card">
    <div class="container">
        <div class="section-wrapper">
            <div class="row">
                @forelse($blogs as $creator)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <a href="{{route('blog',$creator->blog->blog_slug)}}">
                            <div class="card-thumb">
                                <img src="{{asset('upload/blogger/avatar')}}/{{$creator->image}}" alt="bloger1">
                            </div>
                            <div class="card-text">
                                <h4>{{$creator->blog->blog_name}}</h4>
                                <p style="font-size: 13px;text-transform: lowercase">@ {{$creator->name}}</p>
                                <p>@if($creator->about==null) Have a tour from my amazing blog. Just click on my name or photo @else {{$creator->about}} @endif</p>
                            </div>
                        </a>
                        <div class="card-media">
                            <ul class="media-list">
                                <li><a href="#0"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a href="#0"><i class="fab fa-google"></i></a></li>
                                <li><a href="#0"><i class="fab fa-behance"></i></a></li>
                                <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3>No Creators Available Right Now</h3>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<!-- blog card area  ends -->

<!-- footer area start -->
<footer class="border-top pt-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
            <div class="footer-menu">
                <ul class="menulist list-unstyled d-flex align-items-center p-0 m-0">
                    <li class="me-3"><a href="{{route('index')}}">Home</a></li>
                    <li class="me-3"><a href="{{route('about')}}">About</a></li>
                    <li class="me-3"><a href="{{route('blogs')}}">Creators</a></li>
                    <li><a href="{{route('about')}}">Contact</a></li>
                </ul>
            </div>
            <div class="social-link pt-3 pt-md-0">
                <ul class="media-list list-unstyled d-flex p-0 m-0">
                    <li class="me-3"><span>Follow us :</span></li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-pinterest-p"></i>
                        <span>Pinterest</span>
                    </li>
                    <li class="d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-instagram"></i>
                        <span>Instagram</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5">
        <div class="bottom-content bg-dark text-center pt-3 pb-3">
            <p class="m-0 text-white">&copy; Designed By <a href="#0" class="text-white font-bold">Thornior</a></p>
        </div>
    </div>
</footer>
<!-- footer area ends -->

<!-- All JS -->
@include('layouts.all_scripts')

</body>
</html>
