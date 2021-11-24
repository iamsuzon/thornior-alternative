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
    select {
        color: #9e9e9e;
    }
    option:not(:first-of-type) {
        color: black;
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
                    <h5>Step 2 of 4</h5>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 80px">
            <div class="col-12">
                <div class="titles text-center">
                    <h3>Which country are you from?</h3>
                    <h5 style="color: darkgrey">You can change it later</h5>
                </div>
                <form class="form mt-5" action="{{route('blogger.blog.create.step2')}}" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-4 text-center">
                            @csrf
                            @include('layouts.countries')

                            <button class="btn btn-success mt-5 px-4">Next ></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- banner area ends  -->


<!-- optional js -->
@include('layouts.all_scripts')

</body>
</html>
