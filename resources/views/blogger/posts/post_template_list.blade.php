@extends('layouts.blogger_loggedin_app')

@section('content')
    <style>
        .item-thumb {
            overflow: hidden;
            box-sizing: border-box;
            position: relative
        }

        .item-thumb .buttons {
            position: absolute;
            top: 20px;
            left: 0;
            display: none;
        }

        .blog-item:hover .item-thumb .buttons {
            display: block;
        }
    </style>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center"> Get Inspiration</h3>
                    <h4 class="text-center" style="color: darkgrey">See templates from all kinds of blog posts that fits
                        your needs</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- common blog area start -->
    <section class="blog-area my-5">
        <div class="container-fluid">
            <div class="section-wrapper">
                <div class="row justify-content-center gx-5">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="blog-wrapper">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h4 class="d-inline-block">For Image Post</h4>
                                    <a class="d-inline-block float-end btn btn-dark text-dark"
                                       style="background-color: lightgrey" href="">See All</a>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="blog-item">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="rounded" alt="">
                                            <div class="buttons text-center">
                                                <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.1')}}">Apply</a>
                                                <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 1])}}">Preview</a>
                                            </div>
                                        </div>
                                        <div class="blog-text mt-2 text-center">
                                            <h5>Template 1</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-sm-0">
                                    <div class="blog-item">
                                        <div class="item-thumb">
                                            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                 class="rounded" alt="">
                                            <div class="buttons text-center">
                                                <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.2')}}">Apply</a>
                                                <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 2])}}">Preview</a>
                                            </div>
                                        </div>
                                        <div class="blog-text mt-2 text-center">
                                            <h5>Template 2</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.3')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 3])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 3</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row mt-5 gx-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.4')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 4])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 4</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-sm-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.5')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 5])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 5</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.image.index.6')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'image','id' => 6])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 6</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="blog-wrapper">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <h4 class="d-inline-block">For Video Post</h4>
                                    <a class="d-inline-block float-end btn btn-dark text-dark"
                                       style="background-color: lightgrey" href="">See All</a>
                                </div>
                            </div>
                            <div class="row gx-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.1')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 1])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 1</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-sm-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.2')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 2])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 2</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.3')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 3])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 3</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row mt-5 gx-3">
                                <div class="col-md-4 col-sm-6 col-12">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.4')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 4])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 4</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-sm-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.5')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 5])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 5</h5>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">
                                        <div class="blog-item">
                                            <div class="item-thumb">
                                                <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}"
                                                     class="rounded" alt="">
                                                <div class="buttons text-center">
                                                    <a class="btn btn-secondary btn-sm" href="{{route('blogger.blog.post.video.index.6')}}">Apply</a>
                                                    <a class="btn btn-sm bg-white text-dark mt-2" href="{{route('blogger.blog.post.templates.preview',['type' => 'video','id' => 6])}}">Preview</a>
                                                </div>
                                            </div>
                                            <div class="blog-text mt-2 text-center">
                                                <h5>Template 6</h5>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- common blog area ends  -->
@endsection
