<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    h3 {
        font-size: 25px;
    }

    #top-section {
        position: relative;
        padding-bottom: 100px;
    }

    #top-section .video-thumb {
        box-sizing: border-box;
        overflow: hidden;
        height: 350px;
    }

    #top-section .video-thumb img {
        width: 100%;
        height: auto;
    }

    .page-header {
        background: white;
        position: absolute;
        left: 50%;
        bottom: 0;
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        z-index: 999;
        box-shadow: 0 8px 60px 0 rgb(128 128 0 / 11%), 0 12px 90px 0 rgb(103 151 255 / 11%);
    }

    .page-header .container {
        width: 100% !important;
    }

    .headline-2-row {
        margin-top: 100px;
    }

    #main-post-content {
        margin-top: 100px;
    }

    #main-post-content h4 span {
        font-size: 25px;
    }

    .blog-area {
        margin-top: 150px;
        margin-bottom: 50px;
    }

    #last-three-image {
        margin: 130px 0;
    }


    #color-palettes .color-box {
        width: 120px;
    }

    #color-palettes .color-box > .box {
        width: 120px;
        height: 80px;
    }

    #bottom-part.ads .container {
        padding: 0;
        padding-top: 300px;
        background-image: url("{{asset('backend/assets/images/banner/profile/01.jpg')}}");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    #bottom-part.ads .container .ads-part {
        background-color: white;
        padding: 30px;
        border-top-left-radius: 5px;
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
        #top-section {
            position: relative;
            padding-bottom: 100px;
        }

        #top-section .video-thumb {
            height: auto;
        }

        #top-section .video-thumb img {
            width: 100%;
            height: auto;
        }

        .page-header {
            width: 80%;
            background: white;
            position: absolute;
            left: 50%;
            bottom: 0;
            -ms-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }

        .blog-area {
            margin-bottom: 10px;
            padding-bottom: 10px;
        }

        .blog-description h3 {
            text-align: center;
        }

        .page-header h3 {
            font-size: 20px;
        }

        #main-post-content {
            margin-top: 80px;
        }

        #main-post-content h3, h4, p {
            text-align: center;
        }

        #main-post-content .list li p {
            text-align: left;
        }

        #last-three-image {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        #last-three-image .col {
            width: 33.33%;
            padding: 0;
        }

        #last-three-image .col img {
            border-radius: 0 !important;
        }

        #color-palettes .color-box {
            width: 100px;
        }

        #color-palettes .color-box > .box {
            width: 100px;
            height: 50px;
        }

        #bottom-part.ads .container {
            padding-top: 30px;
            padding-bottom: 30px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        #bottom-part.ads .container .ads-part {
            border-radius: 5px;
        }

        #bottom-part.ads h3 {
            text-align: center;
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

<section id="top-section">
    <!-- Blog video banner start -->
    <div class="blog-video-banner">
        <div class="container">
            <video width="100%" height="240" controlsList="nodownload" controls>
                <source
                    src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
                {{--            <source src="movie.ogg" type="video/ogg">--}}
                Your browser does not support the video
            </video>
        </div>
    </div>
    <!-- Blog video banner ends  -->

    <!-- page header area start -->
    <div class="page-header p-4">
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
                           src="{{asset('upload/blogger/avatar')}}/{{Auth::guard('blogger')->user()->image}}"
                           width="20px"
                           height="20px">{{$post['post']->blogger->name}}</span>
                <span class="ms-4">{{$post['post']->created_at->format('d M Y')}}</span>
                <span class="ms-4"><i
                        class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
            </div>
        </div>
    </div>
    <!-- page header area ends  -->
</section>

@php
    $index = 1;
@endphp

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description ">
                        <div class="des-text">
                            <h3 id="headline1">{{$post['post']->headline1}}</h3>
                            <p class="lh-lg"
                               id="description1">{{$post['post']->description1}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '1')
                            <img class="rounded"
                                 src="
                                 {{asset($post['post']->medias[$index]->address)}}
                                 @php $index++ @endphp"
                                 id="article-one-image" alt="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row gx-5 justify-content-center headline-2-row flex-column-reverse flex-lg-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        <img class="rounded"
                             src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '2')
                             {{asset($post['post']->medias[$index]->address)}}
                             @php $index++ @endphp
                             @endif"
                             id="article-two-image" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description">
                        <div class="des-text">
                            <h3 id="headline2">{{$post['post']->headline2}}</h3>
                            <p class="lh-lg"
                               id="description2">{{$post['post']->description2}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->

<!-- Blog main area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="intro-heading">{{$post['post']->intro_heading}}</h3>
                <p id="intro-description">{{$post['post']->intro_description}}</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline1">{{$post['post']->point_heading_1}}</h5>
                        <p id="pointDescription1">{{$post['post']->point_description_1}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline2">{{$post['post']->point_heading_2}}</h5>
                        <p id="pointDescription2">{{$post['post']->point_description_2}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline3">{{$post['post']->point_heading_3}}</h5>
                        <p id="pointDescription3">{{$post['post']->point_description_3}}</p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline4">{{$post['post']->point_heading_4}}</h5>
                        <p id="pointDescription4">{{$post['post']->point_description_4}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline5">{{$post['post']->point_heading_5}}</h5>
                        <p id="pointDescription5">{{$post['post']->point_description_5}}</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline6">{{$post['post']->point_heading_6}}</h5>
                        <p id="pointDescription6">{{$post['post']->point_description_6}}</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="outro-heading">{{$post['post']->last_headline}}</h3>
                <p id="outro-description">{{$post['post']->last_description}}</p>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<section id="last-three-image">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-4 col-md-4 col">
                <img
                    src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '3')
                    {{asset($post['post']->medias[$index]->address)}}
                    @php $index++ @endphp
                    @endif"
                    id="loadimage-1" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img
                    src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '4')
                    {{asset($post['post']->medias[$index]->address)}}
                    @php $index++ @endphp
                    @endif"
                    id="loadimage-2" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img
                    src="@if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '5')
                    {{asset($post['post']->medias[$index]->address)}}
                    @php $index++ @endphp
                    @endif"
                    id="loadimage-3" alt="">
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

<section id="bottom-part" class="ads">
    <div class="container" id="productBgImage"
         @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '6')
         style="background-image: url({{asset($post['post']->medias[$index]->address)}})" @endif>
        <div class="row gx-0">
            <div class="offset-lg-6 offset-md-6 offset-sm-0 col-lg-6 col-md-6 col-sm-12">
                <div class="ads-part">
                    <h3>Products</h3>
                    <p class="mt-2 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis</p>
                    @if(isset($post['products']))
                        @foreach($post['products'] as $key => $product)
                            @if($key == 0 OR $key == 3)
                                <div class="row">
                                    @endif
                                    <div class="col-4">
                                        <p class="fw-bold fs-6 m-0">{{$product->product_name}}</p>
                                        <a href="{{$product->link}}" target="_blank">Visit</a>
                                    </div>
                                    @if($key == 2 OR $key==5)
                                        <div class="row">
                                            @break
                                            @endif
                                            @endforeach
                                            @else
                                                <div class="row">
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Table</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Sofa</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Chair</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Self</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Bed</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                    <div class="col-4">
                                                        <p class="fw-bold fs-6 m-0">Desk</p>
                                                        <p>IKEA</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                </div>
                </div>
            </div>
</section>
