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

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- page header area start -->
<section class="page-header style-one">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>Latest Posts</h2>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- category-slider-one start -->
<section class="latest-post">
    <div class="container">
        <div class="section-wrapper my-5">
            <div class="row">
                @foreach($posts['latestPost'] as $post)
                    <div class="col-md-3 col-sm-12">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                     style="height: 180px">
                                @if(isset($post->video))
                                    <div class="video-btn">
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span class="bg-dark text-white">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                </div>
                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                    <h5>{{substr($post->title, 0, 80)}}</h5>
                                </a>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt=""
                                         style="width: 25px;height: 25px">
                                </div>
                                <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                    <span style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- category-slider-one ends  -->

<!-- footer area star -->
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
