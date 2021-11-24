<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <!-- font-awsome -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/all.min.css')}}">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/bootstrap.min.css')}}">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/swiper.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/animate.css')}}">
    <!-- ui css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/jquery-ui.css')}}">
    <!-- lightcase css -->
    <link rel="stylesheet" href="{{asset('backend/assets/css/lightcase.css')}}">
    {{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('backend/assets/sass/style.css')}}">

    <title>Thornior</title>
</head>
<body>
<style>
    .dataTables_length {
        display: inline-block;
        float: left;
        margin-bottom: 10px;
    }

    .dataTables_filter {
        display: inline-block;
        float: right;
        margin-bottom: 10px;
    }

    .dataTables_filter input {
        border: 1px solid #F2F2F2;
        border-radius: 5px;
    }

    .paginate_button {
        margin: 0 10px;
        cursor: pointer;
    }

    .dropdown-toggle::after {
        display: none;
    }
</style>

<div class="main-content">

    <!-- vertica sidebar start -->
    <div class="vertical-sidebar" id="slideNav">
        @include('layouts.blogger_sidebar')
    </div>
    <!-- vertica sidebar ends  -->


    <!-- content-right start -->
    <div class="content-right" id="contentWidth">

        <!-- top navbar start -->
        @include('layouts.logged_in_navbar')
        <!-- top navbar ends  -->

        <!-- Edit area start -->
        <div class="edit-area">
            <div class="container">
                <div class="row mt-5 mb-3">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4 class="d-inline-block float-start">All Products</h4>

{{--                        <a href="#" class="btn btn-primary d-inline-block float-end" data-bs-toggle="modal"--}}
{{--                           data-bs-target="#addNewProduct">Add New</a>--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="product-list card-body">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-bordered" id="sortTable"
                                           data-order='[[ 0, "desc" ]]'>
                                        <thead>
                                        <tr style="font-size: 13px">
                                            <th>PID</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Link</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($products as $key => $product)
                                            <tr style="vertical-align: middle;font-size: 13px">
                                                <td class="text-center">{{++$key}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{substr($product->product_details,0,80)}}...</td>
                                                <td class="text-center">
                                                    <img src="{{asset('upload/blogger_product')}}/{{$product->image}}"
                                                         alt="" width="50px" height="auto">
                                                </td>
                                                <td>{{$product->link}}</td>
                                                <td>
                                                    <p>{{$product->created_at->diffForHumans()}}</p>
                                                    <p style="font-size: 12px">{{date('d-m-Y', strtotime($product->created_at))}}</p>
                                                </td>
                                                <td>
                                                    @if($product->status == 'active' AND $product->post_id != null)
                                                        <p class="text-success text-capitalize">{{$product->status}}</p>
                                                    @elseif($product->status == 'active' AND $product->post_id == null)
                                                        <p class="text-warning text-capitalize">Not Used</p>
                                                    @else
                                                        <p class="text-danger text-capitalize">{{$product->status}}</p>
                                                    @endif
                                                </td>
                                                <td class="dropdown text-center">
                                                    <a href="0" class="dropdown-toggle" type="button"
                                                       id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                       aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                               data-bs-target="#view-{{$product->id}}">View</a></li>
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                               data-bs-target="#edit-{{$product->id}}">Edit</a></li>
                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            <!-- View Modal -->
                                            <div class="modal fade" id="view-{{$product->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel-{{$product->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel-{{$product->id}}">{{$product->product_name}}</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img
                                                                src="{{asset('upload/blogger_product')}}/{{$product->image}}"
                                                                alt="">

                                                            <p class="my-3 mb-0">{{$product->product_name}}</p>
                                                            <span
                                                                style="font-size: 13px">{{$product->created_at->diffForHumans()}}</span>
                                                            <p class="mt-4">{{$product->product_details}}</p>
                                                            <p class="mt-4">{{$product->link}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="edit-{{$product->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel-{{$product->id}}"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Edit
                                                                Product</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('blogger.blog.product.update')}}"
                                                              method="post" id="bloggerProductFormEdit"
                                                              enctype="multipart/form-data">
                                                            @csrf @method('post')
                                                            <div class="modal-body">
                                                                <input type="hidden" value="{{Auth::user()->id}}"
                                                                       name="id">
                                                                <input type="hidden" value="{{$product->id}}"
                                                                       name="product_id">
                                                                <label for="name">Product Name</label>
                                                                <input type="text" name="name"
                                                                       id="name-edit{{$product->id}}"
                                                                       class="form-control"
                                                                       placeholder="write product name.."
                                                                       value="{{$product->product_name}}">
                                                                <br>
                                                                <label for="details">Product Details</label>
                                                                <textarea type="text" name="details"
                                                                          id="details-edit{{$product->id}}"
                                                                          class="form-control"
                                                                          placeholder="write in details.."
                                                                          rows="4">{{$product->product_details}}</textarea>
                                                                <br>
                                                                <label for="link">Product Link</label>
                                                                <input type="url" name="link"
                                                                       id="link-edit{{$product->id}}"
                                                                       class="form-control" placeholder="enter a link.."
                                                                       value="{{$product->link}}">
                                                                <br>
                                                                <div class="post-image">
                                                                    <p><input type="file" accept="image/*" name="image"
                                                                              id="file-edit"
                                                                              onchange="productImageEdit(event)"
                                                                              style="display: none;"></p>
                                                                    <p class="text-center" id="image-label-edit"><label
                                                                            for="file-edit"
                                                                            style="cursor: pointer;"><i
                                                                                class="fas fa-camera"></i> Change Image</label>
                                                                    </p>
                                                                    <p id="image-box-edit"><img
                                                                            src="{{asset('upload/blogger_product')}}/{{$product->image}}"
                                                                            id="output-edit" width="100%"
                                                                            height="auto"/></p>
                                                                    <p id="remove-image-edit" class="text-center"
                                                                       onclick="removeProductImageEdit(event)"
                                                                       style="display: none;cursor: pointer">Remove
                                                                        image</p>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-block">
                                                                @if($product->status == 'active')
                                                                    <a href="{{route('blogger.blog.product.draft',$product->id)}}"
                                                                       class="btn btn-primary d-inline-block float-start">Draft</a>
                                                                @else
                                                                    <a href="{{route('blogger.blog.product.undraft',$product->id)}}"
                                                                       class="btn btn-primary d-inline-block float-start">Publish</a>
                                                                @endif
                                                                <div class="d-inline-block float-end">
                                                                    <button id="modal_close-edit" type="button"
                                                                            class="btn btn-secondary mr-"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Update
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="8">No Product Available</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit area ends  -->

        <!-- footer area start -->
    @include('layouts.logged_in_footer')
    <!-- footer area ends  -->

    </div>
    <!-- content-right start -->
</div>

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
                    <input type="text" name="name" id="name" class="form-control" placeholder="write product name..">
                    <br>
                    <label for="details">Product Details</label>
                    <textarea type="text" name="details" id="details" class="form-control"
                              placeholder="write in details.." rows="4"></textarea>
                    <br>
                    <label for="link">Product Link</label>
                    <input type="url" name="link" id="link" class="form-control" placeholder="enter a link..">
                    <br>
                    <div class="post-image">
                        <p><input type="file" accept="image/*" name="image" id="file"
                                  onchange="productImage(event)" style="display: none;"></p>
                        <p class="text-center" id="image-label"><label for="file"
                                                                       style="cursor: pointer;"><i
                                    class="fas fa-camera"></i> Set Image</label></p>
                        <p id="image-box" style="display: none"><img id="output" width="100%" height="auto"/></p>
                        <p id="remove-image" class="text-center" onclick="removeProductImage(event)"
                           style="display: none;cursor: pointer">Remove image</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="modal_close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                    </button>
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- optional js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{asset('backend/assets/js/vendors.min.js')}}"></script>
<script src="{{asset('backend/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/assets/js/jquery-ui.js')}}"></script>
<script src="{{asset('backend/assets/js/swiper.min.js')}}"></script>
<script src="{{asset('backend/assets/js/lightcase.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('backend/assets/js/function.js')}}"></script>

<script>
    // mobile menu responsive
    function menuAnimation(x) {
        x.classList.toggle("change");
        var element = document.getElementById("slideNav");
        element.classList.toggle("navSlide");
        var contentFade = document.getElementById("contentWidth");
        contentFade.classList.toggle("changeWidth");
    }

    // change content width
    function topNav(x) {
        x.classList.toggle("change");
        var element = document.getElementById("topList");
        element.classList.toggle("top-list");
    }
</script>

<script>
    $('#sortTable').DataTable();
</script>

<script>
    productImage = function (event) {
        // Product image
        document.getElementById('image-box').style.display = 'block';
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-label').style.display = 'none';
        document.getElementById('remove-image').style.display = 'block';
    };

    removeProductImage = function (event) {
        var imageInput = document.getElementById('file');
        imageInput.value = "";
        var image = document.getElementById('output');
        image.src = "";

        document.getElementById('image-box').style.display = 'none';
        document.getElementById('image-label').style.display = 'block';
        document.getElementById('remove-image').style.display = 'none';
    }

    // Edit Product
    productImageEdit = function (event) {
        // Product image
        document.getElementById('image-box-edit').style.display = 'block';
        var image = document.getElementById('output-edit');
        image.src = URL.createObjectURL(event.target.files[0]);
        document.getElementById('image-label-edit').style.display = 'none';
        document.getElementById('remove-image-edit').style.display = 'block';
    };

    removeProductImageEdit = function (event) {
        var imageInput = document.getElementById('file-edit');
        imageInput.value = "";
        var image = document.getElementById('output-edit');
        image.src = "";

        document.getElementById('image-box-edit').style.display = 'none';
        document.getElementById('image-label-edit').style.display = 'block';
        document.getElementById('remove-image-edit').style.display = 'none';
    }
</script>

<script>
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

                    document.getElementById('image-box').style.display = 'none';
                    document.getElementById('image-label').style.display = 'block';
                    document.getElementById('remove-image').style.display = 'none';

                    setTimeout(location.reload.bind(location), 1500);
                }
            }
        })
    });
</script>

{{--Edit--}}
{{--<script>--}}
{{--    $('#bloggerProductFormEdit').on('submit', function (event) {--}}
{{--        event.preventDefault();--}}
{{--        $.ajax({--}}
{{--            url: '{{route('blogger.blog.product.update')}}',--}}
{{--            method: 'post',--}}
{{--            data: new FormData(this),--}}
{{--            dataType: 'json',--}}
{{--            contentType: false,--}}
{{--            cache: false,--}}
{{--            processData: false,--}}
{{--            success: function (data) {--}}
{{--                if (data.error) {--}}
{{--                    var error_html = '';--}}
{{--                    for (var count = 0; count < data.error.length; count++) {--}}
{{--                        error_html += '<p>' + data.error[count] + '</p>';--}}
{{--                    }--}}
{{--                    toastr.error(error_html);--}}
{{--                } else {--}}
{{--                    $("#modal_close-edit").click();--}}
{{--                    toastr.success(data.success);--}}

{{--                    document.getElementById("bloggerProductFormEdit").reset();--}}

{{--                    document.getElementById('image-box-edit').style.display = 'none';--}}
{{--                    document.getElementById('image-label-edit').style.display = 'block';--}}
{{--                    document.getElementById('remove-image-edit').style.display = 'none';--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--    });--}}
{{--</script>--}}

<script>
    @if(Session::has('success'))
        var type="{{Session::get('alert-type','success')}}"
        toastr.success("{{ Session::get('success') }}");
    @endif
</script>
</body>
</html>
