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
        height: 500px;
    }

    #top-section .video-thumb img {
        width: 100%;
        height: fit-content;
    }

    .page-header {
        background: white;
        position: absolute;
        left: 50%;
        bottom: 0;
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        z-index: 99;
        box-shadow: 0 8px 60px 0 rgb(128 128 0 / 11%), 0 12px 90px 0 rgb(103 151 255 / 11%);
    }

    .page-header .container {
        width: 100% !important;
    }

    #main-post-content h4 span {
        font-size: 25px;
    }
    #main-post-content .v5-post-title{
        position: relative;
        margin: auto;
        width: 60%;
    }
    #main-post-content .v5-post-title h3{
        font-size: 25px;
    }
    #main-post-content .v5-post-title h3::after{
        content: '';
        width: 17px;
        height: 17px;
        background: lightgrey;
        position: absolute;
        left: -1px;
        bottom: 14px;
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

    #last-three-image {
        margin: 130px 0;
    }

    #bottom-part.ads .container{
        padding: 0;
        padding-top: 300px;
        background-image: url("{{asset('backend/assets/images/blog/placeholder.jpg')}}");
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
</style>

<section id="top-section">
    <!-- Blog video banner start -->
    <div class="blog-video-banner">
        <div class="container-fluid p-0">
            <div class="video-position">
                <div class="overlay"></div>
                <div class="video-thumb image-thumb">
                    <img src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="coverImage" alt="">
                </div>
            </div>
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
                <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to your
                    leaving room, here are a few basic tips @endif</h3>
                <span><img class="rounded-circle" src="@if(isset($post['post'])) {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @else {{asset('backend/assets/images/blog/card/01.jpg')}} @endif" width="20px" height="20px">
                {{Auth::user()->name}}</span>
                <span class="ms-4">@if(isset($post['post'])) {{$post['post']->created_at->format('d M Y')}} @else June 8,
                    2021 @endif</span>
                <span class="ms-4"><i class="fa fa-clock me-2"></i>@if(isset($post['post'])) {{$post['post']->created_at->diffForHumans()}} @else
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
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4 id="intro-heading">@if(isset($post['post'])) {{$post['post']->intro_headline}} @else
                                    Intro Headline @endif</h4>
                            <p class="lh-lg" id="intro-description">@if(isset($post['post'])) {{$post['post']->intro_description}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi @endif</p>
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

<!-- Blog main area start -->
<section id="main-post-content">
    <div class="container">
        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">1</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline1">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline1}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description1">@if(isset($post['post'])) {{$post['post']->description}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-one-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">2</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline2">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline2}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description2">@if(isset($post['post'])) {{$post['post']->description}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-two-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">3</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline3">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline3}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-three-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">4</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline4">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline4}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description4">@if(isset($post['post'])) {{$post['post']->description4}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-four-image" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row gx-0">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">5</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline5">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline5}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description5">@if(isset($post['post'])) {{$post['post']->description5}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image5}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-five-image" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="d-inline-block">6</h3>
                            <p class="d-inline-block" style="margin-left: 15px;font-size: 18px" id="headline6">
                                <strong>@if(isset($post['post'])) {{$post['post']->headline6}} @else Ask your question here? @endif</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center" id="description6">@if(isset($post['post'])) {{$post['post']->description6}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                            consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum @endif</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image6}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline-six-image" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<section id="color-palettes" style="margin: 100px 0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 text-center">
                @if(isset($post['colors']))
                    @foreach($post['colors'] as $color)
                        <div class="color-box color-box1 mx-3 d-inline-block">
                            <div class="box rounded"
                                 style="background-color: {{$color}} @if(strtolower($color) == '#fff' OR strtolower($color) == '#ffffff') ;border: 1px solid lightgrey @endif"></div>
                            <p class="text-center mt-1">{{substr($color,1,6)}}</p>
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
    <div class="container" id="productBgImage" @if(isset($post['products'])) style="background-image: url({{asset('upload/blogger_image_post')}}/{{$post['post']->product_background_image}})" @endif>
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

<script>
    @if(isset($post['post']))

    @else
    // JavaScript Form Validation
    function validateForm() {
        let cimage = document.forms["postForm"]["cover_image"].value;
        let aimage1 = document.forms["postForm"]["article_image_1"].value;
        let aimage2 = document.forms["postForm"]["article_image_2"].value;
        let aimage3 = document.forms["postForm"]["article_image_3"].value;
        let aimage4 = document.forms["postForm"]["article_image_4"].value;
        let aimage5 = document.forms["postForm"]["article_image_5"].value;
        let aimage6 = document.forms["postForm"]["article_image_6"].value;
        let aimage7 = document.forms["postForm"]["product_background_image"].value;
        if (cimage == "" || aimage1 == "" || aimage2 == "" || aimage3 == "" || aimage4 == "" || aimage5 == "" || aimage6 == "" || aimage7 == "") {
            alert("All field must be filled out");
            return false;
        }
    }
    @endif
</script>
