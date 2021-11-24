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
                <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
            </div>
            <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to your
                leaving room, here are a few basic tips @endif</h3>
            <span><img class="rounded-circle" src="{{asset('backend/assets/images/blog/card/01.jpg')}}" width="20px"
                       height="20px"> @if(isset($post['post'])) {{$post['post']->blogger->name}} @else Anna
                Laming @endif</span>
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
    <div class="container">
        @if(isset($post['post'])))
        <video width="100%" height="240" controlsList="nodownload" controls>
            <source src="{{asset('upload/blogger_video_post')}}/{{$post['post']->blogger->id}}/{{$post['post']->video}}"
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

<!-- common blog area start -->
<section class="blog-area pt-5">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-3">
                        <div class="des-text my-3">
                            <h4 class="text-center"
                                id="intro-heading">@if(isset($post['post'])) {{$post['post']->intro_header}} @else
                                    Intro Heading @endif</h4>
                            <p id="intro-description">@if(isset($post['post'])) {{$post['post']->intro_description}} @else
                                    Lorem ipsum dolor,
                                    sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                                    suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem
                                    dignissimos
                                    vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio
                                    eveniet?
                                    Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil
                                    rerum
                                    hic nesciunt. Qui, harum eos. @endif</p>
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
        <div class="row gx-lg-5 gx-md-5 gx-sm-0 ">
            <div class="col-lg-4 col-md-4 col-sm-12 mt-5">
                <div class="post-box">
                    <div class="number">
                        <h3>1</h3>
                    </div>
                    <div class="image-box">
                        @php
                            if(isset($post['post'])) $image = $post['post']->getMedia('video');
                            $i = 1;
                        @endphp
                        <img
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_1') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/01.jpg')}} @endif"
                            id="article-one-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline1">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline1}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_2') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                            id="article-two-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline2">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline2}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_3') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/03.jpg')}} @endif"
                            id="article-three-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline3">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline3}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_4') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/03.jpg')}} @endif"
                            id="article-four-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline4">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline4}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description4">@if(isset($post['post'])) {{$post['post']->description4}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_5') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/01.jpg')}} @endif"
                            id="article-five-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline5">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline5}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description5">@if(isset($post['post'])) {{$post['post']->description5}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                            src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_6') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/latest/02.jpg')}} @endif"
                            id="article-six-image" alt="">
                    </div>
                    <div class="text-box mt-4">
                        <h4 class="text-center" id="headline6">
                            @if(isset($post['post']))
                                <span style="color: darkgrey">{{$post['post']->headline6}}</span>
                            @else
                                <span style="color: darkgrey">Living</span>
                                <span>Room</span>
                            @endif
                        </h4>
                        <p class="mt-2" id="description6">@if(isset($post['post'])) {{$post['post']->description6}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                            Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam @endif</p>
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
                 src="@if(isset($image[$i]) AND $image[$i]->getCustomProperty('name') == 'image_7') {{$image[$i]->getUrl()}} @php $i++ @endphp @else {{asset('backend/assets/images/blog/examp/01.jpg')}} @endif"
                 id="imageOutro" alt="">
        </div>
    </div>
</section>
<!-- second headline ends -->

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
                        <p class="text-center mt-1">1DBF73</p>
                    </div>
                    <div class="color-box color-box2 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: blue"></div>
                        <p class="text-center mt-1">1DBF73</p>
                    </div>
                    <div class="color-box color-box3 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: greenyellow"></div>
                        <p class="text-center mt-1">1DBF73</p>
                    </div>
                    <div class="color-box color-box4 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: orangered"></div>
                        <p class="text-center mt-1">1DBF73</p>
                    </div>
                    <div class="color-box color-box5 mx-3 d-inline-block">
                        <div class="box rounded" style="background-color: rebeccapurple"></div>
                        <p class="text-center mt-1">1DBF73</p>
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
                    <h4 class="text-center" id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else Outro
                        Headline @endif</h4>
                    <p id="outro-description">@if(isset($post['post'])) {{$post['post']->outro_description}} @else
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil rerum
                            hic nesciunt. Qui, harum eos. @endif</p>
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
                                    <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
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
                                    <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
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
                                    <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
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
                                    <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
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
                                    <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
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
                                    <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">
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
