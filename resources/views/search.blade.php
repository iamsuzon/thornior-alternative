<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- All Styles -->
    @include('layouts.all_styles')

    <title>Thornior</title>
</head>
<body>

<!-- header area start -->
@include('layouts.home_navbar')
<!-- header area ends  -->

<!-- page header area start -->
<section class="page-header style-one style-two">
    <div class="overlay"></div>
    <div class="container">
        <div class="header-content">
            <h2>Search</h2>
            @if(isset($search_data))
                <p>Search result for {{$search_query}}</p>
            @else
                <p>no Search result found for {{$search_query}}</p>
            @endif
        </div>
    </div>
</section>
<!-- page header area ends  -->

<!-- blog card area start -->
@if(isset($blogs) AND !$blogs->isEmpty())
    <section class="blog-card mt-4 pt-0">
        <div class="container">
            <div class="section-wrapper">
                <div class="section-header">
                    <h3>Blogs</h3>
                    <hr style="height: 3px;margin-top: 8px;background-color: #000000">
                </div>
            </div>

            <div class="section-wrapper">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                            <div class="card" style="border: 1px solid lightgray">
                                <a href="{{route('blog',$blog->blog_slug)}}">
                                    <div class="card-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blogger->image}}"
                                             alt="bloger1">
                                    </div>
                                    <div class="card-text">
                                        <h4>{{$blog->blog_name}}</h4>
                                        <p style="font-size: 13px;text-transform: lowercase">
                                            @ {{$blog->blogger->name}}</p>
                                        <p>@if($blog->about==null) Have a tour from my amazing blog. Just click on my
                                            name or photo @else {{$creator->about}} @endif</p>
                                    </div>
                                </a>
                                <div class="card-media">
                                    <ul class="media-list">
                                        <li><a href="#0"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="#0"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#0"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#0"><i class="fab fa-google"></i></a></li>
                                        <li><a href="#0"><i class="fab fa-behance"></i></a></li>
                                        <li><a href="#0"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
<!-- blog card area  ends -->

@if(isset($search_data) AND !empty($search_data))
    <section class="viewed-blog padding-tb mt-4 pt-0">
        <div class="container">
            <div class="section-wrapper">
                <div class="section-header">
                    <h3>Posts</h3>
                    <hr style="height: 3px;margin-top: 8px;background-color: #000000">
                </div>
            </div>

            <div class="section-wrapper my-2">
                <div class="row">
                    @foreach($search_data as $post)
                        <div class="col-md-3 col-sm-12">
                            <div class="blog-item style-one">
                                <div class="item-thumb">
                                    <img src="{{asset($post->medias[0]->address)}}" alt=""
                                         style="height: 180px">
                                    @if(isset($post->video))
                                        <div class="video-btn">
                                            <a href="{{route('post.show',['template_type' => $post->post_type , 'slug' => $post->slug])}}">
                                                <i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                <div class="blog-text">
                                    <div class="blog-cat">
                                    <span
                                        class="bg-dark text-white">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach</span>
                                    </div>
                                    <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                        <h5>{{substr($post->title, 0, 80)}}</h5>
                                    </a>
                                </div>
                                <div class="blog-timeline">
                                    <div class="bloger-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt=""
                                             style="width: 25px;height: 25px">
                                    </div>
                                    <div class="time-line">
                                        <span class="border-end pe-2"
                                              style="font-size: 13px">{{substr($post->blogger->blog->blog_name,0,10)}}{{strlen($post->blogger->blog->blog_name)>10 ? '..' : ''}}</span>
                                        <span style="font-size: 13px">{{$post->created_at->diffForHumans()}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif

<!-- Footer -->
@include('layouts.footer')

<!-- All JS -->
@include('layouts.all_scripts')

<script>
    $(document).ready(function () {
        // $('.see-more-about').on('click', activaTab('tabs-5'));
        activaTab('tabs-5')
    });

    function activaTab(tab) {
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    };
</script>
</body>
</html>
