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
    #add_products_section, #edit_products_section {
        margin-top: 10px;
    }

    #add_products_section .product, #edit_products_section .product_edit {
        margin-top: 20px;
        border: 1px solid #5c636a;
        border-radius: 5px;
        overflow: hidden;
        position: relative;
    }

    #add_products_section .product img, #edit_products_section .product_edit img {
        width: 50px;
        height: 50px;
        float: left;
    }

    #add_products_section .product .product_texts, #edit_products_section .product_edit .product_texts {
        margin-left: 10px;
        margin-top: 3px;
        margin-bottom: 3px;
    }

    #add_products_section .product .product_texts h5, #edit_products_section .product_edit .product_texts h5 {
        margin: 0;
        font-size: 12px;
    }

    #add_products_section .product .product_texts p, #edit_products_section .product_edit .product_texts p {
        margin: 0;
        font-size: 12px;
    }

    #add_products_section .product .product_texts a, #edit_products_section .product_edit .product_texts a {
        font-size: 12px;
    }

    #add_products_section .product .cross, #edit_products_section .product_edit .cross {
        display: inline-block;
        float: right;
    }

    #add_products_section .product .cross i, #edit_products_section .product_edit .cross i {
        font-size: 30px;
        color: #fff;
        background-color: #5c636a;
        padding: 10px;
        position: absolute;
        right: 0;
        bottom: 0;
    }

    #add_products_section .product .cross i:hover, #edit_products_section .product_edit .cross i:hover {
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
        <form action="{{route('blogger.blog.post.image.update.5',$post['post']->id)}}" method="POST"
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
                                    @include('layouts.templates.image.v5')
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
                                        <p><input type="file" accept="image/*" name="cover_image" id="cover-image-input"
                                                  onchange="featuredImage(event)" style="display: none;"></p>
                                        <p id="cover-image-label" class="text-center image-label"><label for="cover-image-input"
                                                                                                         style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}}"
                                                id="cover-image-file"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-cover-image" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeFeaturedImage(event)">Remove featured image</p>
                                    </div>

                                    <div class="post-title mt-5">
                                        <label for="title"><strong>Title*</strong></label>
                                        <input class="form-control" type="text" name="title" id="title"
                                               placeholder="Add Title"
                                               value="{{$post['post']->title}}">
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
                                                       @foreach($post['post']->categories as $post_category)
                                                       @if($post_category->id == $category->id) checked @endif
                                                    @endforeach>
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
                                               placeholder="Add Intro Heading" value="{{$post['post']->intro_headline}}">
                                    </div>
                                    <div class="first-description-box mt-2">
                                                <textarea class="form-control" name="intro_description"
                                                          id="first-description" rows="4"
                                                          placeholder="Describe in details">{{$post['post']->intro_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--Ask question section-->
                            <div class="card mt-4">
                                <div class="card-header bg-white">Main Article</div>
                                <div class="card-body">
                                    <!--1-->
                                    <div class="middle-image">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_1" id="headline-image-input-one"
                                                      onchange="loadImage1(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label1"><label for="headline-image-input-one"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box1" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}}"
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
                                               placeholder="Add Headline 1" value="{{$post['post']->headline1}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_1"
                                                          id="description_1"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description1}}</textarea>
                                    </div>

                                    <!--2-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_2" id="headline-image-input-two"
                                                      onchange="loadImage2(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label2"><label for="headline-image-input-two"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box2" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}}"
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
                                               placeholder="Add Headline 2" value="{{$post['post']->headline2}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_2"
                                                          id="description_2"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description2}}</textarea>
                                    </div>

                                    <!--3-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_3" id="headline-image-input-three"
                                                      onchange="loadImage3(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label3"><label for="headline-image-input-three"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box3" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}}"
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
                                               placeholder="Add Headline 3" value="{{$post['post']->headline3}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_3"
                                                          id="description_3"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description3}}</textarea>
                                    </div>

                                    <!--4-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_4" id="headline-image-input-four"
                                                      onchange="loadImage4(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label4"><label for="headline-image-input-four"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box4" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}}"
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
                                               placeholder="Add Headline 4" value="{{$post['post']->headline4}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_4"
                                                          id="description_4"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description4}}</textarea>
                                    </div>

                                    <!--5-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_5" id="headline-image-input-five"
                                                      onchange="loadImage5(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label5"><label for="headline-image-input-five"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box5" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image5}}"
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
                                               placeholder="Add Headline 5" value="{{$post['post']->headline5}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_5"
                                                          id="description_5"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description5}}</textarea>
                                    </div>

                                    <!--6-->
                                    <div class="middle-image mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="article_image_6" id="headline-image-input-six"
                                                      onchange="loadImage6(event)" style="display: none;"></p>
                                            <p class="text-center image-label" id="headline-image-label6"><label for="headline-image-input-six"
                                                                                                                 style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="headline-image-box6" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image6}}"
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
                                               placeholder="Add Headline 6" value="{{$post['post']->headline6}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_6"
                                                          id="description_6"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description6}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--Product Background-->
                            <div class="card mt-4">
                                <div class="card-header">Products Background</div>
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="product_background_image" id="product-bg-image-input"
                                                  onchange="productBackgroundImage(event)" style="display: none;"></p>
                                        <p id="product-bg-image-label" class="text-center image-label"><label for="product-bg-image-input"
                                                                                                              style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('upload/blogger_image_post')}}/{{$post['post']->product_background_image}}"
                                                id="product-bg-image-file"
                                                width="100%"/>
                                        </p>
                                        <p id="remove-product-bg-image" class="text-center" style="display: none;cursor: pointer"
                                           onclick="removeProductBackgroundImage(event)">Remove product background image</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Used Colors <span
                                        style="font-size: 10px">Optional</span></div>
                                <div class="card-body">
                                    <div>
                                        <input class="form-control form-control-sm" type="text" id="color_code1"
                                               name="color_code1" placeholder="#FFF000" value="{{$post['post']->color1}}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code2"
                                               name="color_code2" placeholder="#FFF000" value="{{$post['post']->color2}}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code3"
                                               name="color_code3" placeholder="#FFF000" value="{{$post['post']->color3}}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code4"
                                               name="color_code4" placeholder="#FFF000" value="{{$post['post']->color4}}">
                                        <input class="form-control form-control-sm mt-3" type="text" id="color_code5"
                                               name="color_code5" placeholder="#FFF000" value="{{$post['post']->color5}}">
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

                                    <div class="" id="edit_products_section">
                                        <p class="m-1">Used Product</p>
                                        <hr class="m-1">
                                        @forelse($post['products'] as $key => $product)
                                            <div class="product_edit" id="product-{{$product->id}}">
                                                <img class="d-inline-block"
                                                     src="{{asset('upload/blogger_product')}}/{{$product->image}}"
                                                     alt="" width="50px" height="50px">
                                                <div class="product_texts d-inline-block">
                                                    <h5>{{$product->product_name}}</h5>
                                                    <a href="{{$product->link}}">Link</a>
                                                </div>
                                                <div class="cross">
                                                    <a href="{{route('blogger.blog.product.delete',$product->id)}}"
                                                       id="productId{{$product->id}}">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="alert alert-secondary py-2">No Product Added Yet</div>
                                        @endforelse
                                    </div>

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
    // product background image
    var productBackgroundImage = function (event) {

        var imageProductBg = document.getElementById('product-bg-image-file');
        imageProductBg.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('product-bg-image-label').style.display = 'none';
        document.getElementById('remove-product-bg-image').style.display = 'block';

        var imageShowProductBg = document.getElementById('productBgImage');
        imageShowProductBg.style.backgroundImage = "url('" + imageProductBg.src + "')";
    };

    // remove image
    var removeProductBackgroundImage= function (event) {
        var imageInputProductBg = document.getElementById('product-bg-image-input');
        imageInputProductBg.value = "";
        var imageProductBg = document.getElementById('product-bg-image-file');
        imageProductBg.src = "../assets/images/blog/examp/01.jpg";

        var imageShowProductBg = document.getElementById('productBgImage');
        imageShowProductBg.style.backgroundImage = "url('../assets/images/banner/profile/01.jpg')";

        document.getElementById('product-bg-image-label').style.display = 'block';
        document.getElementById('remove-product-bg-image').style.display = 'none';
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
