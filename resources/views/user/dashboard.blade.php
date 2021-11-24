@extends('layouts.user_loggedin_app')

@section('content')
    <!-- blog item start -->
    <section class="bloger-iteml">
        <div class="section-wrapper">
            <div class="section-header">
                <h4>Blogs</h4>
            </div>
            <ul class="blogerl-item">
                @forelse($user_data['following_blogs'] as $blog)
                    <li>
                        <a href="{{route('blog',$blog->blog->blog_slug)}}">
                            <div class="item-thumb">
                                <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blog->blogger->image}}" alt="">
                            </div>
                            <div class="thumb-title">
                                <h6>{{$blog->blog->blog_name}}</h6>
                            </div>
                        </a>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>
    </section>
    <!-- blog item ends  -->

    <!-- recent blog slider start -->
    <section class="latest-blog pt-0 pb-5">
        <div class="section-wrapper overflow-hidden">
            <div class="section-header">
                <h3 class="bg-transparent text-uppercase fs-5">Recently Uploaded <i
                        class="fa fa-angle-right"></i></h3>
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
                    @foreach($user_data['latest_posts'] as $posts)
                        @if(empty($posts) OR $posts == null)
                            @continue
                        @endif
                        @foreach($posts as $post)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 150px">
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
                                            <span
                                                style="font-size: 10px">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                    +{{$post->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{substr($post->title, 0, 40)}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                 alt=""
                                                 style="width: 25px;height: 25px">
                                        </div>
                                        <div class="time-line">
                                            <span class="border-end pe-2"
                                                  style="font-size: 12px">{{$post->blogger->blog->blog_name}}</span>
                                            <span style="font-size: 12px">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- recent blog slider ends  -->

    <!-- thornior blog slider start -->
    <section class="thornior-blog pt-0 pb-5">
        <div class="section-wrapper overflow-hidden">
            <div class="section-header">
                <h3 class="bg-transparent text-uppercase fs-5">Trending <i
                        class="fa fa-angle-right"></i></h3>
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
                                <img src="assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
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
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <img src="assets/images/blog/latest/02.jpg" alt="">
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
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <img src="assets/images/blog/latest/02.jpg" alt="">
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
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
                                <img src="assets/images/blog/latest/02.jpg" alt="">
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
                                    <img src="assets/images/blog/latest/01.png" alt="">
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
    </section>
    <!-- thornior blog slider ends  -->

    <!-- videos blog slider start -->
    <section class="videos-blog pt-0 pb-5">
        <div class="section-wrapper overflow-hidden">
            <div class="section-header">
                <h3 class="bg-transparent text-uppercase fs-5">Videos <i
                        class="fa fa-angle-right"></i></h3>
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
                    @foreach($user_data['latest_posts'] as $posts)
                        @if(empty($posts) OR $posts == null)
                            @continue
                        @endif
                        @foreach($posts as $post)
                            @if(!isset($post->video))
                                @continue
                            @endif
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 150px">
                                        <div class="video-btn">
                                            <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                            <span
                                                style="font-size: 10px">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                    +{{$post->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{substr($post->title, 0, 40)}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                 alt=""
                                                 style="width: 25px;height: 25px">
                                        </div>
                                        <div class="time-line">
                                            <span class="border-end pe-2"
                                                  style="font-size: 12px">{{$post->blogger->blog->blog_name}}</span>
                                            <span style="font-size: 12px">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- videos blog slider ends  -->

    <!-- recommended blog slider start -->
    <section class="videos-blog pb-0 pt-0">
        <div class="section-wrapper overflow-hidden">
            <div class="section-header">
                <h3 class="bg-transparent text-uppercase fs-5">Recommended <i
                        class="fa fa-angle-right"></i></h3>
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
                    @foreach($user_data['latest_posts'] as $posts)
                        @if(empty($posts) OR $posts == null)
                            @continue
                        @endif
                        @foreach($posts as $post)
                            @if(!isset($post->video))
                                @continue
                            @endif
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 150px">
                                        <div class="video-btn">
                                            <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                            <span
                                                style="font-size: 10px">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                    +{{$post->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{substr($post->title, 0, 40)}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                 alt=""
                                                 style="width: 25px;height: 25px">
                                        </div>
                                        <div class="time-line">
                                            <span class="border-end pe-2"
                                                  style="font-size: 12px">{{$post->blogger->blog->blog_name}}</span>
                                            <span style="font-size: 12px">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- recommended blog slider ends  -->
@endsection
