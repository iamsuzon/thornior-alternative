@extends('layouts.non_logged_app')

@section('content')
    <style>
        .active{
            border-bottom: 2px solid #000;
        }
    </style>
    <!-- creat account area start -->
    <section class="creat-account style-two style-three">
        <div class="container-fluid p-0">
            <div class="section-wrapper">
                <div class="row h-vh align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="signup-thumb">
                            <img src="{{asset('backend/assets/images/login/login.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                        <div class="ac-form">
                            <div class="ac-title text-center">
                                <h3 class="text-uppercase">Blogger</h3>
                            </div>
                            <form method="POST" action="{{ route('blogger.login.submit') }}"
                                  class="tab-pane fade show" id="login" role="tabpanel"
                                  aria-labelledby="login-tab">
                                @csrf
                                <div class="form-title text-start pb-3">
                                    <h4 class="pb-0">Create The</h4>
                                    <span class="fw-bold">Interior latest trends now</span>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="uEmail">Email</label>
                                    <input type="email" id="uEmail" placeholder="Email or mobile phone number"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <i class="fa fa-user"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <label for="gPassword">Password</label>
                                    <input type="password" id="gPassword" placeholder="Password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                    <i class="fa fa-lock"></i>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="input-btn">
                                    <button type="submit" class="btn"><span>Sign in</span></button>
                                </div>
                                <div class="ac-recover">
{{--                                    <a href="#0" class="me-3">Forget Password?</a>--}}
{{--                                    <a href="#0">Reset Password?</a>--}}
                                    @if (Route::has('blogger.password.request'))
                                        <a class="me-3" href="{{ route('blogger.password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <!-- form navigation -->
                            <ul class="nav" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="{{route('blogger.login.show')}}" class="nav-link active" id="login-tab">
                                        Blogger Login
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{route('login')}}" class="nav-link" id="login-tab">
                                        User Login
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a href="{{route('register')}}" class="nav-link" id="signup-tab">
                                        Sign up
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- creat account area ends  -->
@endsection
