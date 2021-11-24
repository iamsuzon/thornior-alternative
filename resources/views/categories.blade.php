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

<!-- page header area start -->
<section class="page-header style-one">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>Category</h2>
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- categori slider start -->
<section class="categories style-one">
    <div class="container">
        <div class="section-wrapper">
            <div class="section-header text-center mb-3">
                <h3 class="text-uppercase" style="visibility: hidden">Categories</h3>
                <p class="text-uppercase" style="visibility: hidden">Explore all kind of interior</p>
            </div>
            <div class="categori-slider">
                <div class="swiper-wrapper">
                    @foreach($categories as $key => $category)
                        @if($key == 0)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/01.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 1)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/02.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 2)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/09.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 3)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/03.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 4)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/04.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 5)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/05.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 6)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/06.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 7)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/07.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 8)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/08.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 9)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/09.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 10)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/01.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @elseif($key == 11)
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/category/02.jpg')}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="swiper-slide">
                                <div class="categori-item">
                                    <a href="{{route('categories.selected', $category->slug)}}">
                                        <div class="item-thumb">
                                            @php $image_path = 'backend/assets/images/blog/category/0'. rand(1,9) .'.jpg' @endphp
                                            <img src="{{asset($image_path)}}" alt="">
                                        </div>
                                        <div class="item-text">
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Navigation -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
        </div>
    </div>
</section>
<!-- categori slider sends -->

<!-- category slider start -->
@foreach($categories as $category)
    @php $posts['all'] = array() @endphp
    <section class="latest-blog py-2 my-5">
        <div class="container">
            <div class="section-wrapper">
                <div class="section-header">
                    <a href="{{route('categories.selected',$category->slug)}}">
                        <h3 class="text-uppercase" style="font-size: 20px">{{$category->name}} <i class="fa fa-angle-right"></i></h3>
                    </a>
                    <!-- slider arrow -->
                    <div class="slider-arrow">
                        <div class="latest-button-prev prev">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="latest-button-next next">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                </div>

                @php
                    $posts['image'] = $category->image;
                    $posts['video'] = $category->video;

                    $post_index = 0;
                    $posts['posts'] = null;
                    foreach ($posts['image'] as $post) {
                        $posts['posts'][$post_index] = $post;
                        $post_index++;
                    }
                    foreach ($posts['video'] as $post) {
                        $posts['posts'][$post_index] = $post;
                        $post_index++;
                    }

                    $posts['all'] = collect($posts['posts'])->sortBy('created_at')->reverse();
                @endphp

                <div class="latest-blog-slider">
                    <div class="swiper-wrapper">
                        @forelse($posts['all'] as $post)
                                <div class="swiper-slide">
                                    <div class="blog-item style-one">
                                        <div class="item-thumb">
                                            <img src="{{asset($post->medias[0]->address)}}" alt=""
                                                 style="height: 200px">
                                            @if(isset($post->video))
                                                <div class="video-btn">
                                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                        <i class="fa fa-play"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="blog-text">
                                            <div class="blog-cat">
                                    <span>@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                            </div>
                                            <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                <h5>{{substr($post->title, 0, 80)}}</h5>
                                            </a>
                                        </div>
                                        <div class="blog-timeline">
                                            <div class="bloger-thumb">
                                                <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                     alt=""
                                                     style="width: 25px;height: 25px">
                                            </div>
                                            <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                                <span
                                                    style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            <p style="color: gray">No Post Available Right Now</p>
                        @endforelse
                    </div>
                    <!-- add progressbar -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    @php unset($posts) @endphp
@endforeach
<!-- category slider ends  -->

<!-- category-slider-one start -->
{{--<section class="category-slider">--}}
{{--    <div class="container">--}}
{{--        <div class="section-wrapper">--}}
{{--            <div class="row">--}}
{{--                @foreach($categories as $category)--}}
{{--                    @php $posts['all'] = array() @endphp--}}
{{--                    <div class="col-lg-12 col-md-12 col-12 @if($loop->index > 2) mt-4 @endif">--}}
{{--                        <a href="{{route('categories.selected',$category->slug)}}">--}}
{{--                            <div class="category-wrapper">--}}
{{--                                <div class="slide-header">--}}
{{--                                    <h4>{{$category->name}}</h4>--}}

{{--                                    @php $index = 1 @endphp--}}
{{--                                    @for($i=1; $i<=6; $i++)--}}
{{--                                        @php--}}
{{--                                            $relation = 'image_post_'.$i;--}}
{{--                                            $post = $category->$relation;--}}
{{--                                            if ($post->isEmpty() == false)--}}
{{--                                                {--}}
{{--                                                    $posts['image'][$index] = $post;--}}
{{--                                                    $index++;--}}
{{--                                                }--}}
{{--                                        @endphp--}}
{{--                                    @endfor--}}

{{--                                    @php $index = 1 @endphp--}}
{{--                                    @for($i=1; $i<=6; $i++)--}}
{{--                                        @php--}}
{{--                                            $relation = 'video_post_'.$i;--}}
{{--                                            $post = $category->$relation;--}}
{{--                                            if ($post->isEmpty() == false)--}}
{{--                                                {--}}
{{--                                                    $posts['video'][$index] = $post;--}}
{{--                                                    $index++;--}}
{{--                                                }--}}
{{--                                        @endphp--}}
{{--                                    @endfor--}}

{{--                                    @php $index = 1; @endphp--}}
{{--                                    @if(array_key_exists('image', $posts))--}}
{{--                                        @foreach($posts['image'] as $post)--}}
{{--                                            @php--}}
{{--                                                $posts['all'][$index] = $post;--}}
{{--                                                $index++;--}}
{{--                                            @endphp--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}

{{--                                    @if(array_key_exists('video', $posts))--}}
{{--                                        @foreach($posts['video'] as $post)--}}
{{--                                            @php--}}
{{--                                                $posts['all'][$index] = $post;--}}
{{--                                                $index++;--}}
{{--                                            @endphp--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}


{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus asperiores--}}
{{--                                        quidem blanditiis nihil dolore ullam.</p>--}}
{{--                                    @foreach($posts['all'] as $post)--}}
{{--                                        @foreach($post as $p)--}}
{{--                                            <p class="bg-danger text-dark">{{$p->title}}</p>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @php unset($posts) @endphp--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- category-slider-one ends  -->

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
