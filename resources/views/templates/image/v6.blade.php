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
        box-sizing: border-box;
        overflow: hidden;
        height: 500px;
        border-radius: 5px;
    }
    .blog-video-banner .image-thumb img {
        width: 100%;
        height: auto;
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
    #main-post-content .v5-post-title p{
        display: inline;
    }
    #main-post-content .v5-post-title h3{
        font-size: 25px;
        display: inline;
        position: relative;
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

<!-- header area start -->
<header>
    <div class="header-main">
        <div class="header-item style-one">
            <div class="header-top">
                <div class="container">
                    <div class="top-item">
                        <div class="top-search">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="top-logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="Thornior Logo">
                            </a>
                        </div>
                        <div class="top-menu">
                            <ul class="top-list">
                                <li class="d-none d-md-block">
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option selected="">EN</option>
                                        <option value="1">BN</option>
                                        <option value="2">SP</option>
                                        <option value="3">TR</option>
                                    </select>
                                </li>
                                <li>
                                    <a href="#0" class="d-none d-sm-block">Login</a>
                                    <a href="#0" class="d-sm-none"><i class="fa fa-user-circle"></i></a>
                                </li>
                                <li class="">
                                    <button type="button"><i class="fa fa-shopping-cart"></i></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="bottom-inner">
                        <div class="header-logo d-lg-none">
                            <a href="{{route('index')}}">
                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="Thornior Logo">
                            </a>
                        </div>
                        <div class="main-menu">
                            <div class="crose-menu">
                                <i class="crose-bar fa fa-times-circle"></i>
                            </div>
                            <ul class="menu-list">
                                <li class="active"><a href="#0">Home</a></li>
                                <li>
                                    <a href="#0">Categories</a>
                                </li>
                                <li><a href="#0">Creators</a></li>
                                <li>
                                    <a href="#0">Shop</a>
                                </li>
                                <li><a href="#0">Brands</a></li>
                                <li><a href="#0">About</a></li>
                            </ul>
                        </div>
                        <div class="mobile-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area ends  -->

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid">
        <div class="row gx-2">
            <div class="col-4">
                <div class="video-position">
                    <div class="video-thumb image-thumb">
                        <img src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="video-position">
                    <div class="video-thumb image-thumb">
                        <img src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage2}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="video-position">
                    <div class="video-thumb image-thumb">
                        <img src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage3}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog video banner ends  -->

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
            <h3>{{$post['post']->title}}</h3>
            <span><img class="rounded-circle" src="{{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}}" width="20px" height="20px">{{$post['post']->blogger->name}}</span>
            <span class="ms-4">{{$post['post']->created_at->format('M d, Y')}}</span>
            <span class="ms-4"><i class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- common blog area start -->
<section class="blog-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4>{{$post['post']->intro_headline}}</h4>
                            <p class="lh-lg">{{$post['post']->intro_description_0}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="blog-description my-2">
                        <div class="des-text">
                            <h4><span> </span></h4>
                            <p class="lh-lg">{{$post['post']->intro_description_1}}</p>
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
                            <h3 class="">1</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline1}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description1}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">2</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline2}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description2}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}}" alt="">
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
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline3}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description3}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">4</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline4}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description4}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}}" alt="">
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
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline5}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description5}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image5}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 offset-lg-2 offset-lg-2 col-sm-12 col-space">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="v5-post-title">
                            <h3 class="">6</h3>
                            <p class="" style="margin-left: 15px;font-size: 18px">
                                <strong>{{$post['post']->headline6}}</strong>
                            </p>
                        </div>
                        <p class="mt-2 lh-lg text-center">{{$post['post']->description6}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-inner-space">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image6}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<section id="comment-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="social-interaction mt-5">
                    <ul class="media-list list-unstyled d-flex justify-content-center">
                        <li>
                            <a href="#">
                                <i class="far fa-heart"></i>
                                <span>Like</span>
                            </a>
                        </li>
                        <!--                    <span><i class="fas fa-heart"></i>Like</span>-->
                        <li>
                            <a href="#">
                                <i class="far fa-bookmark"></i>
                                <span>Save</span>
                            </a>
                        </li>
                        <!--                    <span><i class="fas fa-bookmark"></i>Like</span>-->
                        <li>
                            <a href="">
                                <i class="far fa-share-square"></i>
                                <span>Share</span>
                            </a>
                        </li>
                    </ul>

                    <hr>

                    <div class="comments mt-5">
                        <div class="comment-1">
                            <div class="comment-image">
                                <img class="rounded-circle" src="../assets/images/blog/card/01.jpg" alt="" width="45px"
                                     height="45px">
                            </div>
                            <div class="comment-text">
                                <p class="m-0"><strong>Shayna Awnick</strong></p>
                                <p style="color: darkgrey">June 1, 2021</p>
                                <p>Loved it! How you you did this?</p>
                            </div>
                        </div>
                        <div class="comment-2">
                            <div class="comment-image">
                                <img class="rounded-circle" src="../assets/images/blog/card/01.jpg" alt="" width="45px"
                                     height="45px">
                            </div>
                            <div class="comment-text">
                                <p class="m-0"><strong>Ryna Monica</strong></p>
                                <p style="color: darkgrey">May 26, 2021</p>
                                <p>Amazing design! I always wanted to create like this for my own.</p>
                            </div>
                        </div>
                    </div>

                    <div class="comment-field">
                        <h4>Leave a comment</h4>
                        <form action="">
                            <textarea class="form-control" name="" id="" cols="30" rows="8"
                                      placeholder="Write a comment here...."></textarea>
                            <div class="text-center mt-3">
                                <button class="btn btn-danger rounded-0">Post Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- related blog slider start -->
<section class="latest-blog">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header">
                <h4>Related Post</h4>
            </div>
            <div class="latest-blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/01.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item style-one">
                            <div class="item-thumb">
                                <img src="../assets/images/blog/latest/02.jpg" alt="">
                                <div class="video-btn">
                                    <a href="#0">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span>Diy</span>
                                </div>
                                <h5>7 Fun home projects to do this summer</h5>
                            </div>
                            <div class="blog-timeline">
                                <div class="bloger-thumb">
                                    <img src="../assets/images/blog/latest/01.png" alt="">
                                </div>
                                <div class="time-line">
                                    <span class="border-end pe-2">Mox</span>
                                    <span>5 Days ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add progressbar -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- related blog slider ends  -->

<!-- footer area star -->
<footer class="border-top pt-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
            <div class="footer-menu">
                <ul class="menulist list-unstyled d-flex align-items-center p-0 m-0">
                    <li class="me-3"><a href="#0">Home</a></li>
                    <li class="me-3"><a href="#0">About</a></li>
                    <li class="me-3"><a href="#0">Creators</a></li>
                    <li><a href="#0">Contact</a></li>
                </ul>
            </div>
            <div class="social-link pt-3 pt-md-0">
                <ul class="media-list list-unstyled d-flex p-0 m-0">
                    <li class="me-3"><span>Follow us :</span></li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-pinterest-p"></i>
                        <span>Pinterest</span>
                    </li>
                    <li class="d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-instagram"></i>
                        <span>Instagram</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5">
        <div class="bottom-content bg-dark text-center pt-3 pb-3">
            <p class="m-0 text-white">&copy; Designed By <a href="#0" class="text-white font-bold">Thornior</a></p>
        </div>
    </div>
</footer>
