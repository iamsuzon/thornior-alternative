<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    h3 {
        font-size: 25px;
    }

    .video-thumb video {
        width: 100%;
    }

    .des-tips img {
        width: 400px;
        height: 600px;
    }

    #last-images img {
        width: 100%;
        height: auto;
    }

    #main-post-content {
        margin-top: 100px;
    }

    #main-post-content .drop-case::first-letter {
        font-size: 30px;
    }

    #last-images {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    #last-images .image-box img {
        border-radius: 5px;
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
        .image-thumb > img {
            width: 100%;
            height: auto;
        }

        .des-tips img {
            width: 100%;
            height: auto;
        }

        .des-tips .col-sm-12 {
            margin-top: 30px;
        }

        .des-tips .list {
            margin: 0 20px;
        }

        .des-tips .list .list-span-1 .list-span-2 {
            left: 0 !important;
            bottom: -35px !important;
        }

        .des-tips .list .list-span-1 .list-span-2 h3 {
            padding: 0 10px !important;
            font-size: 20px !important;
        }

        .des-tips .list-span-1 h5 {
            margin-left: 40px;
        }

        #last-images {
            margin-top: 0;
            margin-bottom: 30px;
        }

        #last-images .image-box {
            width: 50% !important;
            margin-top: 10px;
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
                       src="{{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}}"
                       width="20px"
                       height="20px">{{$post['post']->blogger->name}}</span>
            <span class="ms-4">{{$post['post']->created_at->format('d M Y')}}</span>
            <span class="ms-4"><i
                    class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid">
        <video width="100%" height="240" controlsList="nodownload" controls>
            <source
                src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                type="video/mp4">
            {{--            <source src="movie.ogg" type="video/ogg">--}}
            Your browser does not support the video
        </video>
    </div>
</section>
<!-- Blog video banner ends  -->

@php
 $index = 1;
@endphp

<!-- main post area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="intro-heading">{{$post['post']->intro_header}}</h3>
                <p class="drop-case"
                   id="intro-description">{{$post['post']->intro_description}}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline1">{{$post['post']->point_headline_1}}</h5>
                        <p id="pointDescription1">{{$post['post']->point_description_1}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline2">{{$post['post']->point_headline_2}}</h5>
                        <p id="pointDescription2">{{$post['post']->point_description_2}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline3">{{$post['post']->point_headline_3}}</h5>
                        <p id="pointDescription3">{{$post['post']->point_description_3}}</p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline4">{{$post['post']->point_headline_4}}</h5>
                        <p id="pointDescription4">{{$post['post']->point_description_4}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline5">{{$post['post']->point_headline_5}}</h5>
                        <p id="pointDescription5">{{$post['post']->point_description_5}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline6">{{$post['post']->point_headline_6}}</h5>
                        <p id="pointDescription6">{{$post['post']->point_description_6}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="headline_outro">{{$post['post']->headlines_outro_header}}</h3>
                <p id="headline_outro_description">{{$post['post']->headlines_outro_description}}</p>
            </div>
        </div>
    </div>
</section>
<!-- main post area ends -->

<section id="last-images">
    <div class="container-fluid">
        <div class="des-thumb">
            <div class="row gx-2">
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img
                        src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '1')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif"
                        id="loadimage-1" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img
                        src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '2')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif"
                        id="loadimage-2" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img
                        src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '3')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif"
                        id="loadimage-3" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img
                        src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '4')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif"
                        id="loadimage-4" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <h4 class="text-center"
                        id="outro-heading">{{$post['post']->outro_header}}</h4>
                    <p id="outro-description">{{$post['post']->outro_description}}</p>
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

@include('layouts.like_comment_section')

@include('layouts.related_posts')
