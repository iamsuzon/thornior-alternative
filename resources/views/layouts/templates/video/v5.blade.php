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

    #main-post-content{
        margin-top: 100px;
    }
    #main-post-content .drop-case::first-letter{
        font-size: 30px;
    }

    #last-images {
        margin-top: 100px;
        margin-bottom: 100px;
    }
    #last-images .image-box img{
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
</section>
<!-- page header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid">
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
</section>
<!-- Blog video banner ends  -->

<!-- main post area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <h3 id="intro-heading">@if(isset($post['post'])) {{$post['post']->intro_header}} @else
                        Headline 1 @endif</h3>
                <p class="drop-case" id="intro-description">@if(isset($post['post'])) {{$post['post']->intro_description}} @else Lorem
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
                                Point 1 @endif</h5>
                        <p id="pointDescription2">@if(isset($post['post'])) {{$post['post']->point_description_2}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline3">@if(isset($post['post'])) {{$post['post']->point_headline_3}} @else
                                Point 1 @endif</h5>
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
                                Point 1 @endif</h5>
                        <p id="pointDescription4">@if(isset($post['post'])) {{$post['post']->point_description_4}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline5">@if(isset($post['post'])) {{$post['post']->point_headline_5}} @else
                                Point 1 @endif</h5>
                        <p id="pointDescription5">@if(isset($post['post'])) {{$post['post']->point_description_5}} @else
                                Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Illum consequuntur, nobis suscipit at,
                                dicta @endif</p>
                    </li>
                    <li>
                        <h5 id="pointHeadline6">@if(isset($post['post'])) {{$post['post']->point_headline_6}} @else
                                Point 1 @endif</h5>
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
                <h3 id="headline_outro">@if(isset($post['post'])) {{$post['post']->headlines_outro_header}} @else
                        Headlines Outro @endif</h3>
                <p id="headline_outro_description">@if(isset($post['post'])) {{$post['post']->headlines_outro_description}} @else Lorem
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
<!-- main post area ends -->

<section id="last-images">
    <div class="container-fluid">
        <div class="des-thumb">
            @php
                if(isset($post['post'])) $image = $post['post']->getMedia('video');
                $i = 1;
            @endphp
            <div class="row gx-2">
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_1') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="loadimage-1" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_2') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="loadimage-2" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_3') {{$image[$i]->getUrl()}} @php $i++ @endphp @endif" id="loadimage-3" alt="">
                </div>
                <div class="image-box col-lg-3 col-md-3 col-sm-4">
                    <img src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_4') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="loadimage-4" alt="">
                </div>
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

<section id="bottom-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="des-text">
                    <h4 class="text-center" id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else
                            Outro Headlines @endif</h4>
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
        <div class="row my-5">
            <div class="col-lg-12 col-12">
                <div class="blog-post-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}" alt="">
                                </div>
                                <div class="blog-text">
                                    <h4 class="mt-2">Product Name</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, accusantium?</p>
                                    <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to Website
                                        ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
