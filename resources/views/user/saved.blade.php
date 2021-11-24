@extends('layouts.user_loggedin_app')

@section('content')
    <style>
        #options {
            display: none;
            position: absolute;
            left: 75px;
            bottom: 25px;
        }

        .blog-item:hover #options {
            display: block;
        }
    </style>
    <div class="row">
        @if (Session::has('success'))
            <div class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
            @if (Session::has('error'))
                <div class="alert alert-danger bg-danger text-white">{{ Session::get('error') }}</div>
            @endif

        @if(isset($posts) AND array_key_exists('saved_posts',$posts))
            @forelse($posts['saved_posts'] as $posts)
                @foreach($posts as $key => $post)
                    <div class="col-md-3 col-sm-3 col-12 mt-4 mr-sm-0">
                        <div class="blog-item">
                            <div class="item-thumb" style="height: 200px">
                                <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" class="rounded"
                                     alt="" style="height: 200px;position: relative">
                                @if(isset($post->video))
                                    <div class="video-btn">
                                        <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @endif

                                <button id="options" class="btn btn-dark bg-white text-dark" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{$key}}{{$post->id}}">Options
                                </button>

                                <div class="modal fade" id="exampleModal{{$key}}{{$post->id}}" aria-hidden="true"
                                     aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalToggleLabel">Take Actions</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body my-3">
                                                <button class="btn btn-primary"
                                                        data-bs-target="#exampleModalToggleCollection{{$key}}{{$post->id}}"
                                                        data-bs-toggle="modal" data-bs-dismiss="modal">Add to Collection
                                                </button>
                                                <form
                                                    style="display: inline" action="{{route('user.post.save',['template_type' => $post->post_type, 'template_id' => $post->template_id])}}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="post_user_id" value="{{$post->blogger->id}}">
                                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                                    <button type="submit" class="btn btn-primary bg-danger ml-3">UnSave</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="exampleModalToggleCollection{{$key}}{{$post->id}}" aria-hidden="true"
                                     aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalToggleLabel">Add to collection</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('user.collection.all.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="template_type" value="{{$post->post_type}}">
                                                <input type="hidden" name="template_id" value="{{$post->template_id}}">
                                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                                <input type="hidden" name="post_user_id" value="{{$post->blogger->id}}">
                                                <div class="modal-body">
                                                    <select class="form-control" name="collection_id" id="collection_name_{{$key}}">
                                                        @foreach($collections as $collection)
                                                            <option value="{{$collection->id}}">{{$collection->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span class="rounded bg-dark text-white">
                                        @foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach
                                    </span>

                                    @if(isset($post->collection->collection_slug))
                                        <span class="rounded bg-white text-dark">CN: {{$post->collection->collection_slug}}</span>
                                    @endif
                                </div>
                                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                    <h5>{{$post->title}}</h5>
                                </a>
                            </div>
                            <div class="blog-more mt-2">
                                <span class="mr-2"><img
                                        src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}" alt=""
                                        style="width: 25px;height: 25px;border-radius: 100%"></span>
                                <span class="border-end pe-2"
                                      style="background-color: #fff">{{substr($post->blogger->blog->blog_name,0,15)}}{{strlen($post->blogger->blog->blog_name)>15 ? '..' : ''}}</span>
                                <span style="background-color: #fff">{{$post->saved_at->diffForHumans()}}</span>
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
