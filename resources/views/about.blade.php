<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- about area start -->
<section class="about-area">
    <div class="container">
        <div class="section-wrapper">
            <div class="row">
                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                    <div class="about-content">
                        <h2>Thornior</h2>
                        <p class="pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, nesciunt at consequuntur commodi cupiditate iusto? Ad neque facere, doloremque iste impedit similique. Minima, ex dolores?</p>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Assumenda voluptatum minima molestiae. Dolorum, unde odit?</p>
                    </div>
                </div>
                <div class="col-lg-6 col-10">
                    <div class="about-thumb">
                        <img src="{{asset('backend/assets/images/about/01.jpg')}}" alt="">
                        <div class="follow-ours">
                            <ul class="social-link">
                                <li><a href="#0"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                            <div class="follow-text">
                                <p>Follow Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about area ends  -->

<!-- about contact area start -->
<section class="about-contact">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-4 offset-lg-1 col-md-6 col-12">
                    <div class="about-form m-2">
                        <form action="">
                            <div class="form-header text-center pb-4">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="input-group mb-4">
                                <!-- <label for="fullName">Name</label> -->
                                <input type="text" name="name" class="form-control" id="fullName" placeholder="name">
                            </div>
                            <div class="input-group mb-4">
                                <!-- <label for="userEmail">Email</label> -->
                                <input type="email" name="email" class="form-control" id="userEmail" placeholder="Email">
                            </div>
                            <div class="input-group mb-4">
                                <!-- <label for="fullName"></label> -->
                                <textarea class="form-control" id="userMessage" placeholder="Wright here ..."></textarea>
                            </div>
                            <div class="input-btn text-center">
                                <button type="submit" class="btn w-50"><span>Submit</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6 col-12">
                    <div class="about-content">
                        <h2>About</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam et vel hic, eligendi laudantium quis dolore! Alias praesentium et dolorem!</p>
                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur dolores vero cum harum distinctio voluptate, commodi a voluptatum fuga maiores!</h5>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. At eius ab rem autem dolores cumque maxime beatae ipsam, mollitia impedit quidem maiores, sint, aspernatur deserunt!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about contact area ends  -->

<!-- footer area star -->
<footer class="border-top pt-5">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-md-between justify-content-center">
            <div class="footer-menu">
                <ul class="menulist list-unstyled d-flex align-items-center p-0 m-0">
                    <li class="me-3"><a href="{{route('index')}}">Home</a></li>
                    <li class="me-3"><a href="{{route('about')}}">About</a></li>
                    <li class="me-3"><a href="{{route('blogs')}}">Creators</a></li>
                    <li><a href="{{route('about')}}">Contact</a></li>
                    <li><a href="#0">Contact</a></li>
                </ul>
            </div>
            <div class="social-link pt-3 pt-md-0">
                <ul class="media-list list-unstyled d-flex p-0 m-0">
                    <li class="me-3"><span>Follow us :</span></li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-facebook-f"></i>
                        <span>Facebook</span>
                    </li>
                    <li class="me-3 d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-pinterest-p"></i>
                        <span>Pinterest</span>
                    </li>
                    <li class="d-flex flex-wrap justify-content-center">
                        <i class="me-2 fab fa-instagram"></i>
                        <span>Instagram</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom mt-5">
        <div class="bottom-content bg-dark text-center pt-3 pb-3">
            <p class="m-0 text-white">&copy; Designed By <a href="#0" class="text-white font-bold">Thornior</a></p>
        </div>
    </div>
</footer>
<!-- footer area ends -->

<!-- All JS -->
@include('layouts.all_scripts')

</body>
</html>
