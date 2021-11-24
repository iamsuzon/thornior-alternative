<!-- about area start -->
<section class="about-area style-one">
    <div class="container">
        <div class="section-wrapper">
            <div class="row">
                <div class="col-10">
                    <div class="about-content">
                        <div class="content-inner">
                            <h3>{{$blog->blog_about->title}}</h3>
                            <p class="pb-3">{{$blog->blog_about->description}}</p>
                        </div>
                    </div>
                    <div class="about-thumb">
                        <img src="{{asset('upload/blogger/blog')}}/{{$blog->blog_about->image}}" alt="">
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
