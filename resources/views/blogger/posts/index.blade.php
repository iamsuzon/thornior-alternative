@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Blogger Blog') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Select Post Type') }}

                        <div class="card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-boy m-5">
                                        <a href="{{route('blogger.blog.post.image.index')}}" class="btn btn-success">Image Post</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card-boy m-5">
                                        <a href="" class="btn btn-success">Video Post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
