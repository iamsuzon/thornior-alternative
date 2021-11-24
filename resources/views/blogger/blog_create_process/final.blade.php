@extends('layouts.non_logged_app')

@section('content')
    <section class="creat-account style-one">
        <div class="container">
            <div class="section-wrapper">
                <div class="account-link">
                    <div class="link-title">
                        <h4>You are one step away from your blog</h4>
                        <p>Click create to complete the blog setup.</p>
                    </div>
                    <div class="link-icon">
                        <i class="far fa-check-circle"></i>
                    </div>
                    <div class="link-btn">
                        <form action="{{route('blogger.blog.create.final')}}" method="POST">
                            @csrf
                            <input type="hidden" value="finish" name="finish">
                            <br>
                            <button class="btn btn-success" type="submit">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
