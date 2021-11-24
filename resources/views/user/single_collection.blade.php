@extends('layouts.user_loggedin_app')

@section('content')
    <div class="section-header">
        <a href="{{route('user.collection')}}">
            <h4><i class="fa fa-angle-left me-2"></i> {{$collection['single']->name}} Collection</h4>
        </a>

        <a class="btn btn float-end" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCollection">
            <h4 class="mb-0"><i class="fas fa-ellipsis-h"></i></h4>
        </a>

        <div class="modal fade" id="exampleModalCollection" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">
                            Change Collection Name
                        </h5>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('user.collection.update')}}" method="POST">
                        @csrf
                        <div class="modal-body my-2 mb-3">
                            <input type="hidden" id="id" name="id" value="{{$collection['single']->id}}">
                            <label for="name">Collection Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                   value="{{$collection['single']->name}}">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route('user.collection.delete',$collection['single']->slug)}}" class="btn btn-primary bg-danger text-white">Delete Collection
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(isset($collection) AND array_key_exists('collection',$collection))
        @if($collection['collection'] != null)
            @foreach($collection['collection'] as $posts)
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

                            </div>
                            <div class="blog-text">
                                <div class="blog-cat">
                                    <span class="rounded bg-dark text-white">
                                        @foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                            +{{$post->categories->count()-1}}
                                            more @break @endif  @endforeach
                                    </span>

                                    @if(isset($post->collection->collection_slug))
                                        <span
                                            class="rounded bg-white text-dark">CN: {{$post->collection->collection_slug}}</span>
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
                                <span style="background-color: #fff">{{$post->added_at->diffForHumans()}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @else
            <p class="text-center">No Post Available</p>
        @endif
    @endif
@endsection
