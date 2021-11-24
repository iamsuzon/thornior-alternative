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
        height: fit-content;
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

<section id="top-section">
    <!-- Blog video banner start -->
    <div class="blog-video-banner">
        <div class="container">
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
                            <h4 id="headline1">@if(isset($post['post'])) {{$post['post']->headline1}} @else
                                    Headline 1 @endif</h4>
                            <p class="lh-lg" id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupidi @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="row gy-3 two-image">
                        <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                            <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="heading-image1" alt="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 px-1">
                            <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="heading-image2" alt="">
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
                <h3 id="headline2">@if(isset($post['post'])) {{$post['post']->headline2}} @else Headline 2 @endif</h3>
                <p class="mt-2 lh-lg" id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                    suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                    vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                    Eos voluptatum @endif</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 offset-lg-1 offset-md-1">
                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="heading-image3" alt="">
            </div>
        </div>

        <div class="row flex-column-reverse flex-lg-row mt-5">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="heading-image4" alt="">
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 offset-lg-1 offset-md-1 my-5">
                <h3 id="headline3">@if(isset($post['post'])) {{$post['post']->headline3}} @else Headline 3 @endif</h3>
                <p class="mt-2 lh-lg" id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                    suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                    vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                    Eos voluptatum @endif</p>
            </div>
        </div>
    </div>
</section>
<!-- Blog main area ends -->

<section id="last-three-image">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="last_image_one" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="last_image_two" alt="">
            </div>
            <div class="col-lg-4 col-md-4 col">
                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="last_image_three" alt="">
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

<section id="bottom-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="des-text">
                    <h4 class="text-center" id="outro-heading">@if(isset($post['post'])) {{$post['post']->outro_header}} @else
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
                                            <img src="{{asset('upload/blogger_product')}}/{{$product->image}}" alt="">
                                        </div>
                                        <div class="blog-text">
                                            <h4 class="mt-2">{{$product->product_name}}</h4>
                                            <p>{{$product->product_details}}</p>
                                            <a href="{{$product->link}}" target="_blank" class="text-dark fw-bold mt-2" style="font-size: 15px">Link to
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

<script>
    @if(isset($post['post']))

    @else
    // JavaScript Form Validation
    function validateForm() {
        let cimage = document.forms["postForm"]["cover_image"].value;
        let aimage1 = document.forms["postForm"]["main_article_image_1"].value;
        let aimage2 = document.forms["postForm"]["main_article_image_2"].value;
        let aimage3 = document.forms["postForm"]["main_article_image_3"].value;
        let aimage4 = document.forms["postForm"]["main_article_image_4"].value;
        let bimage1 = document.forms["postForm"]["bottom_image_1"].value;
        let bimage2 = document.forms["postForm"]["bottom_image_2"].value;
        let bimage3 = document.forms["postForm"]["bottom_image_3"].value;
        if (cimage == "" || aimage1 == "" || aimage2 == "" || aimage3 == "" || aimage4 == "" || bimage1 == "" || bimage2 == "" || bimage3 == "") {
            alert("All field must be filled out");
            return false;
        }
    }
    @endif
</script>
