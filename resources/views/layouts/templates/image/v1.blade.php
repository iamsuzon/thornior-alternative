<style>
    @media screen and (min-width: 1200px) {
        .container {
            width: 960px !important;
        }
    }

    .image-thumb > img {
        height: 700px;
    }

    .des-tips img {
        width: 400px;
        height: auto;
    }

    #last-images img {
        width: 100%;
        height: auto;
    }

    #last-images {
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
            margin-top: 0px;
            margin-bottom: 30px;
        }

        #last-images .image-box {
            width: 33.3333% !important;
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
<section class="page-header" style="padding-top: 50px">
    <div class="container">
        <div class="header-content">
            <div class="blog-cat" style="padding: 12px 0 10px">
                <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
            </div>
            <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to your
                leaving room, here are a few basic tips @endif</h3>
            <span><img class="rounded-circle" src="{{asset('backend/assets/images/blog/card/01.jpg')}}" width="20px"
                       height="20px">{{Auth::user()->name}}</span>
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
    <div class="container-fluid p-0">
        <div class="video-position">
            <div class="overlay"></div>
            <div class="video-thumb image-thumb">
                <img
                    src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                    alt="" id="coverImage">
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
                            <h4 id="intro-heading"
                                class="text-center">@if(isset($post['post'])) {{$post['post']->intro_header}} @else
                                    Intro Heading @endif</h4>
                            <p id="intro-description">
                                @if(isset($post['post'])) {{$post['post']->intro_description}} @else Lorem ipsum dolor,
                                sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil rerum
                                hic nesciunt. Qui, harum eos. @endif</p>
                        </div>
                        <div class="des-tips">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img id="long-image" class="rounded"
                                         src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                                         alt="">
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 offset-lg-1 offset-md-1">
                                    <div class="list my-3">
                                        <div class="list-1">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">1</h3>
                                                </span>
                                                <h5 id="headline1">@if(isset($post['post'])) {{$post['post']->headline1}} @else
                                                        Headline 1 @endif</h5>
                                                <p id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                                        consequuntur, nobis
                                                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                                                        ullam voluptatem dignissimos
                                                        vero deleniti tempore voluptate expedita architecto nesciunt
                                                        amet debitis optio eveniet?
                                                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                                                        quisquam aliquam nihil rerum
                                                        hic nesciunt. Qui, harum eos. @endif</p>
                                            </span>
                                        </div>
                                        <div class="list-2 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">2</h3>
                                                </span>
                                                <h5 id="headline2">@if(isset($post['post'])) {{$post['post']->headline2}} @else
                                                        Headline 2 @endif</h5>
                                                <p id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                                        consequuntur, nobis
                                                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                                                        ullam voluptatem dignissimos
                                                        vero deleniti tempore voluptate expedita architecto nesciunt
                                                        amet debitis optio eveniet?
                                                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                                                        quisquam aliquam nihil rerum
                                                        hic nesciunt. Qui, harum eos. @endif</p>
                                            </span>
                                        </div>
                                        <div class="list-3 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">3</h3>
                                                </span>
                                                <h5 id="headline3">@if(isset($post['post'])) {{$post['post']->headline3}} @else
                                                        Headline 3 @endif</h5>
                                                <p id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                                        consequuntur, nobis
                                                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                                                        ullam voluptatem dignissimos
                                                        vero deleniti tempore voluptate expedita architecto nesciunt
                                                        amet debitis optio eveniet?
                                                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                                                        quisquam aliquam nihil rerum
                                                        hic nesciunt. Qui, harum eos. @endif</p>
                                            </span>
                                        </div>
                                        <div class="list-4 mt-4">
                                            <span class="list-span-1" style="position: relative">
                                                <span class="list-span-2"
                                                      style="position: absolute;left: -70px;bottom: -45px">
                                                    <h3 style="background-color: beige;padding:0 15px;border-radius: 50%">4</h3>
                                                </span>
                                                <h5 id="headline4">@if(isset($post['post'])) {{$post['post']->headline4}} @else
                                                        Headline 4 @endif</h5>
                                                <p id="description4">@if(isset($post['post'])) {{$post['post']->description4}} @else
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                                        consequuntur, nobis
                                                        suscipit at, dicta dolor minima eligendi recusandae magnam,
                                                        ullam voluptatem dignissimos
                                                        vero deleniti tempore voluptate expedita architecto nesciunt
                                                        amet debitis optio eveniet?
                                                        Eos voluptatum cupiditate laboriosam. Non illo dolorem aut,
                                                        quisquam aliquam nihil rerum
                                                        hic nesciunt. Qui, harum eos. @endif</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- common blog area ends  -->


<section id="last-images">
    <div class="container">
        <div class="des-thumb">
            <div class="row">
                <div class="image-box col-lg-4 col-md-4 col-sm-4 p-0">
                    <img id="loadimage-1"
                         src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                         alt="">
                </div>
                <div class="image-box col-lg-4 col-md-4 col-sm-4 p-0">
                    <img id="loadimage-2"
                         src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                         alt="">
                </div>
                <div class="image-box col-lg-4 col-md-4 col-sm-4 p-0">
                    <img id="loadimage-3"
                         src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif"
                         alt="">
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
                    <h4 id="outro-heading"
                        class="text-center">@if(isset($post['post'])) {{$post['post']->outro_header}} @else Outro
                        Headline @endif</h4>
                    <p id="outro-description">
                        @if(isset($post['post'])) {{$post['post']->outro_description}} @else
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
                    <div class="swiper-wrapper" id="swiper-wrapper">
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
