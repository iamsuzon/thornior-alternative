@extends('layouts.blogger_loggedin_app')

@section('content')
    <!-- page header start -->
    <section class="blogger-page-header"
             @if((Auth::user()->blog->image != null)) style="background-image: url({{asset('upload/blogger/blog')}}/{{Auth::user()->blog->image}})"
             @else style="background-image: url({{asset('upload/blogger/blog/placeholder.jpg')}}" @endif>
        <div class="header-content">
            <span>@if(isset(Auth::user()->blog->region)) {{Auth::user()->blog->country->name}} @endif</span>
            <h3>{{Auth::user()->blog->blog_name}}</h3>
            <span class="update">{{Auth::user()->blog->updated_at->format('d M Y')}}</span>
            {{--            <button type="button" class="btn"><span>Create Mode</span></button>--}}
        </div>
    </section>
    <!-- page header ends  -->

    <!-- girid layout -->
    <div class="row grid-row">
        <div class="col-lg-9 col-12">
            <!-- setup blog start -->
            <section class="setup-blog">
                <div class="section-header">
                    <span>New</span>
                    <h3>Set Up Your Blog</h3>
                    <!-- slider arrow -->
                    <div class="slider-arrow">
                        {{--                        <div class="latest-button-prev prev">--}}
                        {{--                            <i class="fa fa-angle-left"></i>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="latest-button-next next">--}}
                        {{--                            <i class="fa fa-angle-right"></i>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="section-wrapper">
                    <div class="setup-slider">
                        <div class="swiper-wrapper">
                            <a href="{{route('blogger.blog.post.templates')}}" class="swiper-slide">
                                <div class="setup-item">
                                    <div class="item-left">
                                        <i class="fas fa-images"></i>
                                    </div>
                                    <div class="item-right">
                                        <h5>Create Image Post</h5>
                                        <span>Create Image Post</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('blogger.blog.post.templates')}}" class="swiper-slide">
                                <div class="setup-item">
                                    <div class="item-left">
                                        <i class="fas fa-photo-video"></i>
                                    </div>
                                    <div class="item-right">
                                        <h5>Create Video Mode</h5>
                                        <span>Create Video Mode</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{route('blogger.blog.product.index')}}" class="swiper-slide">
                                <div class="setup-item">
                                    <div class="item-left">
                                        <i class="fas fa-ad"></i>
                                    </div>
                                    <div class="item-right">
                                        <h5>Product Mode</h5>
                                        <span>Product Mode</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- setup blog ends  -->

            <!-- blog library start -->
            <section class="blog-libarary">
                @if (Session::has('success'))
                    <div class="alert alert-info">{{ Session::get('success') }}</div>
                @endif
                <div class="section-header">
                    <h3>Library</h3>
                </div>
                <div class="section-wrapper">
                    <div id="tabs">
                        <ul class="mb-4">
                            <li><a href="#tabs-1">Overview</a></li>
                            <li><a href="#tabs-2">Post</a></li>
                            <li><a href="#tabs-3">Category</a></li>
                            <li><a href="#tabs-4">Videos</a></li>
                        </ul>
                        <div id="tabs-1" class="bloger-tabs">
                            <div class="row">
                                @if(isset($posts) AND array_key_exists('posts',$posts))
                                    @forelse($posts['posts'] as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 mt-4 mt-sm-0">
                                            <div class="blog-item">
                                                <div class="item-thumb">
                                                    <img src="{{asset($post->medias[0]->address)}}"
                                                         alt="" style="width: 100%;height: 200px">
                                                    @if(isset($post->video))
                                                        <div class="video-btn">
                                                            <a href="{{route('blogger.blog.post.'.$post->post_type.'.show.'.$post->template_id,$post->slug)}}">
                                                                <i class="fa fa-play"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="item-content">
                                                    <div class="cato-content">
                                                    <span
                                                        class="cat-btn text-capitalize">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                            +{{$post->categories->count()-1}}
                                                            more @break @endif  @endforeach</span>
                                                        <span>
                                                            <a id="dropdownMenuButton{{$post->slug}}" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$post->slug}}">
                                                                <li>
                                                                    <form action="{{route('blogger.blog.post.video.delete', $post->slug)}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="blogger_id" value="{{$post->blogger_id}}">
                                                                        <input type="hidden" name="template_type" value="{{$post->post_type}}">
                                                                        <input type="hidden" name="template_id" value="{{$post->template_id}}">
                                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                                        <button type="submit" class="dropdown-item" style="font-size: 15px">Delete</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                    <p>{{substr($post->title,0,60)}}{{((strlen($post->title)) > 60) ? '...' : ''}}</p>
                                                </div>
                                                <div class="hover-content text-center">
                                                    <a href="{{route('blogger.blog.post.'.$post->post_type.'.show.'.$post->template_id,$post->slug)}}"
                                                       type="button" class="px-2 btn bg-white"><span
                                                            class="text-dark">Show</span></a>
                                                    <a href="{{route('blogger.blog.post.'.$post->post_type.'.edit.'.$post->template_id,$post->id)}}"
                                                       type="button" class="px-2 btn"><span>Edit</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No Post Available</p>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        <div id="tabs-2" class="bloger-tabs">
                            <div class="row">
                                @if(isset($posts) AND array_key_exists('image',$posts))
                                    @forelse($posts['image'] as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 mt-4 mt-sm-0">
                                            <div class="blog-item">
                                                <div class="item-thumb">
                                                    <img src="{{asset($post->medias[0]->address)}}"
                                                         alt="" style="width: 100%;height: 200px">
                                                </div>
                                                <div class="item-content">
                                                    <div class="cato-content">
                                                    <span
                                                        class="cat-btn text-capitalize">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                            +{{$post->categories->count()-1}}
                                                            more @break @endif  @endforeach</span>
                                                        <span><i class="fas fa-ellipsis-h"></i></span>
                                                    </div>
                                                    <p>{{substr($post->title,0,60)}}{{((strlen($post->title)) > 60) ? '...' : ''}}</p>
                                                </div>
                                                <div class="hover-content text-center">
                                                    <a href="{{route('blogger.blog.post.'.$post->post_type.'.show.'.$post->template_id,$post->slug)}}"
                                                       type="button" class="px-2 btn bg-white"><span
                                                            class="text-dark">Show</span></a>
                                                    <a href="{{route('blogger.blog.post.'.$post->post_type.'.edit.'.$post->template_id,$post->id)}}"
                                                       type="button" class="px-2 btn"><span>Edit</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No Post Available</p>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        <div id="tabs-3">
                            <div class="row">
                                @if(isset($posts['categories']))
                                    @forelse($posts['categories']->unique('category_id') as $category)
                                        <div class="col-lg-3 col-md-3 col-sm-6 mt-4">
                                            <div class="card border-0 shadow-sm">
                                                <div class="card-body">
                                                    <h4 class="text-uppercase text-center m-0">
                                                        <a href="#" data-bs-toggle="modal"
                                                           data-bs-target="#exampleModal{{$category->id}}">{{$category->name}}</a>
                                                    </h4>

                                                    <div class="modal fade" id="exampleModal{{$category->id}}"
                                                         tabindex="-1" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">{{$category->name}}</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @foreach($category_post as $post)
                                                                            @if($post->category_id != $category->id)
                                                                                @continue
                                                                            @endif
                                                                            <div class="card @if($loop->index != 0) mt-4 @endif">
                                                                                <div class="card-body p-0">
                                                                                    <div class="row">
                                                                                        <div class="col-3">
                                                                                            <div class="image" style="width: 100%;height: 100%">
                                                                                                <img src="{{asset($post->medias[0]->address)}}" alt="" style="width: 100%;height: 100%">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-7">
                                                                                            <div class="text pt-4">
                                                                                                <h4>{{$post->title}}</h4>
                                                                                                <p>@if(isset($post->intro_description)) {{substr($post->intro_description,0,100)}} @else {{substr($post->outro_description,0,100)}} @endif</p>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-2">
                                                                                            <div class="timestamp pt-4">
                                                                                                <p>{{$post->created_at->diffForHumans()}}</p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                @endif
                            </div>
                        </div>
                        <div id="tabs-4">
                            <div class="row">
                                @if(isset($posts) AND array_key_exists('video',$posts))
                                    @forelse($posts['video'] as $video)
                                        <div class="col-lg-4 col-md-4 col-sm-6 mt-4 mt-sm-0">
                                            <div class="blog-item">
                                                <div class="item-thumb">
                                                    <img src="{{asset($video->medias[0]->address)}}"
                                                         alt="" style="width: 100%;height: 200px">
                                                    <div class="video-btn">
                                                        <a href="{{route('blogger.blog.post.'.$video->post_type.'.show.'.$video->template_id,$video->slug)}}">
                                                            <i class="fa fa-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="item-content">
                                                    <div class="cato-content">
                                                    <span
                                                        class="cat-btn text-capitalize">@foreach($video->categories as $category) {{$category->name}} @if($video->categories->count() > 1)
                                                            +{{$video->categories->count()-1}}
                                                            more @break @endif  @endforeach</span>
                                                        <span>
                                                            <a id="dropdownMenuButton{{$video->slug}}" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer"><i class="fas fa-ellipsis-h"></i></a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$video->slug}}">
                                                                <li>
                                                                    <form action="{{route('blogger.blog.post.video.delete',$video->slug)}}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="blogger_id" value="{{$video->blogger_id}}">
                                                                        <input type="hidden" name="template_type" value="{{$video->post_type}}">
{{--                                                                        <input type="hidden" name="template_id" value="{{$video->template_id}}">--}}
{{--                                                                        <input type="hidden" name="post_id" value="{{$video->slug}}">--}}
                                                                        <button type="submit" class="dropdown-item" style="font-size: 15px">Delete</button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                    <p>{{substr($video->title,0,60)}}{{((strlen($video->title)) > 60) ? '...' : ''}}</p>
                                                </div>
                                                <div class="hover-content text-center">
                                                    <a href="{{route('blogger.blog.post.'.$video->post_type.'.show.'.$video->template_id,$video->slug)}}"
                                                       type="button" class="px-2 btn bg-white"><span
                                                            class="text-dark">Show</span></a>
                                                    <a href="{{route('blogger.blog.post.'.$video->post_type.'.edit.'.$video->template_id,$video->slug)}}"
                                                       type="button" class="px-2 btn"><span>Edit</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">No Post Available</p>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- blog library ends  -->
        </div>
        <div class="col-lg-3 col-md-7 col-sm-8 col-12">
            <div class="blog-wizard">
                <div class="wizard-title">
                    <h4>Commets</h4>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">See All</a>
                </div>
                <div class="wizard-body">
                    {{--                    <div class="blog-item border-bottom">--}}
                    {{--                        <div class="blog-thumb">--}}
                    {{--                            <img src="assets/images/blog/latest/02.jpg" alt="">--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-text">--}}
                    {{--                            <h5>Look into the exclusive dream house in the ...</h5>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="blog-timeline">--}}
                    {{--                            <div class="time-line">--}}
                    {{--                                <span class="border-end pe-2">Mona Luna Litland</span>--}}
                    {{--                                <span>5 Days ago</span>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    <div class="comments-reply">
                        <ul class="reply-list">
                            @if(isset($posts['comments']))
                                @forelse($posts['comments'] as $comment)
                                    <li>
                                        <div class="repl-thumb">
                                            @if($comment->user_type == 'blogger')
                                                <img
                                                    src="{{asset('upload/blogger/avatar')}}/{{$comment->blogger->image}}"
                                                    alt="">
                                            @elseif($comment->user_type == 'web')
                                                <img src="{{asset('upload/user/avatar')}}/{{$comment->user->image}}"
                                                     alt="">
                                            @endif
                                        </div>
                                        <div class="repl-text">
                                            @php $relation = $comment->template_type.'_post_'.$comment->template_id @endphp
                                            @if($comment->user_type == 'blogger')
                                                <h6>{{$comment->blogger->name}}</h6>
                                                <p>{{$comment->comment}}</p>
                                                <a href="{{route('post.show',['template_type' => $comment->template_type ,'template_id' => $comment->template_id,'slug' => $comment->$relation->slug])}}">
                                                    <span><i class="fa fa-comment-alt"></i></span><span>Reply</span>
                                                </a>
                                            @elseif($comment->user_type == 'web')
                                                <h6>{{$comment->user->name}}</h6>
                                                <p>{{$comment->comment}}</p>
                                                <a href="{{route('post.show',['template_type' => $comment->template_type ,'template_id' => $comment->template_id,'slug' => $comment->$relation->slug])}}">
                                                    <span><i class="fa fa-comment-alt"></i></span><span>Reply</span>
                                                </a>
                                            @endif
                                        </div>
                                    </li>
                                    @if($loop->index == 4)
                                        @break
                                    @endif
                                @empty
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">All Comments</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <style>
                                    .modal-reply-list li {
                                        list-style: none;
                                        width: 100%;
                                    }

                                    .modal-reply-list li .repl-thumb {
                                        width: 15%;
                                        display: inline-block;
                                        vertical-align: top;
                                    }

                                    .modal-reply-list li .repl-thumb img {
                                        height: 50px;
                                        width: 50px;
                                        border-radius: 100%;
                                    }

                                    .modal-reply-list li .repl-text {
                                        display: inline-block;
                                        padding-left: 15px;
                                        width: 75%;
                                    }

                                </style>
                                <ul class="modal-reply-list">
                                    @if(isset($posts['comments']))
                                        @forelse($posts['comments'] as $comment)
                                            <li @if($loop->index > 0) class="mt-4" @endif>
                                                <div class="repl-thumb">
                                                    @if($comment->user_type == 'blogger')
                                                        <img
                                                            src="{{asset('upload/blogger/avatar')}}/{{$comment->blogger->image}}"
                                                            alt="">
                                                    @elseif($comment->user_type == 'web')
                                                        <img
                                                            src="{{asset('upload/user/avatar')}}/{{$comment->user->image}}"
                                                            alt="">
                                                    @endif
                                                </div>
                                                <div class="repl-text">
                                                    @php $relation = $comment->template_type.'_post_'.$comment->template_id @endphp
                                                    @if($comment->user_type == 'blogger')
                                                        <h6 style="margin: 0">@if($comment->blogger->id == Auth::id())
                                                                You @else {{$comment->blogger->name}} @endif <span
                                                                style="font-weight: 400">commented on your post</span>
                                                        </h6>
                                                        <p>{{$comment->comment}} - <span
                                                                style="font-weight: 400">{{$comment->created_at->diffForHumans()}}</span>
                                                        </p>
                                                        <a href="{{route('post.show',['template_type' => $comment->template_type ,'template_id' => $comment->template_id,'slug' => $comment->$relation->slug])}}">
                                                            <span><i class="fa fa-comment-alt"></i></span><span
                                                                style="margin-left: 5px">Reply</span>
                                                        </a>
                                                    @elseif($comment->user_type == 'web')
                                                        <h6 style="margin: 0">{{$comment->user->name}} <span
                                                                style="font-weight: 400">commented on your post</span>
                                                        </h6>
                                                        <p>{{$comment->comment}} - <span></span></p>
                                                        <a href="{{route('post.show',['template_type' => $comment->template_type ,'template_id' => $comment->template_id,'slug' => $comment->$relation->slug])}}">
                                                            <span><i class="fa fa-comment-alt"></i></span><span
                                                                style="margin-left: 5px">Reply</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </li>
                                            @if($loop->index == 4)
                                                @break
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wizard-title mt-5">
                    <h4>Latest Post</h4>
{{--                    <a href="#">See All</a>--}}
                </div>
                <div class="wizard-body">
                    <ul class="blog-item">
                        @if(isset($posts) AND array_key_exists('posts',$posts))
                            @php $count = 0 @endphp
                            @foreach($posts['posts'] as $post)
                                <a @if($count > 0) class="mt-2"
                                   @endif href="{{route('blogger.blog.post.'.$post->post_type.'.show.'.$post->template_id,$post->slug)}}">
                                    <li>
                                        <div class="blog-thumb">
                                            <img src="{{asset($post->medias[0]->address)}}" alt="">
                                        </div>
                                        <div class="blog-text">
                                            <h6>{{substr($post->title,0,22)}}{{((strlen($post->title)) > 22) ? '...' : ''}}</h6>
                                            <div class="blog-timeline">
                                                <div class="time-line">
                                                    <span class="border-end pe-2">{{$post->blogger->name}}</span>
                                                    <span>{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                @if($count == 4)
                                    @break
                                @endif
                                @php $count++ @endphp
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- girid layout -->
@endsection
