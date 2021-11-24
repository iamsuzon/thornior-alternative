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

        <!-- post top navbar start -->
        <form action="{{route('blogger.blog.post.image.update.2',$post['post']->id)}}" method="POST"
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
            <!-- post top navbar ends  -->

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
                                <div class="col-12">
                                    @include('layouts.templates.image.v2')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-white">Cover Image</div>
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="cover_image" id="cover-image-input"
                                                  onchange="featuredImage(event)" style="display: none;"></p>
                                        <p id="cover-image-label" class="text-center image-label"><label
                                                for="cover-image-input"
                                                style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('upload/blogger_image_post')}}/{{$post['post']->fimage}}"
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
                                        <input class="form-control" type="text" name="intro_heading"
                                               id="first-headline"
                                               placeholder="Add Intro Heading" value="{{$post['post']->intro_header}}">
                                    </div>
                                    <div class="first-description-box mt-2">
                                                <textarea class="form-control" name="intro_description"
                                                          id="first-description" rows="4"
                                                          placeholder="Describe in details">{{$post['post']->intro_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-header bg-white">Main Article</div>
                                <div class="card-body">
                                    <!-- 01 -->
                                    <div class="middle-images">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_1"
                                                      id="main-image-one-input"
                                                      onchange="mainImageOne(event)" style="display: none;"></p>
                                            <p id="main-image-one-label" class="text-center image-label"><label
                                                    for="main-image-one-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_one" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image1}}"
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
                                               placeholder="Add Headline 01" value="{{$post['post']->headline1}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_1"
                                                          id="description_1"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description1}}</textarea>
                                    </div>

                                    <!-- 02 -->
                                    <div class="middle-images mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_2"
                                                      id="main-image-two-input"
                                                      onchange="mainImageTwo(event)" style="display: none;"></p>
                                            <p id="main-image-two-label" class="text-center image-label"><label
                                                    for="main-image-two-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_two" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image2}}"
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
                                               placeholder="Add Headline 02" value="{{$post['post']->headline2}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_2"
                                                          id="description_2"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description1}}</textarea>
                                    </div>

                                    <!-- 03 -->
                                    <div class="middle-images mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_3"
                                                      id="main-image-three-input"
                                                      onchange="mainImageThree(event)" style="display: none;"></p>
                                            <p id="main-image-three-label" class="text-center image-label"><label
                                                    for="main-image-three-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_three" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image3}}"
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
                                               placeholder="Add Headline 03" value="{{$post['post']->headline3}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_3"
                                                          id="description_3"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description1}}</textarea>
                                    </div>

                                    <!-- 04 -->
                                    <div class="middle-images mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_4"
                                                      id="main-image-four-input"
                                                      onchange="mainImageFour(event)" style="display: none;"></p>
                                            <p id="main-image-four-label" class="text-center image-label"><label
                                                    for="main-image-four-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_four" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image4}}"
                                                    id="main-image-four-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-main-image-four" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImageFour(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_4"><strong>04*</strong></label>
                                        <input class="form-control" type="text" name="headline_4"
                                               id="headline_4"
                                               placeholder="Add Headline 04" value="{{$post['post']->headline4}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_4"
                                                          id="description_4"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description4}}</textarea>
                                    </div>

                                    <!-- 05 -->
                                    <div class="middle-images mt-4">
                                        <div class="post-image">
                                            <p><input type="file" accept="image/*" name="main_article_image_5"
                                                      id="main-image-five-input"
                                                      onchange="mainImageFive(event)" style="display: none;"></p>
                                            <p id="main-image-five-label" class="text-center image-label"><label
                                                    for="main-image-five-input"
                                                    style="cursor: pointer;"><i
                                                        class="fas fa-camera"></i></label></p>
                                            <p id="article_image_box_five" class="text-center"><img
                                                    src="{{asset('upload/blogger_image_post')}}/{{$post['post']->article_image5}}"
                                                    id="main-image-five-file"
                                                    width="100%"/>
                                            </p>
                                            <p id="remove-main-image-five" class="text-center"
                                               style="display: none;cursor: pointer"
                                               onclick="removeMainImageFive(event)">Remove featured image</p>
                                        </div>
                                    </div>
                                    <div class="head-1 mt-4">
                                        <label for="headline_5"><strong>05*</strong></label>
                                        <input class="form-control" type="text" name="headline_5"
                                               id="headline_5"
                                               placeholder="Add Headline 05" value="{{$post['post']->headline5}}">
                                    </div>
                                    <div class="des-1 mt-2">
                                                <textarea class="form-control" name="description_5"
                                                          id="description_5"
                                                          placeholder="Describe in Details"
                                                          rows="3">{{$post['post']->description5}}</textarea>
                                    </div>


                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="headline-2 mt-3">
                                        <label for="second-heading"><strong>Bottom Heading*</strong></label>
                                        <input type="text" class="form-control" id="second-heading"
                                               name="bottom_headline" placeholder="Add Bottom Heading"
                                               value="{{$post['post']->bottom_headline}}">
                                    </div>
                                    <div class="last-description-box mt-2">
                                            <textarea class="form-control" id="second-description"
                                                      name="bottom_description"
                                                      placeholder="Describe in details"
                                                      rows="4">{{$post['post']->bottom_description}}</textarea>
                                    </div>

                                    <div class="headline-2 mt-4">
                                        <label for="last_headline"><strong>Outro Heading*</strong></label>
                                        <input type="text" class="form-control" id="last_headline"
                                               name="outro_heading" placeholder="Add Outro Heading"
                                               value="{{$post['post']->outro_heading}}">
                                    </div>
                                    <div class="last-description-box mt-2">
                                            <textarea class="form-control" id="last-description"
                                                      name="outro_description"
                                                      placeholder="Describe in details"
                                                      rows="4">{{$post['post']->outro_description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!--color plate er upoere image ta-->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="post-image">
                                        <p><input type="file" accept="image/*" name="outro_image" id="outro-image-input"
                                                  onchange="outroImage(event)" style="display: none;"></p>
                                        <p class="text-center image-label" id="outro-image-label"><label
                                                for="outro-image-input"
                                                style="cursor: pointer;"><i
                                                    class="fas fa-camera"></i></label></p>
                                        <p id="image-box" class="text-center"><img
                                                src="{{asset('upload/blogger_image_post')}}/{{$post['post']->bottom_image}}"
                                                id="outro-image-file" width="100%"/>
                                        </p>
                                        <p id="remove-outro-image" onclick="removeOutroImage(event)"
                                           style="display: none; cursor: pointer;text-align: center">Remove
                                            first image</p>
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
                            <button type="submit" class="btn btn-primary">Post</button>
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
    // outro image
    var outroImage = function (event) {
        // document.getElementById('image-box').style.display = 'block';
        var imageOutro = document.getElementById('outro-image-file');
        imageOutro.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('outro-image-label').style.display = 'none';
        document.getElementById('remove-outro-image').style.display = 'block';

        var imageShowOutro = document.getElementById('imageOutro');
        imageShowOutro.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeOutroImage = function (event) {
        var imageInputOutro = document.getElementById('outro-image-input');
        imageInputOutro.value = "";
        var imageOutro = document.getElementById('outro-image-file');
        imageOutro.src = "../assets/images/blog/examp/01.jpg";

        var imageShowOutro = document.getElementById('imageOutro');
        imageShowOutro.src = "../assets/images/blog/examp/01.jpg";

        // document.getElementById('image-box').style.display = 'none';
        document.getElementById('outro-image-label').style.display = 'block';
        document.getElementById('remove-outro-image').style.display = 'none';
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
        mainImageOne.src = "../assets/images/blog/examp/01.jpg";

        var imageShowOne = document.getElementById('article-one-image');
        imageShowOne.src = "../assets/images/blog/examp/01.jpg";

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
        mainImageTwo.src = "../assets/images/blog/examp/01.jpg";

        var imageShowTwo = document.getElementById('article-two-image');
        imageShowTwo.src = "../assets/images/blog/examp/01.jpg";

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
        mainImageThree.src = "../assets/images/blog/examp/01.jpg";

        var imageShowThree = document.getElementById('article-three-image');
        imageShowThree.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('main-image-three-label').style.display = 'block';
        document.getElementById('remove-main-image-three').style.display = 'none';
    }

    // Main article image four
    var mainImageFour = function (event) {
        // add image
        var imageFour = document.getElementById('main-image-four-file');
        imageFour.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('main-image-four-label').style.display = 'none';
        document.getElementById('remove-main-image-four').style.display = 'block';

        var imageShowFour = document.getElementById('article-four-image');
        imageShowFour.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImageFour = function (event) {
        var mainImageInputFour = document.getElementById('main-image-four-input');
        mainImageInputFour.value = "";
        var mainImageFour = document.getElementById('main-image-four-file');
        mainImageFour.src = "../assets/images/blog/examp/01.jpg";

        var imageShowFour = document.getElementById('article-four-image');
        imageShowFour.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('main-image-four-label').style.display = 'block';
        document.getElementById('remove-main-image-four').style.display = 'none';
    }

    // Main article image five
    var mainImageFive = function (event) {
        // add image
        var imageFive = document.getElementById('main-image-five-file');
        imageFive.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('main-image-five-label').style.display = 'none';
        document.getElementById('remove-main-image-five').style.display = 'block';

        var imageShowFive = document.getElementById('article-five-image');
        imageShowFive.src = URL.createObjectURL(event.target.files[0]);
    };

    // remove image
    var removeMainImageFive = function (event) {
        var mainImageInputFive = document.getElementById('main-image-five-input');
        mainImageInputFive.value = "";
        var mainImageFive = document.getElementById('main-image-five-file');
        mainImageFive.src = "../assets/images/blog/examp/01.jpg";

        var imageShowFive = document.getElementById('article-five-image');
        imageShowFive.src = "../assets/images/blog/examp/01.jpg";

        document.getElementById('main-image-five-label').style.display = 'block';
        document.getElementById('remove-main-image-five').style.display = 'none';
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

    // second heading
    $('#second-heading').keyup(function () {
        $('#second_headline').text($('#second-heading').val());
    });
    // second description
    $('#second-description').keyup(function () {
        $('#second_description').text($('#second-description').val());
    });
    //***** relative part end *****
</script>

<script>
    $(document).ready(function () {
        getProducts();

        function getProducts() {
            $.ajax({
                type: 'GET',
                url: '{{route('blogger.blog.post.image.products')}}',
                dataType: 'JSON',
                success: function (response) {
                    $('.product').remove();

                    if (response.products.length > 0)
                    {
                        $('.alert-secondary').remove();
                    }
                    $.each(response.products, function (key, item) {
                        $('#add_products_section').append(
                            '<div class="product" id="product-' + item.id + '">\
                                <img class="d-inline-block" src="{{asset('upload/blogger_product')}}/' + item.image + '" alt="" width="50px" height="50px">\
                                    <div class="product_texts d-inline-block">\
                                        <h5>' + item.product_name + '</h5>\
                                        <a href="' + item.link + '">Link</a>\
                                    </div>\
                                    <div class="cross">\
                                        <a target="_blank" href="javascript:void(0)" id="productId' + item.id + '">\
                                            <i class="fas fa-times"></i>\
                                        </a>\
                                    </div>\
                            </div>'
                        );
                        document.getElementById('productId' + item.id).onclick = function () {
                            productDelete(item.id)
                            $("#product-" + item.id).remove();
                        };
                    });

                }
            });
        }

        function productDelete(id) {
            event.preventDefault();

            $.ajax({
                url: '{{url('blogger/blog/product/delete')}}' + '/' + id,
                type: 'get',
                data: {
                    _token: $("input[name=_token]").val()
                },
                success: function (response) {
                    toastr.error('Product Deleted Successfully');
                }
            });
        }

        $('#bloggerProductForm').on('submit', function (event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route("blogger.blog.product.store") }}',
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    if (data.error) {
                        var error_html = '';
                        for (var count = 0; count < data.error.length; count++) {
                            error_html += '<p>' + data.error[count] + '</p>';
                        }
                        toastr.error(error_html);
                    } else {
                        $("#modal_close").click();
                        toastr.success(data.success);

                        document.getElementById("bloggerProductForm").reset();

                        document.getElementById('image-labelp').style.display = 'block';
                        document.getElementById('remove-imagep').style.display = 'none';

                        var pimageInput = document.getElementById('filep');
                        pimageInput.value = "";
                        var pimage = document.getElementById('outputp');
                        pimage.src = "{{asset('backend/assets/images/blog/placeholder.jpg')}}";

                        getProducts();
                    }
                }
            })
        });
    });
</script>

@include('layouts.add_colors')

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
