<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>{{ENV('APP_NAME')}}</title>
</head>
<body>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- banner area start -->
<section class="banner-area">
    <div class="container-fluid p-0">
        <div class="banner-slider">
            <div class="swiper-wrapper">
                @if(isset($posts) AND count($posts['latestPost']) > 3)
                    @foreach($posts['latestPost'] as $post)
                    @break($loop->index == 6)
                        <div class="swiper-slide"
                             style="background-image: url({{asset($post->medias[0]->address)}}">
                            <div class="thumb-content">
                                <div class="content-desc">
                                    <h4>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</h4>
                                    <p>{{$post->title}}</p>
                                    <div class="time-line">
                                        <strong>{{$post->blogger->name}}</strong>
                                        <span>{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/01.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/02.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/03.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/04.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/05.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide"
                         style="background-image: url({{asset('backend/assets/images/banner/06.jpg')}});">
                        <div class="thumb-content">
                            <div class="content-desc">
                                <h4>Diy</h4>
                                <p>Look in to the exclusive dream house</p>
                                <div class="time-line">
                                    <strong>Safa</strong>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Navigation -->
            <div class="swiper-button-next swiper-button-black"></div>
            <div class="swiper-button-prev swiper-button-black"></div>
        </div>
    </div>
</section>
<!-- banner area ends  -->

<!-- categori slider start -->
<section class="categories style-one">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header text-center mb-3">
                <h3 class="text-uppercase">Categories</h3>
                <p class="text-uppercase">Explore all kind of interior</p>
            </div>
            <div class="categori-slider">
                <div class="swiper-wrapper">
                    @foreach($categories as $key => $category)
                        @if($key == 0)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                                    <a href="{{route('categories.selected', $category->slug)}}">
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
                <a href="{{ route('latest.post') }}">
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
                    @foreach($posts['latestPost'] as $post)
                        @break($loop->index == 10)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset($post->medias[0]->address)}}" alt=""
                                         style="height: 200px">
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
                                    <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $post->post_type, 'slug' => $post->slug])}}">
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
                <a href="{{ route('viewed') }}">
                    <h3>Most Viewed <i class="fa fa-angle-right"></i></h3>
                </a>
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
                    @php $i=1; @endphp
                    @foreach($posts['mostViewed'] as $key => $post)
                        @break($loop->index == 5)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="thumb-crount">
                                    <div class="crount">
                                        <span>0{{$i++}}</span>
                                    </div>
                                    <div class="item-thumb">
                                        <img src="{{asset($post->medias[0]->address)}}" alt=""
                                             style="height: 200px">
                                        @if(isset($post->video))
                                            <div class="video-btn">
                                                <a href="{{route('post.show',['template_type' => $post->post_type , 'slug' => $post->slug])}}">
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
                                    <a href="{{route('post.show',['template_type' => $post->post_type , 'slug' => $post->slug])}}">
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

<!-- Rooms area start -->
<section class="category-room padding-tb pt-0 mb-4">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header text-center">
                <h3 class="text-uppercase ">Rooms</h3>
                <p class="text-uppercase">Explore all kinds of interior inspiration & ideas</p>
            </div>
            <div class="room-wrapper">
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('categories.selected', 'living-room')}}" class="btn"
                           style="background-color: #fff;color: #000;border: 1px solid #000; border-radius: 5px;">Living
                            Room</a>
                        <a href="{{route('categories.selected', 'kitchen')}}" class="btn mx-2"
                           style="background-color: #fff;color: #000;border: 1px solid #000; border-radius: 5px;">Kitchen</a>
                        <a href="{{route('categories.selected', 'bedroom')}}" class="btn mx-2"
                           style="background-color: #fff;color: #000;border: 1px solid #000; border-radius: 5px;">Bedroom</a>
                        <a href="{{route('categories.selected', 'home-office')}}" class="btn"
                           style="background-color: #fff;color: #000;border: 1px solid #000; border-radius: 5px;">Home
                            Office</a>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-8 offset-4">
                        <a href="{{route('categories.selected', 'kids-room')}}" class="btn"
                           style="background-color: #fff;color: #000;border: 1px solid #000; border-radius: 5px;">Kids
                            Room</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Rooms area ends  -->

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
                    @break($loop->index == 9)
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
                <a href="{{route('videos')}}">
                    <h3>Videos <i class="fa fa-angle-right"></i></h3>
                </a>
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
                    @foreach($posts['video'] as $video)
                        @break($loop->index == 10)
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset($video->medias[0]->address)}}" alt=""
                                         style="height: 200px">
                                    <div class="video-btn">
                                        <a href="{{route('post.show',['template_type' => $video->post_type , 'slug' => $video->slug])}}">
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
                                    <a href="{{route('post.show',['template_type' => $video->post_type , 'slug' => $video->slug])}}">
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

<!-- originals blog slider start -->
<section class="collabs-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Originals <i class="fa fa-angle-right"></i></h3>
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
<!-- originals blog slider ends  -->

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

<!-- Feed start -->
<section class="viewed-blog padding-tb pt-0">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h3>Feed</h3>
                <hr style="height: 3px;margin-top: 8px;background-color: #000000">
            </div>
        </div>

        <div class="section-wrapper my-2">
            <div class="row">
                @if(isset($posts['allPost']))
                    @foreach($posts['allPost'] as $post)
                        <div class="col-md-3 col-sm-12" @if($loop->index > 3) style="margin-top: 40px" @endif>
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset($post->medias[0]->address)}}" alt=""
                                         style="height: 180px">
                                    @if(isset($post->video))
                                        <div class="video-btn">
                                            <a href="{{route('post.show',['template_type' => $post->post_type , 'slug' => $post->slug])}}">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="blog-text">
                                    <div class="blog-cat">
                                    <span
                                        class="bg-dark text-white">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'slug' => $post->slug])}}">
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
                @else
                    <p style="color: gray">No Post Available Right Now</p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Feed ends  -->

<!-- footer area star -->
@include('layouts.footer')
<!-- footer area ends -->

<!-- All JS -->
@include('layouts.all_scripts')
@include('layouts.website_view_count_script')
</body>
</html>
