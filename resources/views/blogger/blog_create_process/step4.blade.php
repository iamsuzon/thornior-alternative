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

    <title>Thornior</title>

    @include('layouts.all_styles')
</head>
<body>
<style>
    ul.ks-cboxtags {
        list-style: none;
        padding: 20px;
    }

    ul.ks-cboxtags li {
        display: inline;
        margin-left: 10px;
    }

    ul.ks-cboxtags li label {
        display: inline-block;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid rgba(139, 139, 139, .3);
        color: #adadad;
        border-radius: 5px;
        white-space: nowrap;
        margin: 3px 0px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
    }

    ul.ks-cboxtags li label {
        padding: 8px 12px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {

    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
        content: "";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label {
        border: 2px solid #000000;
        background-color: #000000;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        display: absolute;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
    }

    ul.ks-cboxtags li input[type="checkbox"]:focus + label {
        border: 2px solid darkgrey;
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
                    <h5>Step 4 of 4</h5>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 80px">
            <div class="col-12">
                <div class="titles text-center">
                    <h3>Which categories fit your content?</h3>
                    <h5 style="color: darkgrey">You can change it later</h5>
                </div>
                <form action="{{route('blogger.blog.create.step4')}}" method="POST" class="form mt-5">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-7 text-center">
                            <div class="container">
                                <ul class="ks-cboxtags">
                                    @foreach($categories as $category)
                                        <li><input type="checkbox" id="checkbox{{$category->id}}"
                                                   value="{{$category->id}}" name="categories[]"><label
                                                for="checkbox{{$category->id}}">{{$category->name}}</label></li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-success my-5 px-4">Next</button>
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
