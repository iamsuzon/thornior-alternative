<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- page header area start -->
<section class="page-header style-one style-two">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>{{(\App\Models\Category::where('slug',$slug)->select('name')->first()->name)}}</h2>
            <p>Explore all kind of interior inspiration & ideas</p>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- latest blog slider start -->
<section class="latest-blog">
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
                    @if(isset($posts['posts']))
                        @foreach($posts['posts'] as $post)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb">
                                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt=""
                                             style="height: 200px">
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <div class="video-btn">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-text">
                                        <div class="blog-cat">
                                        <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                +{{$post->categories->count()-1}}
                                                more @break @endif  @endforeach</span>
                                        </div>
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <h5>{{$post->title}}</h5>
                                        </a>
                                    </div>
                                    <div class="blog-timeline">
                                        <div class="bloger-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
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
                    @else
                        <p style="color: gray">No Post Available Right Now</p>
                    @endif
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- latest blog slider ends  -->

<!-- viewed slider area start -->
{{--<section class="viewed-blog padding-tb pt-0">--}}
{{--    <div class="container">--}}
{{--        <div class="section-wrapper">--}}
{{--            <div class="section-header">--}}
{{--                <h3>Most viewed <i class="fa fa-angle-right"></i></h3>--}}
{{--                <!-- slider arrow -->--}}
{{--                <div class="slider-arrow">--}}
{{--                    <div class="viewed-button-prev prev">--}}
{{--                        <i class="fa fa-angle-left"></i>--}}
{{--                    </div>--}}
{{--                    <div class="viewed-button-next next">--}}
{{--                        <i class="fa fa-angle-right"></i>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="viewed-blog-slider">--}}
{{--                <div class="swiper-wrapper">--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>01</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/02.jpg" alt="">--}}
{{--                                    <div class="video-btn">--}}
{{--                                        <a href="#0">--}}
{{--                                            <i class="fa fa-play"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>02</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>03</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/02.jpg" alt="">--}}
{{--                                    <div class="video-btn">--}}
{{--                                        <a href="#0">--}}
{{--                                            <i class="fa fa-play"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>04</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.jpg" alt="">--}}
{{--                                    <div class="video-btn">--}}
{{--                                        <a href="#0">--}}
{{--                                            <i class="fa fa-play"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>05</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/02.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>06</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.jpg" alt="">--}}
{{--                                    <div class="video-btn">--}}
{{--                                        <a href="#0">--}}
{{--                                            <i class="fa fa-play"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>07</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/02.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="swiper-slide">--}}
{{--                        <div class="blog-item style-one">--}}
{{--                            <div class="thumb-crount">--}}
{{--                                <div class="crount">--}}
{{--                                    <span>08</span>--}}
{{--                                </div>--}}
{{--                                <div class="item-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/02.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <div class="blog-cat">--}}
{{--                                    <span>Diy</span>--}}
{{--                                </div>--}}
{{--                                <h5>7 Fun home projects to do this summer</h5>--}}
{{--                            </div>--}}
{{--                            <div class="blog-timeline">--}}
{{--                                <div class="bloger-thumb">--}}
{{--                                    <img src="assets/images/blog/latest/01.png" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="time-line">--}}
{{--                                    <span class="border-end pe-2">Mox</span>--}}
{{--                                    <span>5 Days ago</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- add progressbar -->--}}
{{--                <div class="swiper-pagination"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- viewed slider area ends  -->

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
                @if(isset($posts['posts']))
                    @foreach($posts['posts'] as $post)
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
