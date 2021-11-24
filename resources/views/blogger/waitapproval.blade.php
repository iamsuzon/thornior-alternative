@extends('layouts.non_logged_app')

@section('content')
    <section class="creat-account style-one">
        <div class="container">
            <div class="section-wrapper">
                <div class="account-link">
                        <div class="link-title">
                            <h4>Thank You {{$newblogger->name}}!</h4>
                            <p>We have received your application. Wait for approval to start creating your blog.</p>
                        </div>
                        <div class="link-icon">
                            <i class="far fa-check-circle"></i>
                        </div>
                    <div class="link-btn">
                        <a href="{{route('index')}}" class="btn"><span>Landing Page</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
