<!-- about area start -->
<section class="about-area style-two">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                    <div class="about-thumb">
                        <img src="{{asset('upload/blogger/blog')}}/{{$blog->blog_about->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-10">
                    <div class="about-content">
                        <div class="content-inner">
                            <h3>{{$blog->blog_about->title}}</h3>
                            <p class="pb-3">{{$blog->blog_about->description}}</p>
                        </div>
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
