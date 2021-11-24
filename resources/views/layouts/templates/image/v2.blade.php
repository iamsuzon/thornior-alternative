<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    #main-post-content h4 span {
        font-size: 25px;
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
            <span><img class="rounded-circle"
                       src="@if(isset($post['post'])) {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @else {{asset('backend/assets/images/blog/card/01.jpg')}} @endif"
                       width="20px" height="20px">{{Auth::user()->name}}</span>
            <span class="ms-4">@if(isset($post['post'])) {{$post['post']->created_at->format('d M Y')}} @else June 8,
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
        <div class="video-position">
            <div class="overlay"></div>
            <div class="video-thumb image-thumb">
                <img
                    src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                    id="coverImage" alt="">
            </div>
        </div>
    </div>
</section>
<!-- Blog video banner ends  -->

<!-- common blog area start -->
<section class="blog-area pt-5">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="blog-description my-5">
                        <div class="des-text my-5">
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
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <h3>01</h3>
                <h4 id="headline1">
                    <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline1}} @else
                            Living Room @endif</span>
                    <!--                                                        <span>Room</span>-->
                </h4>
                <p class="mt-2 lh-lg" id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt
                        amet debitis optio eveniet?
                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                        quisquam aliquam nihil rerum
                        hic nesciunt. Qui, harum eos. @endif</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-1 offset-md-1">
                <img class="rounded"
                     src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                     id="article-one-image" alt="">
            </div>
        </div>

        <div class="row flex-column-reverse flex-lg-row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img class="rounded" src="{{asset('backend/assets/images/blog/examp/01.jpg')}}" id="article-two-image"
                     alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 offset-lg-1 offset-md-1">
                <h3>02</h3>
                <h4 id="headline2">
                    <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline2}} @else
                            Living Room @endif</span>
                    <!--                                                        <span>Room</span>-->
                </h4>
                <p class="mt-2 lh-lg" id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt
                        amet debitis optio eveniet?
                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                        quisquam aliquam nihil rerum
                        hic nesciunt. Qui, harum eos. @endif</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <h3>03</h3>
                <h4 id="headline3">
                    <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline3}} @else
                            Living Room @endif</span>
                    <!--                                                        <span>Room</span>-->
                </h4>
                <p class="mt-2 lh-lg" id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt
                        amet debitis optio eveniet?
                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                        quisquam aliquam nihil rerum
                        hic nesciunt. Qui, harum eos. @endif</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-1 offset-md-1">
                <img class="rounded" src="{{asset('backend/assets/images/blog/examp/01.jpg')}}" id="article-three-image"
                     alt="">
            </div>
        </div>

        <div class="row flex-column-reverse flex-lg-row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img class="rounded" src="{{asset('backend/assets/images/blog/examp/01.jpg')}}" id="article-four-image"
                     alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 offset-lg-1 offset-md-1">
                <h3>04</h3>
                <h4 id="headline4">
                    <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline4}} @else
                            Living Room @endif</span>
                    <!--                                                        <span>Room</span>-->
                </h4>
                <p class="mt-2 lh-lg" id="description4">@if(isset($post['post'])) {{$post['post']->description4}} @else
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt
                        amet debitis optio eveniet?
                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                        quisquam aliquam nihil rerum
                        hic nesciunt. Qui, harum eos. @endif</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-7 col-md-7 col-sm-12">
                <h3>05</h3>
                <h4 id="headline5">
                    <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline5}} @else
                            Living Room @endif</span>
                    <!--                                                        <span>Room</span>-->
                </h4>
                <p class="mt-2 lh-lg" id="description5">@if(isset($post['post'])) {{$post['post']->description5}} @else
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                        consequuntur, nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                        ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt
                        amet debitis optio eveniet?
                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                        quisquam aliquam nihil rerum
                        hic nesciunt. Qui, harum eos. @endif</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-1 offset-md-1">
                <img class="rounded" src="{{asset('backend/assets/images/blog/examp/01.jpg')}}" id="article-five-image"
                     alt="">
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<!-- second headline start -->
<section class="second-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="des-text my-5">
                    <h4 class="text-center"
                        id="second_headline">@if(isset($post['post'])) {{$post['post']->bottom_header}} @else
                            Headline @endif</h4>
                    <p id="second_description">@if(isset($post['post'])) {{$post['post']->bottom_description}} @else
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil rerum
                            hic nesciunt. Qui, harum eos. @endif</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row p-0">
            <img class="p-0"
                 src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
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
                    <h4 class="text-center"
                        id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else
                            Outro Heading @endif</h4>
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
                        @if(isset($post['products']))
                            @forelse($post['products'] as $product)
                                <div class="swiper-slide">
                                    <div class="blog-item style-one">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/02.jpg')}}" alt="">
                                        </div>
                                        <div class="blog-text">
                                            <h4 class="mt-2">Product Name</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum,
                                                accusantium?</p>
                                            <a href="#0" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to
                                                Website
                                                ></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="alert alert-warning w-100 text-center">No Product Added Yet</div>
                            @endforelse
                        @else
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
