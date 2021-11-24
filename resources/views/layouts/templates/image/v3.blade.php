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

<!-- Blog video banner start -->
<section class="blog-video-banner">
    <div class="container-fluid p-0">
        <div class="video-position">
            <div class="overlay"></div>
            <div class="video-thumb image-thumb">
                <img src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="coverImage" alt="">
                <div class="video-icon title-in-middle">
                    <div class="header-content text-center p-4 pb-5">
                        <div class="blog-cat" style="padding: 12px 0 10px">
                            <span style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">Diy</span>
                        </div>
                        <h3 id="post-title">@if(isset($post['post'])) {{$post['post']->title}} @else Create New inspiration to your
                            leaving room, here are a few basic tips @endif</h3>
                        <span><img class="rounded-circle" src="@if(isset($post['post'])) {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @else {{asset('backend/assets/images/blog/card/01.jpg')}} @endif"
                                   style="width:20px; height:20px">{{Auth::user()->name}}</span>
                        <span class="ms-4">@if(isset($post['post'])) {{$post['post']->created_at->format('d M Y')}} @else June 8,
                            2021 @endif</span>
                        <span class="ms-4"><i class="fa fa-clock me-2"></i>@if(isset($post['post'])) {{$post['post']->created_at->diffForHumans()}} @else
                                11 Min @endif</span>
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
                            <h3 class="text-start" id="first_headline">@if(isset($post['post'])) {{$post['post']->top_header}} @else
                                    Intro Heading @endif</h3>
                            <p class="text-start lh-lg" id="first_description" >@if(isset($post['post'])) {{$post['post']->top_description}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum
                                consequuntur, nobis
                                suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                                vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                                Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil rerum
                                hic nesciunt. Qui, harum eos. @endif</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 md-col-6 col-sm-12 offset-lg-1 offset-md-1">
                    <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="headline_Image" alt="">
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
                    <h4 class="text-center" id="headline1">
                        <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline1}} @else Living Room @endif</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center" id="description1">@if(isset($post['post'])) {{$post['post']->description1}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur,
                        nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                        Eos voluptatum @endif</p>
                </div>

                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="article-one-image" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="post-content my-5 mx-lg-5 mx-md-5 mx-sm-0">
                    <h3 class="text-center">02</h3>
                    <h4 class="text-center" id="headline2">
                        <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline2}} @else Living Room @endif</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center" id="description2">@if(isset($post['post'])) {{$post['post']->description2}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur,
                        nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                        Eos voluptatum @endif</p>
                </div>

                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="article-two-image" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="post-content my-5 mx-lg-5 mx-md-5 mx-sm-0">
                    <h3 class="text-center">03</h3>
                    <h4 class="text-center" id="headline3">
                        <span style="color: darkgrey">@if(isset($post['post'])) {{$post['post']->headline3}} @else Living Room @endif</span>
{{--                        <span>Room</span>--}}
                    </h4>
                    <p class="mt-2 lh-lg text-center" id="description3">@if(isset($post['post'])) {{$post['post']->description3}} @else Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur,
                        nobis
                        suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                        vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                        Eos voluptatum @endif</p>
                </div>

                <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="article-three-image" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="des-text my-5">
                    <h3 class="text-center" id="second_headline">@if(isset($post['post'])) {{$post['post']->bottom_header}} @else
                            Headline @endif</h3>
                    <p class="text-center lh-lg" id="second_description">@if(isset($post['post'])) {{$post['post']->bottom_description}} @else
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum consequuntur, nobis
                            suscipit at, dicta dolor minima eligendi recusandae magnam, ullam voluptatem dignissimos
                            vero deleniti tempore voluptate expedita architecto nesciunt amet debitis optio eveniet?
                            Eos voluptatum cupiditate laboriosam. Non illo dolorem aut, quisquam aliquam nihil rerum
                            hic nesciunt. Qui, harum eos. @endif</p>
                </div>

                <!-- max-width: 550px; min-height: 310px; -->
                <div class="row v3-last-two-image">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image1}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="last-one-image" alt="">
                    </div>
                    <div class="last-col col-lg-6 col-md-6 col-sm-12">
                        <img class="rounded" src="@if(isset($post['post'])) {{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image2}} @else {{asset('backend/assets/images/blog/placeholder.jpg')}} @endif" id="last-two-image" alt="">
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
        let himage = document.forms["postForm"]["headline_image"].value;
        let aimage1 = document.forms["postForm"]["main_article_image_1"].value;
        let aimage2 = document.forms["postForm"]["main_article_image_2"].value;
        let aimage3 = document.forms["postForm"]["main_article_image_3"].value;
        let bimage1 = document.forms["postForm"]["bottom_image_1"].value;
        let bimage2 = document.forms["postForm"]["bottom_image_2"].value;
        if (cimage == "" || himage == "" || aimage1 == "" || aimage2 == "" || aimage3 == "" || bimage1 == "" || bimage2 == "") {
            alert("All field must be filled out");
            return false;
        }
    }
    @endif
</script>
