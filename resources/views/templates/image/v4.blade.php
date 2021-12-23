<style>
    @media screen and (min-width: 1200px) {
        .container{
            width: 960px !important;
        }
    }
    h3{
        font-size: 25px;
    }
    #top-section{
        position: relative;
        padding-bottom: 100px;
    }
    #top-section .video-thumb{
        box-sizing: border-box;
        overflow: hidden;
        height: 350px;
    }
    #top-section .video-thumb img{
        width: 100%;
        height: auto;
    }
    .page-header{
        background: white;
        position: absolute;
        left: 50%;
        bottom: 0;
        -ms-transform: translate(-50%, 0);
        transform: translate(-50%, 0);
        z-index: 999;
        box-shadow: 0 8px 60px 0 rgb(128 128 0 / 11%), 0 12px 90px 0 rgb(103 151 255 / 11%);
    }
    .page-header .container{
        width: 100% !important;
    }
    #main-post-content h4 span{
        font-size: 25px;
    }
    .blog-area{
        margin-top: 150px;
        margin-bottom: 50px;
    }
    #last-three-image{
        margin: 130px 0;
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
        #top-section{
            position: relative;
            padding-bottom: 100px;
        }
        #top-section .video-thumb{
            height: auto;
        }
        #top-section .video-thumb img{
            width: 100%;
            height: auto;
        }
        .page-header{
            width: 80%;
            background: white;
            position: absolute;
            left: 50%;
            bottom: 0;
            -ms-transform: translate(-50%, 0);
            transform: translate(-50%, 0);
        }
        .page-header h3{
            font-size: 20px;
        }
        #main-post-content h3,h4,p{
            text-align: center;
        }
        #last-three-image .col{
            width: 33.33%;
            padding: 0;
        }
        #last-three-image .col img{
            border-radius: 0 !important;
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
        #comment-box .comments .comment-text p{
            text-align: left;
        }
    }
</style>

<!-- header area start -->

<!-- header area ends  -->

@php $index=0; @endphp

<section id="top-section">
    <!-- Blog video banner start -->
    <div class="blog-video-banner">
        <div class="container">
            <div class="video-position">
                <div class="overlay"></div>
                <div class="video-thumb image-thumb">
                    <img src="{{asset($post['post']->medias[$index]->address)}}
                         @php $index++ @endphp"
                         alt="">
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
                <h3>{{$post['post']->title}}</h3>
                <span><img class="rounded-circle" src="{{asset('upload/blogger/avatar')}}/{{$post['post']->blogger->image}}" width="20px" height="20px">
                {{$post['post']->blogger->name}}</span>
                <span class="ms-4">{{$post['post']->created_at->format('d M Y')}}</span>
                <span class="ms-4"><i class="fa fa-clock me-2"></i>{{$post['post']->created_at->diffForHumans()}}</span>
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
                            <h4>{{$post['post']->headline1}}</h4>
                            <p class="lh-lg">{{$post['post']->description1}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                            <img class="rounded" src="
                            @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '1')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                            <img class="rounded" src="
                            @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '2')
                            {{asset($post['post']->medias[$index]->address)}}
                            @php $index++ @endphp
                            @endif" alt="">
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
            <div class="col-lg-7 col-md-7 col-sm-12 my-5">
                <h3>{{$post['post']->headline2}}</h3>
                <p class="mt-2 lh-lg">{{$post['post']->description2}}</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-1 offset-md-1">
                <img class="rounded" src="
                @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '3')
                {{asset($post['post']->medias[$index]->address)}}
                @php $index++ @endphp
                @endif" alt="">
            </div>
        </div>

        <div class="row flex-column-reverse flex-lg-row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img class="rounded" src="
                @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '4')
                {{asset($post['post']->medias[$index]->address)}}
                @php $index++ @endphp
                @endif" alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 offset-lg-1 offset-md-1 my-5">
                <h3>{{$post['post']->headline3}}</h3>
                <p class="mt-2 lh-lg">{{$post['post']->description3}}</p>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<section id="last-three-image">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="
                @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '5')
                {{asset($post['post']->medias[$index]->address)}}
                @php $index++ @endphp
                @endif" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="
                @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '6')
                {{asset($post['post']->medias[$index]->address)}}
                @php $index++ @endphp
                @endif" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="
                @if(isset($post['post']->medias[$index]) AND $post['post']->medias[$index]->number == '7')
                {{asset($post['post']->medias[$index]->address)}}
                @php $index++ @endphp
                @endif" alt="">
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
<!-- footer area ends -->
