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
    .button-wrap {
        position: relative;
        text-align: center;
        top: 50%;
        margin-top: -2.5em;
    }

    @media (max-width: 40em) {
        .button-wrap {
            margin-top: -1.5em;
        }
    }

    .button-label {
        display: inline-block;
        padding: 5px 35px;
        padding-bottom: 0;
        margin: 0.5em;
        cursor: pointer;
        color: grey;
        border: 2px solid grey;
        border-radius: 5px;
        background: transparent;
        transition: 0.3s;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .button-label h1 {
        font-size: 1em;
        color: grey;
        font-family: "Lato", sans-serif;
    }

    .button-label:hover {
        background: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    .button-label:hover h1 {
        color: #FFFFFF;
    }

    .button-label:active {
        transform: translateY(2px);
    }

    @media (max-width: 40em) {
        .button-label {
            padding: 0em 1em 3px;
            margin: 0.25em;
        }
    }

    #yes-button:checked + .button-label {
        background: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    #yes-button:checked + .button-label h1 {
        color: #FFFFFF;
    }

    #yes-button:checked + .button-label:hover {
        background: #000000;
        color: #e2e2e2;
    }

    #no-button:checked + .button-label {
        background: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    #no-button:checked + .button-label h1 {
        color: #FFFFFF;
    }

    #no-button:checked + .button-label:hover {
        background: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    #maybe-button:checked + .button-label {
        background: #000000;
        color: #FFFFFF;
        border-color: #000000;
    }

    #maybe-button:checked + .button-label h1 {
        color: #FFFFFF;
    }

    #maybe-button:checked + .button-label:hover {
        background: #000000;
        color: #FFFFFF;
    }

    .hidden {
        display: none;
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
                    <h5>Step 3 of 4</h5>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 80px">
            <div class="col-12">
                <div class="titles text-center">
                    <h3>How often do you plan to post?</h3>
                    <h5 style="color: darkgrey">You can change it later</h5>
                </div>
                <form action="{{route('blogger.blog.create.step3')}}" method="POST" class="form mt-5">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-8 text-center">
                            <div class="container">
                                <div class="button-wrap mt-4">
                                    <input class="hidden radio-label" type="radio" name="howpost" id="yes-button"/>
                                    <label class="button-label" for="yes-button">
                                        <h1>5 posts / week</h1>
                                    </label>
                                    <input class="hidden radio-label" type="radio" name="howpost" id="no-button"/>
                                    <label class="button-label" for="no-button">
                                        <h1>1 posts / week</h1>
                                    </label>
                                    <input class="hidden radio-label" type="radio" name="howpost"
                                           id="maybe-button"/>
                                    <label class="button-label" for="maybe-button">
                                        <h1>1 posts / month</h1>
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-5 px-4">Next ></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- banner area ends  -->


<!-- optional js -->
@include('layouts.all_styles')

</body>
</html>
