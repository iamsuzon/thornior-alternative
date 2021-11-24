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

<!-- banner area start -->
<section class="banner-area">
    <div class="container-fluid p-0">
        <div class="banner-slider">
            <div class="swiper-wrapper">
                @if(isset($posts) AND count($posts['posts']) > 3)
                @foreach($posts['latestPost'] as $post)
                    @if($loop->index == 6)
                        @break
                    @endif
                    <div class="swiper-slide"
                         style="background-image: url({{asset('upload/blogger_image_post')}}/{{$post->fimage}})">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/01.jpg')}});">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/02.jpg')}});">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/03.jpg')}});">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/04.jpg')}});">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/05.jpg')}});">
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
                    <div class="swiper-slide" style="background-image: url({{asset('backend/assets/images/banner/06.jpg')}});">
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
<section class="categories">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header text-center pb-3">
                <h3>Categories</h3>
            </div>
            <div class="categori-slider">
                <div class="swiper-wrapper">
                    @foreach($categories as $key => $category)
                        @if($key == 0)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-magic"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fa fa-bed"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-couch"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-campground"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-chair"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-cut"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-faucet"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-video"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-bed"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-retweet"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-child"></i>
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
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fa fa-toilet"></i>
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected',$category->slug)}}">
                                        <div class="item-icon">
                                            <i class="fas fa-air-freshener"></i>
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

<!-- Blog categori start -->
<section class="blog-categori">
    <div class="container">
        <div class="section-wrapper">
            <div class="categori-tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest"
                                type="button" role="tab" aria-controls="latest" aria-selected="true">Latest
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular"
                                type="button" role="tab" aria-controls="popular" aria-selected="false">Popular
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories"
                                type="button" role="tab" aria-controls="categories" aria-selected="false">Categories
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video"
                                type="button" role="tab" aria-controls="video" aria-selected="false">Video
                        </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                        <div class="latest-blog pt-0 pb-0">
                            <div class="row">
                                @if(isset($posts))
                                @php $i=1 @endphp
                                @foreach($posts['latestPost'] as $post)
                                    @if($i==1)
                                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                                            <div class="blog-item">
                                                <div class="item-thumb">
                                                    <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                         alt="" style="height: 280px">
                                                </div>
                                                <div class="blog-text">
                                                    <div class="blog-cat">
                                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                                +{{$post->categories->count()-1}}
                                                                more @break @endif  @endforeach</span>
                                                    </div>
                                                    <h5>{{$post->title}}</h5>
                                                </div>
                                                <div class="blog-timeline">
                                                    <div class="bloger-thumb">
                                                        <img
                                                            src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                            alt="">
                                                    </div>
                                                    <div class="time-line">
                                                        <span
                                                            class="border-end pe-2">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                        <span>{{$post->created_at->diffForhumans()}}</span>
                                                    </div>
                                                </div>
                                                <div class="blog-more">
                                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">Read More <i
                                                            class="fas fa-long-arrow-alt-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($i==2)
                                        <div class="col-lg-4 col-md-6 col-12 mb-4 mb-md-0">
                                            <div class="blog-list">
                                                <div class="list-item mb-3">
                                                    <div class="item-thumb">
                                                        <img
                                                            src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                            alt="">
                                                    </div>
                                                    <div class="item-text">
                                                        <h6>{{$post->title}}</h6>
                                                        <div class="blog-timeline">
                                                            <div class="bloger-thumb">
                                                                <img
                                                                    src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="time-line">
                                                                <span
                                                                    class="border-end pe-2">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                                <span>{{$post->created_at->diffForhumans()}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($i==3)
                                                    <div class="list-item mb-3">
                                                        <div class="item-thumb">
                                                            <img
                                                                src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                                alt="">
                                                        </div>
                                                        <div class="item-text">
                                                            <h6>{{$post->title}}</h6>
                                                            <div class="blog-timeline">
                                                                <div class="bloger-thumb">
                                                                    <img
                                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                                        alt="">
                                                                </div>
                                                                <div class="time-line">
                                                                    <span
                                                                        class="border-end pe-2">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                                    <span>{{$post->created_at->diffForhumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($i==4)
                                                    <div class="list-item">
                                                        <div class="item-thumb">
                                                            <img
                                                                src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                                alt="">
                                                        </div>
                                                        <div class="item-text">
                                                            <h6>{{$post->title}}</h6>
                                                            <div class="blog-timeline">
                                                                <div class="bloger-thumb">
                                                                    <img
                                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                                        alt="">
                                                                </div>
                                                                <div class="time-line">
                                                                    <span
                                                                        class="border-end pe-2">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                                    <span>{{$post->created_at->diffForhumans()}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if($i==5)
                                            </div>
                                        </div>
                                    @endif

                                    @if($i==5)
                                        @foreach($posts['latestPost'] as $videos)
                                            @if($videos->video == null)
                                                @continue
                                            @endif
                                        <div class="col-lg-5 col-12">
                                            <div class="blog-item">
                                                <div class="item-thumb">
                                                    <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                         alt="" style="height: 280px">
                                                    <div class="video-btn">
                                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="blog-text">
                                                    <div class="blog-cat">
                                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                                +{{$post->categories->count()-1}}
                                                                more @break @endif  @endforeach</span>
                                                    </div>
                                                    <h5>{{$post->title}}</h5>
                                                    @if(isset($post->intro_description))
                                                        <p>{{substr($post->intro_description, 0, 200)}}..</p>
                                                    @else
                                                        <p>{{substr($post->outro_description, 0, 200)}}..</p>
                                                    @endif
                                                </div>
                                                <div class="blog-timeline">
                                                    <div class="bloger-thumb">
                                                        <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                             alt="">
                                                    </div>
                                                    <div class="time-line">
                                                        <span class="border-end pe-2">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                        <span>{{$post->created_at->diffForhumans()}}</span>
                                                    </div>
                                                    <div class="blog-more ms-2 ms-sm-5">
                                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">Read More <i
                                                                class="fas fa-long-arrow-alt-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @break
                                        @endforeach
                                        @break
                                    @endif
                                    @php $i++ @endphp
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At molestiae nulla voluptatum
                            architecto, dicta beatae?</p>
                    </div>
                    <div class="tab-pane fade" id="categories" role="tabpanel" aria-labelledby="categories-tab">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, magni?</p>
                    </div>
                    <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog categori ends  -->

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="blog-wrapper">
                        <div class="row">
                            @include('layouts.home_posts')
                        </div>
                    </div>

                    <div class="blog-wrapper video-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="blog-item">
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                            <span>Styling</span>
                                        </div>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, amet.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, quasi.
                                            Quasi nam reiciendis ipsum, numquam quos sit aliquid repellendus sequi
                                            expedita nesciunt ab quas consequuntur.</p>
                                    </div>
                                    <div class="blog-more mt-2">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                    <div class="blog-timeline border-top mt-4">
                                        <strong>Shay alnwick</strong>
                                        <span class="me-1 ms-1">/</span>
                                        <span>24 July 2017</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="blog-item">
                                    <div class="item-thumb">
                                        <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                        <div class="video-btn">
                                            <a href="#0">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog-wrapper video-wrapper">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="blog-item">
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
                                        <div class="blog-timeline border-top mt-1">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <h5>Lorem ipsum dolor sit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 mt-4 mt-sm-0">
                                <div class="blog-item">
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
                                        <div class="blog-timeline border-top mt-1">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <h5>Lorem ipsum dolor sit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                                <div class="blog-item">
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
                                        <div class="blog-timeline border-top mt-1">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <h5>Lorem ipsum dolor sit.</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area d-flex flex-wrap justify-content-center">
                        <ul class="pagination  d-flex flex-wrap m-0">
                            <li class="prev">
                                <a href="#"><i class="fas fa-angle-double-left"></i></a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active d-none d-md-block">2</a></li>
                            <li><a href="#" class="d-none d-md-block">3</a></li>
                            <li class="dot">....</li>
                            <li><a href="#" class="d-none d-md-block">4</a></li>
                            <li class="next">
                                <a href="#"><i class="fas fa-angle-double-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                    <div class="sidebar-widget">
                        <div class="widget-rec-post pb-5">
                            <h4>Recent Posts</h4>
                            <ul class="recent-post">
                                @if(isset($posts))
                                @foreach($posts['latestPost']->take(6) as $post)
                                    <li>
                                        <div class="rec-thumb">
                                            <a href="#"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                    alt="{{$post->title}}" style="height: 100px"></a>
                                        </div>
                                        <div class="rec-content">
                                            <span
                                                style="font-size: 12px">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                    +{{$post->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                            <h6 class="m-0"><a href="#">{{$post->title}}</a></h6>
                                            <span style="font-size: 13px">{{$post->created_at->format('d M Y')}}</span>
                                        </div>
                                    </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="widegt-popular-post pb-5">
                            <h4>Popular Post</h4>
                            <div class="popular-post pt-2">
                                <div class="post-thumb">
                                    <img src="{{asset('backend/assets/images/blog/latest/03.jpg')}}" class="w-100"
                                         alt="">
                                </div>
                                <div class="post-text pt-3">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur sunt
                                        voluptates magnam a corporis repellat alias placeat debitis deserunt
                                        exercitationem!</p>
                                </div>
                                <div class="blog-timeline mt-1">
                                    <span>By :</span>
                                    <strong>Shay alnwick</strong>
                                    <span class="me-1 ms-1">/</span>
                                    <span>24 July 2017</span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <div class="popular-post pt-2">
                                        <div class="post-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="w-100" alt="">
                                        </div>
                                        <div class="post-text pt-2">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                        <div class="blog-timeline">
                                            <span>24 July 2017</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="popular-post pt-2">
                                        <div class="post-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="w-100" alt="">
                                        </div>
                                        <div class="post-text pt-2">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                        <div class="blog-timeline">
                                            <span>24 July 2017</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget-rec-post">
                            <h4>Recent Posts</h4>
                            <ul class="recent-post">
                                <li>
                                    <div class="rec-thumb">
                                        <a href="#"><img src="{{asset('backend/assets/images/blog/01.png')}}"
                                                         alt="blog"></a>
                                    </div>
                                    <div class="rec-content">
                                        <span>Leaving room</span>
                                        <h6><a href="#">4 Decorotion tips</a></h6>
                                        <span> 11 October 2018</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="rec-thumb">
                                        <a href="#"><img src="{{asset('backend/assets/images/blog/01.png')}}"
                                                         alt="blog"></a>
                                    </div>
                                    <div class="rec-content">
                                        <span>Kitchen</span>
                                        <h6><a href="#">Clean and lignting</a></h6>
                                        <span> 11 October 2018</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="row border-top border-bottom pt-3 pb-3">
                                <div class="col-6">
                                    <div class="popular-post pt-2">
                                        <div class="post-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="w-100" alt="">
                                        </div>
                                        <div class="post-text pt-2">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                        <div class="blog-timeline">
                                            <span>24 July 2017</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="popular-post pt-2">
                                        <div class="post-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="w-100" alt="">
                                        </div>
                                        <div class="post-text pt-2">
                                            <p>Lorem ipsum dolor sit amet.</p>
                                        </div>
                                        <div class="blog-timeline">
                                            <span>24 July 2017</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->

<!-- footer area star -->
<footer class="border-top pt-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
            <div class="footer-menu">
                <ul class="menulist list-unstyled d-flex align-items-center p-0 m-0">
                    <li class="me-3"><a href="#0">Home</a></li>
                    <li class="me-3"><a href="#0">About</a></li>
                    <li class="me-3"><a href="#0">Creators</a></li>
                    <li><a href="#0">Contact</a></li>
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
