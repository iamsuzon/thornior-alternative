@extends('layouts.admin_loggedin_app')

@section('content')
    <div class="col-lg-8 col-12">
        <div class="bloger-card mb-4">
            <div class="blogs-header">
                <div class="active-status">
                    <h4>Blogs</h4>
                </div>
            </div>
            <div class="blogs-body">
                <div class="row">
                    <div class="col-12">
                        <span><strong class="me-1">Active</strong>now</span>
                        <ul class="blogger-list" style="justify-content: left">
                            @foreach($blogs as $blog)
                                @if($loop->index == 7) @break @endif
                                <li>
                                    <div class="list-thumb">
                                        <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blogger->image}}" alt="">
                                    </div>
                                    <div class="list-text">
                                        <span>{{$blog->blog_name}}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloger-card mb-4">
            <div class="blogs-header pb-3">
                <div class="active-status">
                    <h4>Feed</h4>
                    @if (Session::has('success'))
                        <div class="alert alert-info">{{ Session::get('success') }}</div>
                    @endif
                </div>
            </div>
            <div class="blogs-body">
                <div class="row">
                    @foreach($posts['all_posts'] as $post)
                    <div class="col-md-6 col-12 mb-4">
                        <div class="card shadow border-0">
                            <div class="card-text">
                                <div class="d-flex justify-content-between">
                                    <div class="text-footer pb-1">
                                        <div class="fot-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt="">
                                        </div>
                                        <div class="fot-text">
                                            <h6 class="pb-0">{{$post->blogger->blog->blog_name}} has made a post</h6>
                                            <span class="small">{{$post->created_at->diffForHumans()}}</span>
                                        </div>
                                    </div>
                                    <div class="fot-icon text-end dropdown">
                                        <button type="button" class="bg-transparent" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                class="fa fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
{{--                                            <li><a class="dropdown-item" href="#"><span><i class="fa fa-times me-2"></i></span>--}}
{{--                                                    <span class="small">Hide</span></a></li>--}}
                                            <li>
                                                <form action="{{route('admin.post.delete')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="blogger_id" value="{{$post->blogger_id}}">
                                                    <input type="hidden" name="template_type" value="{{$post->post_type}}">
                                                    <input type="hidden" name="template_id" value="{{$post->template_id}}">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="dropdown-item"><span><i class="fa fa-trash me-2"></i></span><span
                                                            class="small">Delete</span></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <h6 class="small">{{$post->title}}</h6>
                            </div>
                            <div class="card-thumb" style="height: 200px;overflow: hidden;box-sizing: border-box">
                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                    <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" alt="" style="width:100%;height: 100%">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="bloger-card mb-4">
            <div class="blogs-header">
                <div class="active-status">
                    <h4>Activity</h4>
                </div>
            </div>
            <div id="tabs">
                <ul class="mb-4">
                    <li><a href="#tabs-1">Post</a></li>
                    <li><a href="#tabs-2">Videos</a></li>
                    <li><a href="#tabs-3">Images</a></li>
                </ul>
                <div id="tabs-1">
                    <div class="blogs-body">
                        <ul class="blogeractive-item style-one">
                            @foreach($activities as $activity)
                                <a class="@if($loop->first) mt-1 @else mt-3 @endif"
                                   href="{{route('blog',$activity->blogger->blog->blog_slug)}}">
                                    <li>
                                        <div class="item-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}"
                                                 alt="">
                                        </div>
                                        <div class="item-text">
                                            <h6>{{$activity->blogger->name}} <span>has made a {{$activity->template_type}} post</span>
                                            </h6>
                                            <span>{{$activity->created_at->diffForHumans()}}</span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="tabs-2">
                    <div class="blogs-body">
                        <ul class="blogeractive-item style-one">
                            @foreach($activities as $activity)
                                @if($activity->template_type != 'video') @continue @endif
                                <a class="@if($loop->first) mt-1 @else mt-3 @endif"
                                   href="{{route('blog',$activity->blogger->blog->blog_slug)}}">
                                    <li>
                                        <div class="item-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}"
                                                 alt="">
                                        </div>
                                        <div class="item-text">
                                            <h6>{{$activity->blogger->name}} <span>has made a {{$activity->template_type}} post</span>
                                            </h6>
                                            <span>{{$activity->created_at->diffForHumans()}}</span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="tabs-3">
                    <div class="blogs-body">
                        <ul class="blogeractive-item style-one">
                            @foreach($activities as $activity)
                                @if($activity->template_type != 'image') @continue @endif
                                <a class="@if($loop->first) mt-1 @else mt-3 @endif"
                                   href="{{route('blog',$activity->blogger->blog->blog_slug)}}">
                                    <li>
                                        <div class="item-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}"
                                                 alt="">
                                        </div>
                                        <div class="item-text">
                                            <h6>{{$activity->blogger->name}} <span>has made a {{$activity->template_type}} post</span>
                                            </h6>
                                            <span>{{$activity->created_at->diffForHumans()}}</span>
                                        </div>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloger-card">
            <div class="blogs-header pb-4">
                <div class="active-status">
                    <h4>Activity</h4>
                </div>
            </div>
            <div class="blogs-body">
                <ul class="blogeractive-item style-two">
                    @foreach($activities as $activity)
                        <li>
                            <div class="item-thumb">
                                <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}" alt="">
                            </div>
                            <div class="item-text">
                                <h6>{{$activity->blogger->name}}</h6>
                                <span>{{$activity->created_at->diffForHumans()}}</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
