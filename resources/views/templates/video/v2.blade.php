<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    .blog-area {
        padding-bottom: 0;
    }

    #main-post-content h4 span {
        font-size: 25px;
    }

    #main-post-content .row:nth-child(2) {
        margin-top: 50px;
    }

    #main-post-content .post-box {
        position: relative;
    }

    #main-post-content .post-box .number {
        background-color: #000;
        border-radius: 2px;
        display: inline-block;
        padding: 0 20px;
        position: absolute;
        left: -20px;
        top: -20px;
    }

    #main-post-content .post-box .number h3 {
        color: #fff;
        margin: 0;
        padding: 0;
    }

    #main-post-content .post-box .image-box img {
        border-radius: 5px;
    }

    .second-headline {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    #color-palettes .color-box {
        width: 120px;
    }

    #color-palettes .color-box > .box {
        width: 120px;
        height: 80px;
    }

    #comment-box {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    #comment-box .social-interaction li {
        font-size: 25px;
        margin-left: 50px;
    }

    #comment-box .social-interaction li:first-child {
        margin: 0;
    }

    #comment-box .comments .comment-image {
        width: 5%;
        float: left;
    }

    #comment-box .comments .comment-text {
        width: 95%;
        float: left;
    }

    #comment-box .comment-field {
        margin-top: 200px;
    }

    @media screen and (max-width: 576px) {
        #main-post-content h3, h4, p {
            text-align: center;
        }

        #main-post-content .row:nth-child(2) {
            margin-top: 0;
        }

        #main-post-content .post-box .number {
            padding: 5px 20px;
            left: 0;
            top: 0;
        }

        #main-post-content .post-box .number h3 {
            font-size: 30px;
        }

        .second-headline {
            display: none;
        }

        #color-palettes .color-box {
            width: 100px;
        }

        #color-palettes .color-box > .box {
            width: 100px;
            height: 50px;
        }

        #comment-box .comments .comment-image {
            width: 10%;
            float: left;
        }

        #comment-box .comments .comment-text {
            width: 80%;
            float: left;
            margin-left: 15px;
        }

        #comment-box .comments .comment-text p {
            text-align: left;
        }
    }
</style>

<!-- page header area start -->
<section class="page-header">
    <div class="container">
        <div class="header-content">
            <div class="blog-cat" style="padding: 12px 0 10px">
                @foreach($post['post']->categories as $category)
                    <span id="post_categories"
                          style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">{{$category->name}}</span>
                @endforeach
            </div>
            <h3 id="post-title">{{$post['post']->title}}</h3>
            <span><img class="rounded-circle"
                       src="@if($post['post']->blogger->image != 'user.jpg') {{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}} @else {{asset('backend/assets/images/blog/card/01.jpg')}} @endif"
                       width="20px" height="20px">{{$post['post']->blogger->name}}</span>
            <span class="ms-4">{{$post['post']->created_at->format('M d, Y')}}</span>
            <span class="ms-4"><i class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container">
        @if(isset($post['post']->video))
            <video width="100%" height="240" controlsList="nodownload" controls>
                <source
                    src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
                {{--            <source src="movie.ogg" type="video/ogg">--}}
                Your browser does not support the video
            </video>
        @endif
    </div>
</section>
<!-- Blog video banner ends  -->

<!-- common blog area start -->
<section class="blog-area pt-5">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-3">
                        <div class="des-text my-3">
                            <h4 class="text-center" id="intro-heading">{{$post['post']->intro_header}}</h4>
                            <p id="intro-description">{{$post['post']->intro_description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->

@php
    $index = 1;
@endphp

<!-- Blog main area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row gx-lg-5 gx-md-5 gx-sm-0 ">
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>1</h3>
                    </div>
                    <div class="image-box">
                        @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '1')
                            <img src="{{asset($post['post']->medias[$index]->address)}} @php $index++ @endphp"
                                 id="article-one-image" alt="">
                        @endif
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline1">
                            <span style="color: darkgrey">{{$post['post']->headline1}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description1">{{$post['post']->description1}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>2</h3>
                    </div>
                    <div class="image-box">
                        <img
                            src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '2')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif"
                            id="article-two-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline2">
                            <span style="color: darkgrey">{{$post['post']->headline2}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description2">{{$post['post']->description2}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>3</h3>
                    </div>
                    <div class="image-box">
                        <img
                            src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '3')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif"
                            id="article-three-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline3">
                            <span style="color: darkgrey">{{$post['post']->headline3}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description3">{{$post['post']->description3}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-lg-5 gx-md-5 gx-sm-0">
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>4</h3>
                    </div>
                    <div class="image-box">
                        <img
                            src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '4')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif"
                            id="article-four-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline4">
                            <span style="color: darkgrey">{{$post['post']->headline4}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description4">{{$post['post']->description4}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>5</h3>
                    </div>
                    <div class="image-box">
                        <img
                            src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '5')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif"
                            id="article-five-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline5">
                            <span style="color: darkgrey">{{$post['post']->headline5}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description5">{{$post['post']->description5}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>6</h3>
                    </div>
                    <div class="image-box">
                        <img
                            src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '6')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif"
                            id="article-six-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline6">
                            <span style="color: darkgrey">{{$post['post']->headline6}}</span>
                            {{--                            <span>Room</span>--}}
                        </h4>
                        <p class="mt-2" id="description6">{{$post['post']->description6}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<!-- second headline start -->
<section class="second-headline">
    <div class="container">
        <div class="row">
            <img class="rounded"
                 src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '7')
                 {{asset($post['post']->medias[$index]->address)}}
                 @php $index++ @endphp
                 @endif"
                 id="imageOutro" alt="">
        </div>
    </div>
</section>
<!-- second headline ends -->

<section id="color-palettes" style="margin: 100px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                @if(isset($post['post']->color1))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color1}};@if(strtolower($post['post']->color1) == '#fff' OR strtolower($post['post']->color1) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color1,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color2))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color2}};@if(strtolower($post['post']->color2) == '#fff' OR strtolower($post['post']->color2) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color2,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color3))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color3}};@if(strtolower($post['post']->color3) == '#fff' OR strtolower($post['post']->color3) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color3,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color4))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color4}};@if(strtolower($post['post']->color4) == '#fff' OR strtolower($post['post']->color4) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color4,1,7)}}</p>
                    </div>
                @endif
                @if(isset($post['post']->color5))
                    <div class="color-box mx-3 d-inline-block">
                        <div class="box rounded"
                             style="background-color: {{$post['post']->color5}};@if(strtolower($post['post']->color5) == '#fff' OR strtolower($post['post']->color5) == '#ffffff') border:1px solid lightgrey @endif"></div>
                        <p class="text-center mt-1">{{substr($post['post']->color5,1,7)}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="bottom-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="des-text">
                    <h4 class="text-center" id="outro-heading">{{$post['post']->outro_header}}</h4>
                    <p id="outro-description">{{$post['post']->outro_description}}.</p>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12 col-12">
                <div class="blog-post-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($post['products'] as $product)
                            <div class="swiper-slide">
                                <div class="blog-item style-one">
                                    <div class="item-thumb" style="height: 200px">
                                        <img src="{{asset('upload/blogger_product')}}/{{$product->image}}" alt=""
                                             style="height: 200px">
                                    </div>
                                    <div class="blog-text">
                                        <h4 class="mt-2">{{$product->product_name}}</h4>
                                        <p style="text-align: justify">{{substr($product->product_details,0,140)}}..</p>
                                        <a href="{{$product->link}}" target="_blank" class="text-dark fw-bold mt-2"
                                           style="font-size: 15px">Link to Website
                                            ></a>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
