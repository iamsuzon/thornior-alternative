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
        <form action="{{route('blogger.blog.post.image.store.3')}}" method="POST"
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12">
                            <div class="row">
                                <!-- Left Template Side Column Start -->
                                <div class="col-12">

                                <!-- Left Template Side Start -->
                                @include('layouts.templates.image.v3')
                                <!-- Left Template Side End -->

                                </div>
                                <!-- Left Template Side Column Ends -->
                            </div>
                        </div>

                        <!-- Right Editor Side Start -->
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-white">Cover Image</div>
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="cover_image"
                                                  id="cover-image-input"
                                                  onchange="featuredImage(event)" style="display: none;"></p>
                                        <p id="cover-image-label" class="text-center image-label"><label
                                                for="cover-image-input"
                                                style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="cover-image-file"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image" class="text-center"
                                           style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage(event)">Remove featured image</p>
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
                                    <div class="headline-image">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="headline_image"
                                                      id="headline-image-input"
                                                      onchange="headlineImage(event)" style="display: none;"></p>
                                            <p id="headline-image-label" class="text-center image-label"><label
                                                    for="headline-image-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="image-box" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="headline-image-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-headline-image" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeHeadlineImage(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="headline-1">
                                        <label for="first-headline"><strong>Headline*</strong></label>
                                        <input class="form-control" type="text" name="first_heading"
                                               id="first-headline"
                                               placeholder="Add Intro Heading" value="{{old('first_heading')}}">
                                    </div>
                                    <div class="first-description-box mt-2">
                                                <textarea class="form-control" name="first_description"
                                                          id="first-description" rows="4"
                                                          placeholder="Describe in details">{{old('first_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Main Article</div>
                                <div class="card-body">
                                    <!--01-->
                                    <div class="middle-image">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_1"
                                                      id="main-image-one-input"
                                                      onchange="mainImageOne(event)" style="display: none;"></p>
                                            <p id="main-image-one-label" class="text-center image-label"><label
                                                    for="main-image-one-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_one" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="main-image-one-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-main-image-one" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImageOne(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_1"><strong>01*</strong></label>
                                        <input class="form-control" type="text" name="headline_1"
                                               id="headline_1"
                                               placeholder="Add Headline 01" value="{{old('headline_1')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_1"
                                                          id="description_1"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_1')}}</textarea>
                                    </div>

                                    <!--02-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_2"
                                                      id="main-image-two-input"
                                                      onchange="mainImageTwo(event)" style="display: none;"></p>
                                            <p id="main-image-two-label" class="text-center image-label"><label
                                                    for="main-image-two-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_two" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="main-image-two-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-main-image-two" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImageTwo(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_2"><strong>02*</strong></label>
                                        <input class="form-control" type="text" name="headline_2"
                                               id="headline_2"
                                               placeholder="Add Headline 02" value="{{old('headline_2')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_2"
                                                          id="description_2"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_2')}}</textarea>
                                    </div>

                                    <!--03-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_3"
                                                      id="main-image-three-input"
                                                      onchange="mainImageThree(event)" style="display: none;"></p>
                                            <p id="main-image-three-label" class="text-center image-label"><label
                                                    for="main-image-three-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_three" class="text-center"><img
                                                    src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                    id="main-image-three-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-main-image-three" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImageThree(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_3"><strong>03*</strong></label>
                                        <input class="form-control" type="text" name="headline_3"
                                               id="headline_3"
                                               placeholder="Add Headline 03" value="{{old('headline_3')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_3"
                                                          id="description_3"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('description_3')}}</textarea>
                                    </div>

                                    <!--Headline 2-->
                                    <div class="head-1 mt-4">
                                        <label for="second-headline"><strong>Headline 2*</strong></label>
                                        <input class="form-control" type="text" name="last_headline"
                                               id="second-headline"
                                               placeholder="Add Headline 2" value="{{old('last_headline')}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="last_description"
                                                          id="second-description"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{old('last_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--Outro Headline and description-->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="headline-2 mt-3">
                                        <label for="last-headline"><strong>Outro Heading*</strong></label>
                                        <input type="text" class="form-control" id="outro_heading"
                                               name="outro_heading" placeholder="Add Outro Heading"
                                               value="{{old('last_headline')}}">
                                    </div>
                                    <div class="last-description-box mt-2">
                                            <textarea class="form-control" id="last-description" name="outro_description"
                                                      placeholder="Describe in details"
                                                      rows="4">{{old('last_description')}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--Last 2 images-->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="bottom_image_1"
                                                  id="last-image-input-one"
                                                  onchange="loadImage1(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="last-image-label1"><label
                                                for="last-image-input-one"
                                                style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="last-image-box1" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="last-image-file-one" width="100%"/>
                                        </p>
                                        <p id="remove-last-image1" onclick="removeImage1(event)"
                                           style="display: none; cursor: pointer;text-align: center">Remove
                                            first image</p>
                                    </div>
                                    <div class="post-image mt-5">
                                        <p><input type="file" accept="image/*" name="bottom_image_2"
                                                  id="last-image-input-two"
                                                  onchange="loadImage2(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="last-image-label2"><label
                                                for="last-image-input-two"
                                                style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="last-image-box2" class="text-center"><img
                                                src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                id="last-image-file-two" width="100%"/>
                                        </p>
                                        <p id="remove-last-image2" onclick="removeImage2(event)"
                                           style="display: none; cursor: pointer;text-align: center">Remove
                                            second image</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Used Colors <span
                                        style="font-size: 10px">Optional</span></div>
                                <div class="card-body">
                                    <div>
                                        <input class="form-control form-control-sm" type="text" id="color_code1"
                                               name="color_code1" placeholder="#FFF000" value="{{ old('color_code1') }}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code2"
                                               name="color_code2" placeholder="#FFF000" value="{{ old('color_code2') }}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code3"
                                               name="color_code3" placeholder="#FFF000" value="{{ old('color_code3') }}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code4"
                                               name="color_code4" placeholder="#FFF000" value="{{ old('color_code4') }}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code5"
                                               name="color_code5" placeholder="#FFF000" value="{{ old('color_code5') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Add Product</div>
                                <div class="card-body">
                                    <a class="btn btn-dark bg-dark text-white text-center d-block dropdown-item my-2"
                                       href="#"
                                       data-bs-toggle="modal"
                                       data-bs-target="#addNewProduct">Add New Product</a>

                                    <div class="" id="add_products_section">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Right Editor Side End -->
                    </div>
                </div>
            </div>
        </form>

        <!-- Add New Product Dropdown -->
        <div class="modal fade" id="addNewProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
             aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" id="bloggerProductForm" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" value="{{Auth::user()->id}}" name="id">
                            <label for="name">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   placeholder="write product name..">
                            <br>
                            <label for="details">Product Details</label>
                            <textarea type="text" name="details" id="details" class="form-control"
                                      placeholder="write in details.." rows="4"></textarea>
                            <br>
                            <label for="link">Product Link</label>
                            <input type="url" name="link" id="link" class="form-control" placeholder="enter a link..">
                            <br>
                            <div class="post-image mb-5">
                                <p><input type="file" accept="image/*" name="image" id="filep"
                                          onchange="productImage(event)" style="display: none;"></p>
                                <p class="text-center image-label" id="image-labelp"><label for="filep"
                                                                                            style="cursor: pointer;"><i
                                            class="fas fa-camera"></i></label></p>
                                <p id="image-boxp"><img src="{{asset('backend/assets/images/blog/placeholder.jpg')}}"
                                                        id="outputp" width="100%" height="auto"/></p>
                                <p id="remove-imagep" class="text-center" onclick="removeProductImage(event)"
                                   style="display: none;cursor: pointer">Remove image</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="modal_close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit area ends  -->

        <!-- footer area start -->
        <footer>
            <div class="footer-content">
                <p>&copy; 2021 | Thornior | All right reserved</p>
                <p>V 1.8</p>
            </div>
        </footer>
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
    // headline image
    var headlineImage = function (event) {

        var headlineImageFile = document.getElementById('headline-image-file');
        headlineImageFile.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('headline-image-label').style.display = 'none';
        document.getElementById('remove-headline-image').style.display = 'block';

        var headlineImageShow = document.getElementById('headline_Image');
        headlineImageShow.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeHeadlineImage = function (event) {
        var headlineImageInput = document.getElementById('headline-image-input');
        headlineImageInput.value = "";
        var headlineImageFile = document.getElementById('headline-image-file');
        headlineImageFile.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var headlineImageShow = document.getElementById('headline_Image');
        headlineImageShow.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('headline-image-label').style.display = 'block';
        document.getElementById('remove-headline-image').style.display = 'none';
    }

    // Main article image one
    var mainImageOne = function (event) {
        // add image
        var imageOne = document.getElementById('main-image-one-file');
        imageOne.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('main-image-one-label').style.display = 'none';
        document.getElementById('remove-main-image-one').style.display = 'block';

        var imageShowOne = document.getElementById('article-one-image');
        imageShowOne.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImageOne = function (event) {
        var mainImageInputOne = document.getElementById('main-image-one-input');
        mainImageInputOne.value = "";
        var mainImageOne = document.getElementById('main-image-one-file');
        mainImageOne.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var imageShowOne = document.getElementById('article-one-image');
        imageShowOne.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('main-image-one-label').style.display = 'block';
        document.getElementById('remove-main-image-one').style.display = 'none';
    }

    // Main article image two
    var mainImageTwo = function (event) {
        // add image
        var imageTwo = document.getElementById('main-image-two-file');
        imageTwo.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('main-image-two-label').style.display = 'none';
        document.getElementById('remove-main-image-two').style.display = 'block';

        var imageShowTwo = document.getElementById('article-two-image');
        imageShowTwo.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImageTwo = function (event) {
        var mainImageInputTwo = document.getElementById('main-image-two-input');
        mainImageInputTwo.value = "";
        var mainImageTwo = document.getElementById('main-image-two-file');
        mainImageTwo.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var imageShowTwo = document.getElementById('article-two-image');
        imageShowTwo.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('main-image-two-label').style.display = 'block';
        document.getElementById('remove-main-image-two').style.display = 'none';
    }

    // Main article image three
    var mainImageThree = function (event) {
        // add image
        var imageThree = document.getElementById('main-image-three-file');
        imageThree.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('main-image-three-label').style.display = 'none';
        document.getElementById('remove-main-image-three').style.display = 'block';

        var imageShowThree = document.getElementById('article-three-image');
        imageShowThree.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImageThree = function (event) {
        var mainImageInputThree = document.getElementById('main-image-three-input');
        mainImageInputThree.value = "";
        var mainImageThree = document.getElementById('main-image-three-file');
        mainImageThree.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var imageShowThree = document.getElementById('article-three-image');
        imageShowThree.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('main-image-three-label').style.display = 'block';
        document.getElementById('remove-main-image-three').style.display = 'none';
    }

    // Last 2 images image 1
    var loadImage1 = function (event) {
        // add image
        var imageLastOne = document.getElementById('last-image-file-one');
        imageLastOne.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('last-image-label1').style.display = 'none';
        document.getElementById('remove-last-image1').style.display = 'block';

        var lastImageShowOne = document.getElementById('last-one-image');
        lastImageShowOne.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage1 = function (event) {
        var lastImageInputOne = document.getElementById('last-image-input-one');
        lastImageInputOne.value = "";
        var imageLastOne = document.getElementById('last-image-file-one');
        imageLastOne.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var lastImageShowOne = document.getElementById('last-one-image');
        lastImageShowOne.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('last-image-label1').style.display = 'block';
        document.getElementById('remove-last-image1').style.display = 'none';
    }

    // Last 2 images image 2
    var loadImage2 = function (event) {
        // add image
        var imageLastTwo = document.getElementById('last-image-file-two');
        imageLastTwo.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('last-image-label2').style.display = 'none';
        document.getElementById('remove-last-image2').style.display = 'block';

        var lastImageShowTwo = document.getElementById('last-two-image');
        lastImageShowTwo.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeImage2 = function (event) {
        var lastImageInputTwo = document.getElementById('last-image-input-two');
        lastImageInputTwo.value = "";
        var imageLastTwo = document.getElementById('last-image-file-two');
        imageLastTwo.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        var lastImageShowTwo = document.getElementById('last-two-image');
        lastImageShowTwo.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

        document.getElementById('last-image-label2').style.display = 'block';
        document.getElementById('remove-last-image2').style.display = 'none';
    }

    // first heading
    $('#first-headline').keyup(function () {
        $('#first_headline').text($('#first-headline').val());
    });
    // first description
    $('#first-description').keyup(function () {
        $('#first_description').text($('#first-description').val());
    });
    // second heading
    $('#second-headline').keyup(function () {
        $('#second_headline').text($('#second-headline').val());
    });
    // second description
    $('#second-description').keyup(function () {
        $('#second_description').text($('#second-description').val());
    });

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
    //***** relative part end *****
</script>

@include('layouts.addProductScript')

<script>
    @if(Session::has('success'))
    var type = "{{Session::get('alert-type','success')}}"
    toastr.success("{{ Session::get('success') }}");
    @endif
</script>
<script>
    @if(Session::has('error'))
    var type = "{{Session::get('alert-type','error')}}"
    toastr.success("{{ Session::get('error') }}");
    @endif
</script>
</body>
</html>
