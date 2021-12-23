@extends('layouts.admin_loggedin_app')

@section('content')
    <style>
        .blogeractive-item {
            overflow-y: hidden !important;
        }

        .blogeractive-item:hover {
            overflow-y: scroll !important;
        }

        .blogeractive-item a {
            padding: 10px;
            border-radius: 5px;
        }

        .blogeractive-item a:hover {
            background: #F4F5FF;
        }
    </style>

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
                                @break($loop->index == 7)
                                    @if(\Illuminate\Support\Facades\Cache::has('blogger-is-online-' . $blog->blogger->id))
                                        <li>
                                            <a href="{{route('blog',$blog->blog_slug)}}" target="_blank">
                                                <div class="list-thumb">
                                                    <img src="{{asset('upload/blogger/avatar')}}/{{$blog->blogger->image}}"
                                                         alt="">
                                                </div>
                                                <div class="list-text">
                                                    <span>{{substr($blog->blog_name,0,12)}}..</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endif
                            @endforeach
                        </ul>
                    </div>
                    @if(count($blogs) < 1)
                        <div>
                            <h4 class="text-center">No Blog Available Yet</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="bloger-card mb-4">
            @if (Session::has('success'))
                <div class="alert alert-info text-capitalize">{{ Session::get('success') }}</div>
            @endif
            <div class="blogs-header pb-3">
                <div class="active-status">
                    <h4>Feed</h4>
                </div>
            </div>
            <div class="blogs-body">
                <div class="row">
                    @forelse($posts['all_posts'] as $post)
                        <div class="col-md-6 col-12 mb-4">
                            <div class="card shadow border-0">
                                <div class="card-text">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-footer pb-1">
                                            <div class="fot-thumb">
                                                <a href="{{route('blog',$post->blogger->blog->blog_slug)}}"
                                                   target="_blank">
                                                    <img
                                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="fot-text">
                                                <h6 class="pb-0">{{$post->blogger->blog->blog_name}} has made a
                                                    post</h6>
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
                                                        <input type="hidden" name="blogger_id"
                                                               value="{{$post->blogger_id}}">
                                                        <input type="hidden" name="template_type"
                                                               value="{{$post->post_type}}">
                                                        <input type="hidden" name="slug" value="{{$post->slug}}">
                                                        <button type="submit" class="dropdown-item"><span><i
                                                                    class="fa fa-trash me-2"></i></span><span
                                                                class="small">Delete</span></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h6 class="small">{{$post->title}}</h6>
                                </div>
                                <div class="card-thumb" style="height: 200px;overflow: hidden;box-sizing: border-box">
                                    <a href="{{route('post.show',['template_type' => $post->post_type , 'slug' => $post->slug])}}"
                                       target="_blank">
                                        <img src="{{asset($post->medias[0]->address)}}" alt=""
                                             style="width:100%;height: 100%">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h4 class="text-center">No Post Available Yet</h4>
                        </div>
                    @endforelse

                    @if(count($posts['all_posts']) > 5)
                        <div class="text-center my-4">
                            <a href="" class="btn btn-dark text-white">Load More</a>
                        </div>
                    @endif
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
                            @forelse($activities as $activity)
                                <a class="@if($loop->first) mt-1 @else mt-3 @endif"
                                   @if($activity->slug)
                                   href="{{route('post.show',[$activity->template_type,$activity->slug])}}"
                                   @else
                                   href="{{route('blog',$activity->blogger->blog->blog_slug)}}"
                                   @endif
                                   target="_blank">
                                    <li>
                                        <div class="item-thumb">
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}"
                                                 alt="">
                                        </div>
                                        <div class="item-text">
                                            <h6>{{$activity->blogger->name}}
                                                @if($activity->slug)
                                                    <span>has made a {{$activity->template_type}} post</span>
                                                @else
                                                    <span>has made changes in his blog</span>
                                                @endif
                                            </h6>
                                            <span>{{$activity->created_at->diffForHumans()}}</span>
                                        </div>
                                    </li>
                                </a>
                            @empty
                                <li>
                                    <div class="item-text">
                                        <span>No activity to show</span>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div id="tabs-2">
                    <div class="blogs-body">
                        <ul class="blogeractive-item style-one">
                            @forelse($activities as $activity)
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
                            @empty
                                <li>
                                    <div class="item-text">
                                        <span>No activity to show</span>
                                    </div>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div id="tabs-3">
                    <div class="blogs-body">
                        <ul class="blogeractive-item style-one">
                            @forelse($activities as $activity)
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
                            @empty
                                <li>
                                    <div class="item-text">
                                        <span>No activity to show</span>
                                    </div>
                                </li>
                            @endforelse
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
                    @forelse($activities as $activity)
                        <li>
                            <div class="item-thumb">
                                <img src="{{asset('upload/blogger/avatar')}}/{{$activity->blogger->image}}" alt="">
                            </div>
                            <div class="item-text">
                                <h6>{{$activity->blogger->name}}</h6>
                                <span>{{$activity->created_at->diffForHumans()}}</span>
                            </div>
                        </li>
                    @empty
                        <li>
                            <div class="item-text">
                                <span>No activity to show</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
