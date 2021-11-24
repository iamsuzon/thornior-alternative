@extends('layouts.non_logged_app')

@section('content')
    <style>
        .active {
            border-bottom: 2px solid #000;
        }
        select.form-control{
            background-color: #e9ecef;
            border: 0;
            width: 100%;
            height: 40px;
            font-size: 14px;
            margin-left: 0 !important;
            border-radius: 5%;
            transition: all 0.3s ease-in-out;
        }
        .creat-account.style-two .section-wrapper .signup-thumb img{
            height: 118vh;
        }
    </style>

    <!-- creat account area start -->
    <section class="creat-account style-two">
        <div class="container-fluid p-0">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="signup-thumb">
                            <img src="{{asset('backend/assets/images/login/sign.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="ac-form mt-4 mt-lg-0">
                            <div class="form-title my-3">
                                <h3>Create Blogger Account</h3>
                            </div>
                            <form action="{{route('admin.blogger.account.store')}}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$token}}" name="token">
                                <div class="input-group mb-3">
                                    <label for="fName">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus id="fName" placeholder="Full Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <label for="uEmail">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" id="uEmail" placeholder="Email Address">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <label for="gPassword">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="gPassword" placeholder="New Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <label for="cPassword">Confirm Password</label>
                                    <input type="password" class="form-control" id="cPassword" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="region">{{ __('Region/Country') }}</label>

                                    <div style="width: 100%">
                                        @include('layouts.countries')

                                        @error('region')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-trems mb-4">
                                    <div class="form-check mb-1">
                                        <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="checkbox">
                                        <label class="form-check-label small" for="flexCheckDefault">
                                            Yes, I have read and accept the <a href="#0" class="text-info">trems</a>
                                        </label>
                                    </div>
                                    <div class="privacy-text">
                                        <p class="m-0 small">By creating an account, You accept nilyamn's membership trems and privacy policy</p>
                                    </div>
                                </div>
                                <div class="input-btn pb-5 pb-lg-0">
                                    <button type="submit" class="btn"><span>Create account</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- creat account area ends  --
@endsection
