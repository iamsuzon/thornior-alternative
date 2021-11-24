@extends('layouts.user_loggedin_app')

@section('content')
    <div class="row">
        @if(isset($posts) AND array_key_exists('liked_posts',$posts))
            @forelse($posts['liked_posts'] as $posts)
                @foreach($posts as $post)
                    <div class="col-md-3 col-sm-3 col-12 mt-4 mr-sm-0">
                        <div class="blog-item">
                            <div class="item-thumb" style="height: 200px">
                                <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" class="rounded"
                                     alt="" style="height: 200px">
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
                                    <span class="rounded bg-dark text-white">
                                        @foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach
                                    </span>
                                </div>
                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                <h5>{{$post->title}}</h5>
                                </a>
                            </div>
                            <div class="blog-more mt-2">
                                <span class="mr-2"><img src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt="" style="width: 25px;height: 25px;border-radius: 100%"></span>
                                <span class="border-end pe-2" style="background-color: #fff">{{substr($post->blogger->blog->blog_name,0,15)}}{{strlen($post->blogger->blog->blog_name)>15 ? '..' : ''}}</span>
                                <span style="background-color: #fff">{{$post->liked_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <p class="text-center">No Post Available</p>
            @endforelse
        @endif
    </div>
@endsection
