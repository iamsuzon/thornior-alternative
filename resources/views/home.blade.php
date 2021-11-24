@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        @foreach($posts as $post)
            <div class="col-4 mt-3">
                <div class="card">
                    <div class="card-header">
                        {{$post->title}}
                    </div>
                    <div class="card-body">
                        <img src="{{asset('upload/blogger_image_post')}}/{{$post->image1}}" alt="" width="100%" height="200px">
                        @foreach($post->categories as $category)
                            <span class="text-success p-1">{{$category->name}}</span>
                        @endforeach
                        <hr>
                        <p>{{substr($post->des1,0,80)}} <a href="{{route('visitor.post.show',$post->id)}}">Read More</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
