<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- font-awsome -->

    <title>Thornior</title>

    @include('layouts.all_styles')
</head>
<body>
<style>
    ::-webkit-input-placeholder {
        text-align: center;
    }

    :-moz-placeholder {
        text-align: center;
    }
    .blog-name-input{
        border-bottom: 2px solid darkgrey;
    }
</style>

<!-- header area start -->
<header>
    <div class="header-main">
        <div class="header-item">
            <div class="header-top">
                <div class="container">
                    <div class="top-item my-3">
                        <div class="top-logo">
                            <a href="#0">
                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="Thornior Logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area ends  -->

<!-- banner area start -->
<section class="banner-area" style="margin-top: 50px">
    <div class="container p-0">
        <div class="row">
            <div class="col-12">
                <div class="top-indicator text-center">
                    <h5>Step 1 of 4</h5>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 80px">
            <div class="col-12">
                <div class="titles text-center">
                    <h3>We start with the name of your blog</h3>
                    <h5 style="color: darkgrey">You can change it later</h5>
                </div>
                <div class="form mt-5">
                    <div class="row justify-content-center">
                        <div class="col-4 text-center">
                            <form action="{{route('blogger.blog.create.step1')}}" method="POST">
                                @csrf
                                <input class="blog-name-input form-control" type="text" name="blog_name" placeholder="Enter name, Shaynaalwnick" style="border-top: 0;border-left: 0;border-right: 0">
                                @if(Session::has('warning'))
                                    <p class="alert {{ Session::get('alert-class', 'alert-danger') }} p-2 mt-2">{{ Session::get('warning') }}</p>
                                @endif

                                <button type="submit" class="btn btn-success mt-5 px-4">Next ></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner area ends  -->


<!-- optional js -->
@include('layouts.all_scripts')

</body>
</html>
