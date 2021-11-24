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
    .header-content h2::before {
        right: 75% !important;
    }

    .header-content h2::after {
        left: 75% !important;
    }
</style>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- video banner area start -->
<section class="video-banner">
    <div class="container-fluid p-0">
        <div class="section-wrapper">
            <div class="blog-video-slider">
                <div class="swiper-wrapper">
                    @if($posts['videos']->count() >= 6)
                        @foreach($posts['videos'] as $video)
                            <div class="swiper-slide">
                                <div class="video-thumb" style="height: 300px">
                                    <img src="{{asset('upload/blogger_image_post')}}/{{$video->fimage}}" alt=""
                                         style="height: 100%">
                                    <div class="thumb-text">
                                        <div class="text-cat">
                                            <span>@foreach($video->categories as $category) {{$category->name}} @if($video->categories->count() > 1)
                                                    +{{$video->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                        </div>
                                        <p>{{substr($video->title, 0, 100)}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="thumb-text">
                                    <div class="text-cat">
                                        <span>Diy</span>
                                    </div>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- video banner area ends  -->

<!-- categori slider start -->
<section class="categories style-one">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header mb-3">
                <h3>Categories</h3>
                <p>Explore all kind of interior</p>
            </div>
            <div class="categori-slider">
                <div class="swiper-wrapper">
                    @foreach($categories as $key => $category)
                        @if($key == 0)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/01.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 1)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/02.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 2)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/09.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 3)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/03.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 4)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/04.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 5)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/05.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 6)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/06.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 7)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/07.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 8)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/08.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 9)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/09.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 10)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/01.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 11)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected.video', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/02.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
    </div>
</section>
<!-- categori slider sends -->

<!-- latest blog slider start -->
<section class="latest-blog pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <a href="{{route('latest.video')}}">
                    <h3>Latest <i class="fa fa-angle-right"></i></h3>
                </a>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="latest-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="latest-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="latest-blog-slider">
                <div class="swiper-wrapper">
                    @foreach($posts['videos'] as $video)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('upload/blogger_image_post')}}/{{$video->fimage}}" alt=""
                                         style="height: 200px">
                                    <div class="video-btn">
                                        <a href="{{route('post.show',['template_type' => $video->post_type ,'template_id' => $video->template_id,'slug' => $video->slug])}}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-cat">
                                    <span>@foreach($video->categories as $category) {{$category->name}} @if($video->categories->count() > 1)
                                            +{{$video->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $video->post_type ,'template_id' => $video->template_id,'slug' => $video->slug])}}">
                                        <h5>{{substr($video->title, 0, 80)}}</h5>
                                    </a>
                                </div>
                                <div class="blog-timeline">
                                    <div class="bloger-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$video->blogger->image}}" alt=""
                                             style="width: 25px;height: 25px">
                                    </div>
                                    <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($video->blogger->blog->blog_name,0,10)}}{{strlen($video->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                        <span style="font-size: 13px">{{$video->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog slider ends  -->

<!-- viewed slider area start -->
<section class="viewed-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Most viewed <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="viewed-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="viewed-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="viewed-blog-slider">
                <div class="swiper-wrapper">
                    @foreach($posts['mostViewed'] as $key => $post)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="thumb-crount">
                                    <div class="crount">
                                        <span>0{{$key}}</span>
                                    </div>
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 200px">
                                        @if(isset($post->video))
                                            <div class="video-btn">
                                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                    <i class="fa fa-play"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-cat">
                                    <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                        <h5>{{substr($post->title, 0, 80)}}</h5>
                                    </a>
                                </div>
                                <div class="blog-timeline">
                                    <div class="bloger-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt="">
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
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- viewed slider area ends  -->

<!-- explore creator area start -->
<section class="explore-creator">
    <div class="container">
        <div class="section-header">
            <h3>Explore By Creator</h3>
            <p>Explore All Kind of interior Inspiration and ideas</p>
        </div>
        <div class="section-wrapper">
            <div class="row">
                @foreach($posts['blogs'] as $blog)
                    <div class="col-lg-2 col-md-4 col-6 mb-4 mb-lg-0">
                        <div class="creator-item">
                            <div class="item-thumb">
                                <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blogger->image}}" alt="">
                            </div>
                            <div class="item-text">
                                <h4>{{$blog->blogger->name}}</h4>
                                <p>{{$blog->country->name}}</p>
                            </div>
                            <div class="item-link">
                                <a href="{{route('blog',$blog->blog_slug)}}">See Profile</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- explore creator area start -->

<!-- thornior blog slider start -->
<section class="thornior-blog padding-tb">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Thornior recommend <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="thornior-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="thornior-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="thornior-blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- thornior blog slider ends  -->

<!-- videos blog slider start -->
<section class="videos-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Videos <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="videos-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="videos-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="videos-blog-slider">
                <div class="swiper-wrapper">
                    @foreach($posts['videos'] as $video)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('upload/blogger_image_post')}}/{{$video->fimage}}" alt=""
                                         style="height: 200px">
                                    <div class="video-btn">
                                        <a href="{{route('post.show',['template_type' => $video->post_type ,'template_id' => $video->template_id,'slug' => $video->slug])}}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <div class="blog-cat">
                                    <span>@foreach($video->categories as $category) {{$category->name}} @if($video->categories->count() > 1)
                                            +{{$video->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $video->post_type ,'template_id' => $video->template_id,'slug' => $video->slug])}}">
                                        <h5>{{substr($video->title, 0, 80)}}</h5>
                                    </a>
                                </div>
                                <div class="blog-timeline">
                                    <div class="bloger-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$video->blogger->image}}" alt=""
                                             style="width: 25px;height: 25px">
                                    </div>
                                    <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($video->blogger->blog->blog_name,0,10)}}{{strlen($video->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                        <span style="font-size: 13px">{{$video->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- videos blog slider ends  -->

<!-- collabs blog slider start -->
<section class="collabs-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Collabs <i class="fa fa-angle-right"></i></h3>
                <!-- slider arrow -->
                <div class="slider-arrow">
                    <div class="collabs-button-prev prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="collabs-button-next next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="collabs-blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.png')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- collabs blog slider ends  -->

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
