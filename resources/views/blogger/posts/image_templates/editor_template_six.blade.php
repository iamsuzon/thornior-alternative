<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.all_styles')
    <title>Thornior</title>
</head>
<body>
<style>
    .post-left-nav-button a:hover, .post-right-nav-button a:hover {
        background-color: #E2DED1;
    }

    .post-image {
        position: relative;
    }

    .post-image i {
        font-size: 25px;
        background: #000;
        color: #fff;
        padding: 15px;
        border-radius: 50%;
    }

    .post-image .image-label label {
        position: absolute;
        right: 5%;
        bottom: -10%;
    }


    /* add products */
    #add_products_section {
        margin-top: 10px;
    }

    #add_products_section .product {
        margin-top: 20px;
        border: 1px solid #5c636a;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }

    #add_products_section .product img {
        width: 50px;
        height: 50px;
        float: left;
    }

    #add_products_section .product .product_texts {
        margin-left: 10px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    #add_products_section .product .product_texts h5 {
        margin: 0;
        font-size: 12px;
    }

    #add_products_section .product .product_texts p {
        margin: 0;
        font-size: 12px;
    }

    #add_products_section .product .product_texts a {
        font-size: 12px;
    }

    #add_products_section .product .cross {
        display: inline-block;
        float: right;
    }

    #add_products_section .product .cross i {
        font-size: 30px;
        color: #fff;
        background-color: #5c636a;
        padding: 10px;
        position: absolute;
        right: 0;
        bottom: 0;
    }

    #add_products_section .product .cross i:hover {
        background-color: #000;
    }

    .blog-item .item-thumb img {
        width: 200px !important;
    }
</style>

<div class="main-content">
    <!-- content-right start -->
    <div class="content-right" id="contentWidth" style="margin-left: 0">

        <!-- top navbar start -->
        @include('layouts.logged_in_navbar')
        <!-- top navbar ends  -->

        <!-- second navbar start -->
        <form action="{{route('blogger.blog.post.image.store.6')}}" method="POST"
              enctype="multipart/form-data" name="postForm" onsubmit="return validateForm()">
            @csrf
            <div class="top-navbar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="post-left-nav-button d-inline-block float-start" style="margin-left: 20px">
                                <a class="btn p-3" href="#" style="background-color: #fff">Save in Library</a>
                            </div>
                            <div class="post-right-nav-button d-inline-block float-end" style="margin-right: 20px">
                                <button type="submit" value="0" name="post_status" class="btn p-3" style="background-color: #fff">Preview</button>
                                <button type="submit" value="1" name="post_status" class="btn p-3" style="margin-left: 10px;background-color: #fff">
                                    Publish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- second navbar ends  -->

            <!-- Edit area start -->
            <div class="edit-area">
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <!-- Left Template Side Column Start -->
                                <div class="col-12">

                                    <!-- Left Template Side Start -->
                                    @include('layouts.templates.image.v6')
                                    <!-- Left Template Side End -->

                                </div>
                                <!-- Left Template Side Column Ends -->
                            </div>
                        </div>

                        <!-- Right Editor Side Start -->
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <!--Featured image Section-->
                            <div class="card">
                                <div class="card-header bg-white">Cover Image</div>
                                <div class="card-body">
                                    <!--Featured image 1-->
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="cover_image" id="cover-image-input1"
                                                  onchange="featuredImage1(event)" style="display: none;"></p>
                                        <p id="cover-image-label1" class="text-center image-label"><label for="cover-image-input1"
                                                                                                          style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box1" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="cover-image-file1"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image1" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage1(event)">Remove featured image</p>
                                    </div>

                                    <!--Featured image 2-->
                                    <div class="post-image mt-4">
                                        <p><input type="file" accept="image/*" name="cover_image_2" id="cover-image-input2"
                                                  onchange="featuredImage2(event)" style="display: none;"></p>
                                        <p id="cover-image-label2" class="text-center image-label"><label for="cover-image-input2"
                                                                                                          style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box2" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="cover-image-file2"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image2" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage2(event)">Remove featured image</p>
                                    </div>

                                    <!--Featured image 3-->
                                    <div class="post-image mt-4">
                                        <p><input type="file" accept="image/*" name="cover_image_3" id="cover-image-input3"
                                                  onchange="featuredImage3(event)" style="display: none;"></p>
                                        <p id="cover-image-label3" class="text-center image-label"><label for="cover-image-input3"
                                                                                                          style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box3" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="cover-image-file3"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image3" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage3(event)">Remove featured image</p>
                                    </div>

                                    <div class="post-title mt-5">
                                        <label for="title"><strong>Title*</strong></label>
                                        <input class="form-control" type="text" name="title" id="title"
                                               placeholder="Add Title"
                                               value="{{old('title')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Categories</div>
                                <div class="card-body">
                                    <div class="post-categories">
                                        @foreach($categories as $key => $category)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                       id="categories-checkbox{{$key}}"
                                                       value="{{$category->id}}" name="category[]"
                                                       @if(is_array(old('category')) && in_array($category->id, old('category'))) checked @endif>
                                                <label class="form-check-label text-capitalize"
                                                       for="categories-checkbox{{$key}}">{{$category->name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="headline-1">
                                        <label for="first-headline"><strong>Intro Heading*</strong></label>
                                        <input class="form-control" type="text" name="intro_headline"
                                               id="first-headline"
                                               placeholder="Add Intro Heading" value="{{old('intro_headline')}}">
                                    </div>
                                    <div class="first-description-box mt-2">
                                                <textarea class="form-control" name="intro_description"
                                                          id="first-description" rows="4"
                                                          placeholder="Describe in details">{{old('intro_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- ask question section -->
                            <div class="card mt-4">
                                <div class="card-header bg-white">Main Article</div>
                                <div class="card-body">
                                    <!-- ask your question 1-->
                                    <div class="middle-image">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_1" id="headline-image-input-one"
                                                      onchange="loadImage1(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label1"><label for="headline-image-input-one"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box1" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-one" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image1" onclick="removeImage1(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_1"><strong>Ask your question 1*</strong></label>
                                        <input class="form-control" type="text" name="headline_1"
                                               id="headline_1"
                                               placeholder="Add Headline 1" value="{{old('headline_1')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_1"
                                                          id="description_1"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_1')}}</textarea>
                                    </div>

                                    <!-- ask your question 2-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_2" id="headline-image-input-two"
                                                      onchange="loadImage2(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label2"><label for="headline-image-input-two"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box2" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-two" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image2" onclick="removeImage2(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_2"><strong>Ask your question 2*</strong></label>
                                        <input class="form-control" type="text" name="headline_2"
                                               id="headline_2"
                                               placeholder="Add Headline 2" value="{{old('headline_2')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_2"
                                                          id="description_2"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_2')}}</textarea>
                                    </div>

                                    <!-- ask your question 3-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_3" id="headline-image-input-three"
                                                      onchange="loadImage3(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label3"><label for="headline-image-input-three"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box3" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-three" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image3" onclick="removeImage3(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_3"><strong>Ask your question 3*</strong></label>
                                        <input class="form-control" type="text" name="headline_3"
                                               id="headline_3"
                                               placeholder="Add Headline 3" value="{{old('headline_3')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_3"
                                                          id="description_3"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_3')}}</textarea>
                                    </div>

                                    <!-- ask your question 4-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_4" id="headline-image-input-four"
                                                      onchange="loadImage4(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label4"><label for="headline-image-input-four"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box4" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-four" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image4" onclick="removeImage4(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_4"><strong>Ask your question 4*</strong></label>
                                        <input class="form-control" type="text" name="headline_4"
                                               id="headline_4"
                                               placeholder="Add Headline 4" value="{{old('headline_4')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_4"
                                                          id="description_4"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_4')}}</textarea>
                                    </div>

                                    <!-- ask your question 5-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_5" id="headline-image-input-five"
                                                      onchange="loadImage5(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label5"><label for="headline-image-input-five"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box5" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-five" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image5" onclick="removeImage5(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_5"><strong>Ask your question 5*</strong></label>
                                        <input class="form-control" type="text" name="headline_5"
                                               id="headline_5"
                                               placeholder="Add Headline 5" value="{{old('headline_5')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_5"
                                                          id="description_5"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_5')}}</textarea>
                                    </div>

                                    <!-- ask your question 6-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_6" id="headline-image-input-six"
                                                      onchange="loadImage6(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label6"><label for="headline-image-input-six"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box6" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file-six" width="100%"/>
                                            </p>
                                            <p id="remove-headline-image6" onclick="removeImage6(event)"
                                               style="display: none; cursor: pointer;text-align: center">Remove
                                                first image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_6"><strong>Ask your question 6*</strong></label>
                                        <input class="form-control" type="text" name="headline_6"
                                               id="headline_6"
                                               placeholder="Add Headline 6" value="{{old('headline_6')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_6"
                                                          id="description_6"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_6')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Editor Side End -->
                    </div>
                </div>
            </div>
        </form>
        <!-- Edit area ends  -->

        <!-- footer area start -->
        @include('layouts.logged_in_footer')
        <!-- footer area ends  -->

    </div>
    <!-- content-right start -->

</div>


<!-- optional js -->
@include('layouts.all_scripts')
<script>
    //***** Fixed Part Start *****
    @include('layouts.post_visual_js_works')
    //***** Fixed part end *****

    //***** relative part start *****
    // featured image 1
    var featuredImage1 = function (event) {
        var image1 = document.getElementById('cover-image-file1');
        image1.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('cover-image-label1').style.display = 'none';
        document.getElementById('remove-cover-image1').style.display = 'block';

        var imageShow1 = document.getElementById('coverImage1');
        imageShow1.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeFeaturedImage1 = function (event) {
        var imageInput1 = document.getElementById('cover-image-input1');
        imageInput1.value = "";
        var image1 = document.getElementById('cover-image-file1');
        image1.src = "../assets/images/blog/examp/01.jpg";

        var imageShow1 = document.getElementById('coverImage1');
        imageShow1.src = "../assets/images/banner/01.jpg";

        document.getElementById('cover-image-label1').style.display = 'block';
        document.getElementById('remove-cover-image1').style.display = 'none';
    }

    // featured image 2
    var featuredImage2 = function (event) {
        var image2 = document.getElementById('cover-image-file2');
        image2.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('cover-image-label2').style.display = 'none';
        document.getElementById('remove-cover-image2').style.display = 'block';

        var imageShow2 = document.getElementById('coverImage2');
        imageShow2.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeFeaturedImage2 = function (event) {
        var imageInput2 = document.getElementById('cover-image-input2');
        imageInput2.value = "";
        var image2 = document.getElementById('cover-image-file2');
        image2.src = "../assets/images/blog/examp/01.jpg";

        var imageShow2 = document.getElementById('coverImage2');
        imageShow2.src = "../assets/images/banner/03.jpg";

        document.getElementById('cover-image-label2').style.display = 'block';
        document.getElementById('remove-cover-image2').style.display = 'none';
    }

    // featured image 3
    var featuredImage3 = function (event) {
        var image3 = document.getElementById('cover-image-file3');
        image3.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('cover-image-label3').style.display = 'none';
        document.getElementById('remove-cover-image3').style.display = 'block';

        var imageShow3 = document.getElementById('coverImage3');
        imageShow3.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeFeaturedImage3 = function (event) {
        var imageInput3 = document.getElementById('cover-image-input3');
        imageInput3.value = "";
        var image3 = document.getElementById('cover-image-file3');
        image3.src = "../assets/images/blog/examp/01.jpg";

        var imageShow3 = document.getElementById('coverImage3');
        imageShow3.src = "../assets/images/banner/02.jpg";

        document.getElementById('cover-image-label3').style.display = 'block';
        document.getElementById('remove-cover-image3').style.display = 'none';
    }

    // Headline images
    // 1st image
    var loadImage1 = function (event) {
        // add image
        var imageHeadlineOne = document.getElementById('headline-image-file-one');
        imageHeadlineOne.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label1').style.display = 'none';
        document.getElementById('remove-headline-image1').style.display = 'block';

        var headlineImageShowOne = document.getElementById('headline-one-image');
        headlineImageShowOne.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage1 = function (event) {
        var headlineImageInputOne = document.getElementById('headline-image-input-one');
        headlineImageInputOne.value = "";
        var imageHeadlineOne = document.getElementById('headline-image-file-one');
        imageHeadlineOne.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowOne = document.getElementById('headline-one-image');
        headlineImageShowOne.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label1').style.display = 'block';
        document.getElementById('remove-headline-image1').style.display = 'none';
    }

    // 2nd image
    var loadImage2 = function (event) {
        // add image
        var imageHeadlineTwo = document.getElementById('headline-image-file-two');
        imageHeadlineTwo.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label2').style.display = 'none';
        document.getElementById('remove-headline-image2').style.display = 'block';

        var headlineImageShowTwo = document.getElementById('headline-two-image');
        headlineImageShowTwo.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage2 = function (event) {
        var headlineImageInputTwo = document.getElementById('headline-image-input-two');
        headlineImageInputTwo.value = "";
        var imageHeadlineTwo = document.getElementById('headline-image-file-two');
        imageHeadlineTwo.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowTwo = document.getElementById('headline-two-image');
        headlineImageShowTwo.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label2').style.display = 'block';
        document.getElementById('remove-headline-image2').style.display = 'none';
    }

    // 3rd image
    var loadImage3 = function (event) {
        // add image
        var imageHeadlineThree = document.getElementById('headline-image-file-three');
        imageHeadlineThree.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label3').style.display = 'none';
        document.getElementById('remove-headline-image3').style.display = 'block';

        var headlineImageShowThree = document.getElementById('headline-three-image');
        headlineImageShowThree.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage3 = function (event) {
        var headlineImageInputThree = document.getElementById('headline-image-input-three');
        headlineImageInputThree.value = "";
        var imageHeadlineThree = document.getElementById('headline-image-file-three');
        imageHeadlineThree.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowThree = document.getElementById('headline-three-image');
        headlineImageShowThree.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label3').style.display = 'block';
        document.getElementById('remove-headline-image3').style.display = 'none';
    }

    // 4th image
    var loadImage4 = function (event) {
        // add image
        var imageHeadlineFour = document.getElementById('headline-image-file-four');
        imageHeadlineFour.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label4').style.display = 'none';
        document.getElementById('remove-headline-image4').style.display = 'block';

        var headlineImageShowFour = document.getElementById('headline-four-image');
        headlineImageShowFour.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage4 = function (event) {
        var headlineImageInputFour = document.getElementById('headline-image-input-four');
        headlineImageInputFour.value = "";
        var imageHeadlineFour = document.getElementById('headline-image-file-four');
        imageHeadlineFour.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowFour = document.getElementById('headline-four-image');
        headlineImageShowFour.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label4').style.display = 'block';
        document.getElementById('remove-headline-image4').style.display = 'none';
    }

    // 5th image
    var loadImage5 = function (event) {
        // add image
        var imageHeadlineFive = document.getElementById('headline-image-file-five');
        imageHeadlineFive.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label5').style.display = 'none';
        document.getElementById('remove-headline-image5').style.display = 'block';

        var headlineImageShowFive = document.getElementById('headline-five-image');
        headlineImageShowFive.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage5 = function (event) {
        var headlineImageInputFive = document.getElementById('headline-image-input-five');
        headlineImageInputFive.value = "";
        var imageHeadlineFive = document.getElementById('headline-image-file-five');
        imageHeadlineFive.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowFive = document.getElementById('headline-five-image');
        headlineImageShowFive.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label5').style.display = 'block';
        document.getElementById('remove-headline-image5').style.display = 'none';
    }

    // 6th image
    var loadImage6 = function (event) {
        // add image
        var imageHeadlineSix = document.getElementById('headline-image-file-six');
        imageHeadlineSix.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label6').style.display = 'none';
        document.getElementById('remove-headline-image6').style.display = 'block';

        var headlineImageShowSix = document.getElementById('headline-six-image');
        headlineImageShowSix.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage6 = function (event) {
        var headlineImageInputSix = document.getElementById('headline-image-input-six');
        headlineImageInputSix.value = "";
        var imageHeadlineSix = document.getElementById('headline-image-file-six');
        imageHeadlineSix.src = "../assets/images/blog/examp/01.jpg";

        var headlineImageShowSix = document.getElementById('headline-six-image');
        headlineImageShowSix.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('headline-image-label6').style.display = 'block';
        document.getElementById('remove-headline-image6').style.display = 'none';
    }

    // headline 1
    $('#headline_1').keyup(function () {
        $('#headline1').text($('#headline_1').val());
    });

    // headline 2
    $('#headline_2').keyup(function () {
        $('#headline2').text($('#headline_2').val());
    });

    // headline 3
    $('#headline_3').keyup(function () {
        $('#headline3').text($('#headline_3').val());
    });

    // headline 4
    $('#headline_4').keyup(function () {
        $('#headline4').text($('#headline_4').val());
    });

    // headline 5
    $('#headline_5').keyup(function () {
        $('#headline5').text($('#headline_5').val());
    });

    // headline 6
    $('#headline_6').keyup(function () {
        $('#headline6').text($('#headline_6').val());
    });

    // description 1
    $('#description_1').keyup(function () {
        $('#description1').text($('#description_1').val());
    });

    // description 2
    $('#description_2').keyup(function () {
        $('#description2').text($('#description_2').val());
    });

    // description 3
    $('#description_3').keyup(function () {
        $('#description3').text($('#description_3').val());
    });

    // description 4
    $('#description_4').keyup(function () {
        $('#description4').text($('#description_4').val());
    });

    // description 5
    $('#description_5').keyup(function () {
        $('#description5').text($('#description_5').val());
    });

    // description 6
    $('#description_6').keyup(function () {
        $('#description6').text($('#description_6').val());
    });
    //***** relative part end *****
</script>
</body>
</html>
