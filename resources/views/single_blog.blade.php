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

<!-- profile banner start -->
<section class="profile-banner"
         @if(($blog->image != null)) style="background-image: url({{asset('upload/blogger/blog')}}/{{$blog->image}})"
         @else style="background-image: url({{asset('upload/blogger/blog/placeholder.jpg')}}" @endif>
    <div class="container">
        <!-- empty content -->
    </div>
</section>
<!-- profile banner ends  -->

<!-- profile-thumble start -->
<section class="profile-thumble">
    <div class="container">
        <div class="section-wrapper">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="profile-content">
                        <div class="content-thumb">
                            <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blogger->image}}" alt="">
                            <div class="thumb-active">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                        <div class="content-text">
                            <div class="row">
                                <div class="col-6">
                                    <h4>{{$blog->blog_name}}</h4>
                                    <span>{{$blog->blogger->name}}</span>
                                    @if($blog->blog_description != null)
                                        <p>{{substr($blog->blog_description,0,200)}} @if(strlen($blog->blog_description) > 200)
                                                .... @endif<a href="#tabs-5" class="see-more-about text-dark fw-bold"
                                                              onclick="openTab()">Read More</a></p>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <form
                                        @if(isset($blog->follows) AND $blog->follows->user_id == Auth::guard('web')->id()) action="{{route('user.blogger.unfollow')}}"
                                        @else action="{{route('user.blogger.follow')}}" @endif method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::guard('web')->id()}}">
                                        @if(isset($blog->follows) AND $blog->follows->user_id == Auth::guard('web')->id())
                                            <input type="hidden" name="status" value="unfollow">
                                            <button type="submit" class="btn btn-dark" name="blog_id"
                                                    value="{{$blog->id}}" style="font-size: 15px">Following <i
                                                    class="fas fa-check"></i>
                                            </button>
                                        @else
                                            <input type="hidden" name="status" value="follow">
                                            <button type="submit" class="btn btn-dark" name="blog_id"
                                                    value="{{$blog->id}}" style="font-size: 15px">Follow
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="blog-profile-slider overflow-hidden">
                        <div class="swiper-wrapper">
                            @if(isset($posts['latestPost']))
                                @foreach($posts['latestPost'] as $post)
                                    @if(!isset($post->video))
                                        @continue
                                    @endif
                                    <div class="swiper-slide">
                                        <div class="blog-item style-one">
                                            <div class="item-thumb">
                                                <img src="{{asset($post->medias[0]->address)}}"
                                                     alt="" style="height: 120px">
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
                                                <p>@if(isset($post->intro_description)) {{substr($post->intro_description,0,50)}} @else {{substr($post->outro_description,0,50)}} @endif
                                                    <a
                                                        href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}"
                                                        class="text-dark fw-bold">Read More</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- profile-thumble ends  -->

<!-- new category slider start -->
<section class="new-category">
    <div class="container categori-innner">
        <div class="section-header">
            <h3><span>New</span>Category</h3>
            <!-- slider arrow -->
            <div class="slider-arrow">
                <div class="new-button-prev prev">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="new-button-next next">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="section-wrapper">
            <div class="newcategory-slider">
                <div class="swiper-wrapper">
                    @if(isset($posts['unique_categories']))
                        @foreach($posts['unique_categories']->unique('category_id') as $category)
                            <div class="swiper-slide">
                                <div class="category-item">
                                    <div class="category-thumb">
                                        @php $rand_value = rand(1,9) @endphp
                                        <img
                                            src="{{asset('backend/assets/images/blog/category/0'.$rand_value.'.'.'jpg')}}"
                                            alt="">
                                        <div class="thumb-inthumb">
                                            <img
                                                src="{{asset('backend/assets/images/blog/category/0'.$rand_value.'.'.'jpg')}}"
                                                alt="">
                                            <h4 class="text-uppercase">{{$category->name}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new category slider ends  -->

<!-- all profile tabs start -->
<div id="tabs">
    <div class="container">
        <ul>
            @if((!isset($status['post_section'])) OR (isset($status['post_section']) AND $status['post_section']->is_section == 1))
                <li><a href="#tabs-1">Posts</a></li>
            @endif
            @if((!isset($status['video_section'])) OR (isset($status['video_section']) AND $status['video_section']->is_section == 1))
                <li><a href="#tabs-2">Videos</a></li>
            @endif
            @if((!isset($status['link_section'])) OR (isset($status['link_section']) AND $status['link_section']->is_section == 1))
                <li><a href="#tabs-3">Links</a></li>
            @endif
            @if((!isset($status['about_section'])) OR (isset($status['about_section']) AND $status['about_section']->is_section == 1))
                <li><a href="#tabs-5">About me</a></li>
            @endif
        </ul>
    </div>
    @if((!isset($status['post_section'])) OR (($status['post_section']) AND $status['post_section']->is_section == 1))
        <div id="tabs-1">
            <!-- post video page header -->
            <div class="post-pageheader">
                <div class="content-position">
                    <div class="content-text">
                        <h3>Posts</h3>
                        <p>Explore all kinds of interior Inspiration & Ideas</p>
                    </div>
                </div>
            </div>
            <!-- post video page header -->

            <!-- latest blog slider start -->
            <section class="latest-blog mt-5 pt-0">
                <div class="container">
                    <div class="section-wrapper">
                        <div class="section-header">
                            <h3>Latest <i class="fa fa-angle-right"></i></h3>
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
                                @foreach($posts['image'] as $post)
                                    @break($posts['image']->count() > 6)
                                    <div class="swiper-slide">
                                        <div class="blog-item style-one">
                                            <div class="item-thumb">
                                                <img src="{{asset($post->medias[0]->address)}}"
                                                     alt="" style="height: 200px">
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
                                                    <img
                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                        alt="" style="width: 25px;height: 25px">
                                                </div>
                                                <div class="time-line">
                                                    <span class="border-end pe-2"
                                                          style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                    <span
                                                        style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
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

            <!-- blog post wrap start -->
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
                            @if(isset($posts['image']))
                                @foreach($posts['image'] as $post)
                                    <div class="col-md-3 col-sm-12">
                                        <div class="blog-item style-one">
                                            <div class="item-thumb">
                                                <img src="{{asset($post->medias[0]->address)}}"
                                                     alt=""
                                                     style="height: 180px">
                                            </div>
                                            <div class="blog-text">
                                                <div class="blog-cat">
                                    <span
                                        class="bg-dark text-white">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                                </div>
                                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                    <h5>{{substr($post->title, 0, 80)}}</h5>
                                                </a>
                                            </div>
                                            <div class="blog-timeline">
                                                <div class="bloger-thumb">
                                                    <img
                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                        alt=""
                                                        style="width: 25px;height: 25px">
                                                </div>
                                                <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                    <span
                                                        style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
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
            <!-- blog post wrap start -->
        </div>
    @endif
    @if((!isset($status['video_section'])) OR (($status['video_section']) AND $status['video_section']->is_section == 1))
        <div id="tabs-2">
            <!-- post video page header -->
            <div class="post-pageheader">
                <div class="content-position">
                    <div class="content-text">
                        <h3>Videos</h3>
                        <p>Explore all kinds of interior Inspiration & Ideas</p>
                    </div>
                </div>
            </div>
            <!-- post video page header -->

            <!-- latest blog slider start -->
            <section class="latest-blog mt-5 pt-0">
                <div class="container">
                    <div class="section-wrapper">
                        <div class="section-header">
                            <h3>Latest <i class="fa fa-angle-right"></i></h3>
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
                                @foreach($posts['video'] as $video)
                                    @break($posts['video']->count() > 6)
                                    <div class="swiper-slide">
                                        <div class="blog-item style-one">
                                            <div class="item-thumb">
                                                <img src="{{asset($video->medias[0]->address)}}"
                                                     alt="" style="height: 200px">
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
                                                    <img
                                                        src="{{asset('upload/blogger/avatar')}}/{{$video->blogger->image}}"
                                                        alt="" style="width: 25px;height: 25px">
                                                </div>
                                                <div class="time-line">
                                                    <span class="border-end pe-2"
                                                          style="font-size: 13px">{{substr($video->blogger->blog->blog_name,0,10)}}{{strlen($video->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                    <span
                                                        style="font-size: 13px">{{$video->created_at->diffForHumans()}}</span>
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

            <!-- blog post wrap start -->
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
                            @if(isset($posts['video']))
                                @foreach($posts['video'] as $post)
                                    <div class="col-md-3 col-sm-12">
                                        <div class="blog-item style-one">
                                            <div class="item-thumb">
                                                <img src="{{asset($post->medias[0]->address)}}"
                                                     alt=""
                                                     style="height: 180px">
                                            </div>
                                            <div class="blog-text">
                                                <div class="blog-cat">
                                    <span
                                        class="bg-dark text-white">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                                </div>
                                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                    <h5>{{substr($post->title, 0, 80)}}</h5>
                                                </a>
                                            </div>
                                            <div class="blog-timeline">
                                                <div class="bloger-thumb">
                                                    <img
                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                        alt=""
                                                        style="width: 25px;height: 25px">
                                                </div>
                                                <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                    <span
                                                        style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
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
            <!-- blog post wrap start -->
        </div>
    @endif
    @if((!isset($status['link_section'])) OR (($status['link_section']) AND $status['link_section']->is_section == 1))
        <div id="tabs-3">
            <section class="category-slider socila-feed">
                <div class="container">
                    <div class="section-header">
                        <h3>My Social Feed</h3>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">All
                                </button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile"
                                        aria-selected="false">Instagram
                                </button>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                             aria-labelledby="nav-home-tab">
                            <div class="section-wrapper">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="category-wrapper">
                                            <div class="slide-header">
                                                <h4><i class="fab fa-youtube"></i> YouTube</h4>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem
                                                    mollitia
                                                    culpa sint nulla cumque vel, dolorum ullam maxime dicta quo,
                                                    distinctio
                                                    atque velit illo libero fugiat! Ea numquam odio sint?</p>
                                            </div>
                                            <div class="category-slide2">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next swiper-button-white"></div>
                                                <div class="swiper-button-prev swiper-button-white"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="category-wrapper">
                                            <div class="slide-header">
                                                <h4><i class="fab fa-instagram"></i> Instagram</h4>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem
                                                    mollitia
                                                    culpa sint nulla cumque vel, dolorum ullam maxime dicta quo,
                                                    distinctio
                                                    atque velit illo libero fugiat! Ea numquam odio sint?</p>
                                            </div>
                                            <div class="category-slide3">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <div class="blog-item style-one">
                                                            <div class="item-thumb">
                                                                <img
                                                                    src="{{asset('backend/assets/images/blog/latest/02.jpg')}}"
                                                                    alt="">
                                                            </div>
                                                            <div class="blog-text">
                                                                <div class="blog-cat">
                                                                    <span>Kitchen</span>
                                                                </div>
                                                                <h6>Lorem ipsum dolor sit amet.</h6>
                                                            </div>
                                                            <div class="blog-timeline">
                                                                <div class="time-line">
                                                                    <span class="border-end pe-2">Mox</span>
                                                                    <span>5 Days ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Add Arrows -->
                                                <div class="swiper-button-next swiper-button-white"></div>
                                                <div class="swiper-button-prev swiper-button-white"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="insta-wrapper">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/01.jpg')}}"
                                                     alt="">
                                            </div>
                                            <div class="hover-content">
                                                <a href="#0" class="me-2"><i class="fa fa-heart"></i></a>
                                                <a href="#0"><i class="far fa-comment"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/02.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/03.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/04.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/05.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/06.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/07.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6 mb-4 mb-lg-0">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/08.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-6">
                                        <div class="insta-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/category/09.jpg')}}"
                                                     alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
    @if((!isset($status['about_section'])) OR (($status['about_section']) AND $status['about_section']->is_section == 1))
        <div id="tabs-5">
            <!-- about area start -->
        @if(isset($about['about']))
            @php $layout = 'templates.about.v'.$about['about']->layout @endphp
            @include($layout)
        @else
            @include('templates.about.default')
        @endif
        <!-- about area ends  -->

            <!-- about faq area start -->
            @if(isset($about['faqs']))
                <section class="about-faq">
                    <div class="container">
                        <div class="section-header">
                            <h3>Faq</h3>
                        </div>
                        <div class="section-wrapper">
                            <div class="accordion" id="accordionExample">
                                @foreach($about['faqs'] as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{$faq->id}}">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse{{$faq->id}}" aria-expanded="true"
                                                    aria-controls="collapse{{$faq->id}}">
                                                {{$faq->question}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$faq->id}}"
                                             class="accordion-collapse collapse @if($loop->first) show @endif"
                                             aria-labelledby="heading{{$faq->id}}"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {{$faq->answer}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
        @endif
        <!-- about faq area ends  -->

            <!-- favorite post start -->
            <section class="favorites-post">
                <div class="container">
                    <div class="section-header">
                        <h3>My Favorite Post</h3>
                    </div>
                    <div class="section-wrapper">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blog-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/latest/01.jpg" alt="">
                                        <div class="video-btn">
                                            <a href="#0">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                            <span>Styling</span>
                                        </div>
                                        <div class="blog-timeline">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit voluptas
                                            molestiae corporis rem magnam fuga quis minus, eligendi porro dolore.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">
                                <div class="blog-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/latest/01.jpg" alt="">
                                        <div class="video-btn">
                                            <a href="#0">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                            <span>Kitchen</span>
                                        </div>
                                        <div class="blog-timeline">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit voluptas
                                            molestiae corporis rem magnam fuga quis minus, eligendi porro dolore.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 mt-4 mb-lg-0">
                                <div class="blog-item">
                                    <div class="item-thumb">
                                        <img src="assets/images/blog/latest/01.jpg" alt="">
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
                                        <div class="blog-timeline">
                                            <strong>Shay alnwick</strong>
                                            <span class="me-1 ms-1">/</span>
                                            <span>24 July 2017</span>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit voluptas
                                            molestiae corporis rem magnam fuga quis minus, eligendi porro dolore.</p>
                                    </div>
                                    <div class="blog-more mt-3">
                                        <a href="#0">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- favorite post ends  -->
        </div>
    @endif
</div>
<!-- all profile tabs start -->

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

<script>
    $(document).ready(function () {
        // $('.see-more-about').on('click', activaTab('tabs-5'));
        activaTab('tabs-5')
    });

    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    };
</script>
</body>
</html>
