<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    h3 {
        font-size: 25px;
    }

    .blog-video-banner .image-thumb{
        height: 700px;
    }
    .blog-video-banner .image-thumb img {
        width: 100%;
        height: inherit !important;
    }
    .blog-video-banner .image-thumb:hover img {
        transform: scale(1.1);
    }

    .page-header{
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .blog-area{
        margin-top: 50px !important;
    }

    #main-post-content h4 span {
        font-size: 25px;
    }
    #main-post-content .v5-post-title{
        position: relative;
        margin: auto;
    }
    #main-post-content .v5-post-title h3{
        font-size: 25px;
        position: relative;
        display: inline;
    }
    #main-post-content .v5-post-title p{
        display: inline;
    }
    #main-post-content .v5-post-title h3::after{
        content: '';
        width: 17px;
        height: 17px;
        background: lightgrey;
        position: absolute;
        left: -1px;
        bottom: 3px;
        z-index: -9;
        border-radius: 50%;
    }
    #main-post-content .container > .row:nth-child(2), #main-post-content .container > .row:nth-child(3){
        margin-top: 100px;
    }

    .blog-area {
        margin-top: 150px;
        margin-bottom: 50px;
    }

    #bottom-part.ads .container{
        padding: 0;
        padding-top: 300px;
        background-image: url("../assets/images/banner/profile/01.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    #bottom-part.ads .container .ads-part{
        background-color: white;
        padding: 30px;
        border-top-left-radius: 5px;
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
        font-size: 20px;
        margin-left: 90px;
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
        margin-top: 300px;
    }

    @media screen and (max-width: 576px) {
        .blog-video-banner .image-thumb{
            box-sizing: border-box;
            overflow: hidden;
            height: 20vh;
            border-radius: 5px;
        }
        .blog-video-banner .image-thumb img {
            width: 100%;
            height: auto;
        }
        .blog-video-banner .image-thumb:hover img {
            transform: scale(1.1);
        }

        /*#top-section .video-thumb img {*/
        /*    width: 100%;*/
        /*    height: auto;*/
        /*}*/
        .page-header{
            padding-top: 20px;
            padding-bottom: 80px;
        }

        .page-header h3 {
            font-size: 20px;
        }

        #main-post-content h3, h4, p {
            text-align: center;
        }
        #main-post-content .v5-post-title{
            width: 50%;
        }
        #main-post-content .col-space{
            margin-top: 50px;
        }
        #main-post-content .col-inner-space{
            margin-top: 15px;
        }
        #main-post-content .container > .row:nth-child(2), #main-post-content .container > .row:nth-child(3){
            margin-top: 50px;
        }

        #last-three-image .col {
            width: 33.33%;
            padding: 0;
        }

        #last-three-image .col img {
            border-radius: 0 !important;
        }

        #bottom-part.ads .container{
            padding-top: 30px;
            padding-bottom: 30px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        #bottom-part.ads .container .ads-part{
            border-radius: 5px;
        }
        #bottom-part.ads h3{
            text-align: center;
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

        #comment-box .comment-field {
            margin-top: 300px;
        }

        #comment-box .comment-field h4 {
            text-align: left;
        }
    }
    @media screen and (max-width: 459px) {
        #main-post-content .v5-post-title{
            width: 90%;
        }
    }
</style>

<!-- page header area start -->
<section class="page-header" style="padding-top: 50px">
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
    <div class="container-fluid p-0">
        <video width="100%" height="240" controlsList="nodownload" controls>
            <source src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
            {{--            <source src="movie.ogg" type="video/ogg">--}}
            Your browser does not support the video
        </video>
    </div>
</section>
<!-- Blog video banner ends  -->

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4 id="intro-heading">{{$post['post']->intro_headline}}</h4>
                            <p class="lh-lg" id="intro-description">{{$post['post']->intro_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4></h4>
                            <p class="lh-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi</p>
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
        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">1</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline1">
                                <strong>{{$post['post']->headline1}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description1">{{$post['post']->description1}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '1')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-one-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">2</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline2">
                                <strong>{{$post['post']->headline2}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description2">{{$post['post']->description2}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '2')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-two-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">3</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline3">
                                <strong>{{$post['post']->headline3}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description3">{{$post['post']->description3}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '3')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-three-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">4</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline4">
                                <strong>{{$post['post']->headline4}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description4">{{$post['post']->description4}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '4')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-four-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">5</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline5">
                                <strong>{{$post['post']->headline5}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description5">{{$post['post']->description5}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '5')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-five-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">6</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px" id="headline6">
                                <strong>{{$post['post']->headline6}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description6">{{$post['post']->description6}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '6')
                        {{asset($post['post']->medias[$index]->address)}}
                        @php $index++ @endphp
                        @endif" id="headline-six-image" alt="">
                    </div>
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
                    <h4 class="text-center" id="outro-heading">{{$post['post']->outro_headline}}</h4>
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
<!-- Blog main area ends -->

@include('layouts.like_comment_section')

@include('layouts.related_posts')

