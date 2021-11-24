<style>
    @media screen and (min-width: 1200px) {
        .container{
            width: 960px !important;
        }
    }
    .title-in-middle {
        background-color: white;
    }

    .v3 {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 0;
        -ms-transform: translate(-50%, -50%);
        transform: translate(0, -50%);
    }

    #main-post-content h4 span {
        font-size: 25px;
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
        .title-in-middle {
            width: 80%;
            padding: 10px !important;
        }

        .title-in-middle .header-content {
            padding: 0 !important;
        }

        .title-in-middle h3 {
            font-size: 20px;
        }

        .image-thumb .page-header h3 {
            font-size: 20px;
        }

        #main-post-content h3, h4, p {
            text-align: center;
        }

        #color-palettes .color-box {
            width: 100px;
        }

        .v3 h3, .v3 p {
            text-align: center !important;
        }

        .last-col{
            margin-top: 20px;
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
        #comment-box .comments .comment-text p{
            text-align: left;
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
                            <a href="../index.html">
                                <img src="../assets/images/logo/01.png" alt="Thornior Logo">
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
                            <a href="../index.html">
                                <img src="../assets/images/logo/01.png" alt="Thornior Logo">
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
    <div class="container-fluid p-0">
        <div class="video-position">
            <div class="overlay"></div>
            <div class="video-thumb image-thumb">
                <img src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}}" alt="">
                <div class="video-icon title-in-middle">
                    <div class="header-content text-center p-4 pb-5">
                        <div class="blog-cat" style="padding: 12px 0 10px">
                            <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
                        </div>
                        <h3>Create New inspiration to your leaving room, here are a few basic tips</h3>
                        <span><img class="rounded-circle" src="{{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}}"
                                   style="width:20px; height:20px">{{$post['post']->blogger->name}}</span>
                        <span class="ms-4">{{$post['post']->created_at->format('M d, Y')}}</span>
                        <span class="ms-4"><i class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
                    </div>
                </div>
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
                <div class="col-lg-5 col-md-5 col-sm-12" style="position: relative">
                    <div class="blog-description v3">
                        <div class="des-text">
                            <h3 class="text-start">{{$post['post']->top_header}}</h3>
                            <p class="text-start lh-lg">{{$post['post']->top_description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 md-col-6 col-sm-12 offset-lg-1 offset-md-1">
                    <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}}" alt="">
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
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="post-content my-5 mx-lg-5 mx-md-5 mx-sm-0">
                    <h3 class="text-center">01</h3>
                    <h4 class="text-center">
                        <span style="color: darkgrey">{{$post['post']->headline1}}</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center">{{$post['post']->description1}}</p>
                </div>

                <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="post-content my-5 mx-lg-5 mx-md-5 mx-sm-0">
                    <h3 class="text-center">02</h3>
                    <h4 class="text-center">
                        <span style="color: darkgrey">{{$post['post']->headline2}}</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center">{{$post['post']->description2}}</p>
                </div>

                <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="post-content my-5 mx-lg-5 mx-md-5 mx-sm-0">
                    <h3 class="text-center">03</h3>
                    <h4 class="text-center">
                        <span style="color: darkgrey">{{$post['post']->headline3}}</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center">{{$post['post']->description3}}</p>
                </div>

                <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}}" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="des-text my-5">
                    <h3 class="text-center">{{$post['post']->bottom_header}}</h3>
                    <p class="text-center lh-lg">{{$post['post']->bottom_description}}</p>
                </div>

                <!-- max-width: 550px; min-height: 310px; -->
                <div class="row v3-last-two-image">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image1}}" alt="">
                    </div>
                    <div class="last-col col-lg-6 col-md-6 col-sm-12">
                        <img class="rounded" src="{{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image2}}" alt="">
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
                    <h4 class="text-center">{{$post['post']->outro_header}}</h4>
                    <p>{{$post['post']->outro_description}}</p>
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
