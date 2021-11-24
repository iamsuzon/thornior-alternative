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
            @if(isset($post['post']))
            <video width="100%" height="240" controlsList="nodownload" controls>
                <source
                    src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
                    type="video/mp4">
                {{--            <source src="movie.ogg" type="video/ogg">--}}
                Your browser does not support the video
            </video>
            @else
                <div class="video-position">
                    <div class="overlay"></div>
                    <div class="video-thumb image-thumb">
                        <img
                            src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                            alt="" id="coverImage">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Blog video banner ends  -->

    <!-- page header area start -->
    <div class="page-header p-4">
        <div class="container">
            <div class="header-content">
                <div class="blog-cat" style="padding: 12px 0 10px">
                    <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
                </div>
                <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to
                    your
                    leaving room, here are a few basic tips @endif</h3>
                <span><img class="rounded-circle"
                           src="{{asset('upload/blogger/avatar')}}/{{Auth::guard('blogger')->user()->image}}"
                           width="20px"
                           height="20px">@if(isset($post['post'])) {{$post['post']->blogger->name}} @else {{Auth::guard('blogger')->user()->name}} @endif</span>
                <span class="ms-4">@if(isset($post['post'])){{$post['post']->created_at->format('d M Y')}} @else June 8,
                    2021 @endif</span>
                <span class="ms-4"><i
                        class="fa fa-clock me-2"></i>@if(isset($post['post'])) {{$post['post']->created_at->diffForHumans()}} @else
                        11 Min @endif</span>
            </div>
        </div>
    </div>
    <!-- page header area ends  -->
</section>

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description ">
                        <div class="des-text">
                            <h3 id="headline1">@if(isset($post['post'])) {{$post['post']->headline1}} @else
                                    Headline 1 @endif</h3>
                            <p class="lh-lg"
                               id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else Lorem
                                ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta dolor minima eligendi recusandae magnam,
                                ullam voluptatem dignissimos vero deleniti
                                tempore voluptate expedita architecto
                                nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        @php
                            if(isset($post['post'])) $image = $post['post']->getMedia('video');
                            $i = 1;
                        @endphp
                        <img class="rounded"
                             src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_1') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                             id="article-one-image" alt="">
                    </div>
                </div>
            </div>

            <div class="row gx-5 justify-content-center headline-2-row flex-column-reverse flex-lg-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        <img class="rounded"
                             src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_2') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                             id="article-two-image" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description">
                        <div class="des-text">
                            <h3 id="headline2">@if(isset($post['post'])) {{$post['post']->headline2}} @else
                                    Headline 2 @endif</h3>
                            <p class="lh-lg"
                               id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else Lorem
                                ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta dolor minima eligendi recusandae magnam,
                                ullam voluptatem dignissimos vero deleniti
                                tempore voluptate expedita architecto
                                nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi @endif</p>
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
                <h3 id="intro-heading">@if(isset($post['post'])) {{$post['post']->intro_header}} @else
                        Headlines Intro @endif</h3>
                <p id="intro-description">@if(isset($post['post'])) {{$post['post']->intro_description}} @else Lorem
                    ipsum dolor, sit amet consectetur adipisicing
                    elit. Illum consequuntur, nobis suscipit at,
                    dicta dolor minima eligendi recusandae magnam,
                    ullam voluptatem dignissimos vero deleniti
                    tempore voluptate expedita architecto
                    nesciunt amet debitis optio eveniet?
                    Eos voluptatum cupidi @endif</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline1">@if(isset($post['post'])) {{$post['post']->point_headline_1}} @else
                                Point 1 @endif</h5>
                        <p id="pointDescription1">@if(isset($post['post'])) {{$post['post']->point_description_1}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline2">@if(isset($post['post'])) {{$post['post']->point_headline_2}} @else
                                Point 2 @endif</h5>
                        <p id="pointDescription2">@if(isset($post['post'])) {{$post['post']->point_description_2}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline3">@if(isset($post['post'])) {{$post['post']->point_headline_3}} @else
                                Point 3 @endif</h5>
                        <p id="pointDescription3">@if(isset($post['post'])) {{$post['post']->point_description_3}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <ul class="list">
                    <li>
                        <h5 id="pointHeadline4">@if(isset($post['post'])) {{$post['post']->point_headline_4}} @else
                                Point 4 @endif</h5>
                        <p id="pointDescription4">@if(isset($post['post'])) {{$post['post']->point_description_4}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline5">@if(isset($post['post'])) {{$post['post']->point_headline_5}} @else
                                Point 5 @endif</h5>
                        <p id="pointDescription5">@if(isset($post['post'])) {{$post['post']->point_description_5}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline6">@if(isset($post['post'])) {{$post['post']->point_headline_6}} @else
                                Point 6 @endif</h5>
                        <p id="pointDescription6">@if(isset($post['post'])) {{$post['post']->point_description_6}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else
                        Headlines Outro @endif</h3>
                <p id="outro-description">@if(isset($post['post'])) {{$post['post']->outro_description}} @else Lorem
                    ipsum dolor, sit amet consectetur adipisicing
                    elit. Illum consequuntur, nobis suscipit at,
                    dicta dolor minima eligendi recusandae magnam,
                    ullam voluptatem dignissimos vero deleniti
                    tempore voluptate expedita architecto
                    nesciunt amet debitis optio eveniet?
                    Eos voluptatum cupidi @endif</p>
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
                    src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_3') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                    id="loadimage-1" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img
                    src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_4') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                    id="loadimage-2" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img
                    src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_5') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                    id="loadimage-3" alt="">
            </div>
        </div>
    </div>
</section>

<section id="color-palettes" style="margin: 100px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                @if(isset($post['colors']))
                    @foreach($post['colors'] as $color)
                        <div class="color-box color-box1 mx-3 d-inline-block">
                            <div class="box rounded"
                                 style="background-color: {{$color}} @if(strtolower($color) == '#fff' OR strtolower($color) == '#ffffff') ;border: 1px solid lightgrey @endif"></div>
                            <p class="text-center mt-1">{{$color}}</p>
                        </div>
                    @endforeach
                @else
                    <div class="color-box color-box1 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: red"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box2 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: blue"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box3 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: greenyellow"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box4 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: orangered"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                    <div class="color-box color-box5 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: rebeccapurple"></div>
                        <p class="text-center mt-1">Add Color</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="bottom-part" class="ads">
    <div class="container" id="productBgImage">
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
