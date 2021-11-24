{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Account Approval') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('We will approve your account after a review.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('Before proceeding, please be patient for approval.') }}--}}
{{--                    {{ __('If we did not approve your account for a log time, please consider contact with us') }},--}}
{{--                    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">--}}
{{--                        @csrf--}}
{{--                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

@extends('layouts.non_logged_app')

@section('content')
    <section class="creat-account style-one">
        <div class="container">
            <div class="section-wrapper">
                <div class="account-link">
                    <div class="link-title">
                        <h4>Thank You!</h4>
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

