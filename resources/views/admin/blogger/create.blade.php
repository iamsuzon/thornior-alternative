@extends('layouts.admin_loggedin_app')

@section('content')
    <div class="col-lg-12 col-12">
        <!-- creat account area start -->
        <section class="creat-account">
            <div class="container">
                <div class="section-wrapper">
                    <div class="row h-vh">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-lg-8 col-12">
                            <div class="creact-ac">
                                <div class="ac-title">
                                    {{--                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="">--}}
                                    <h4>Create new account</h4>
                                    <p>Med wrket kan du sanabbat och enklet heyra och moks utt an</p>
                                </div>
                                <div class="ac-categori">
                                    <div class="cat-card">
                                        <div class="card-item">
                                            <h5>Blog</h5>
                                            <img src="{{asset('backend/assets/images/blog/01.png')}}" alt="">
                                            <button type="button" class="btn"><span>Add</span></button>
                                        </div>
                                    </div>
                                    <div class="cat-card">
                                        <div class="card-item">
                                            <h5>Interior</h5>
                                            <img src="{{asset('backend/assets/images/blog/01.png')}}" alt="">
                                            <button type="button" class="btn"><span>Add</span></button>
                                        </div>
                                    </div>
                                    <div class="cat-card">
                                        <div class="card-item">
                                            <h5>Company</h5>
                                            <img src="{{asset('backend/assets/images/blog/01.png')}}" alt="">
                                            <button type="button" class="btn"><span>Add</span></button>
                                        </div>
                                    </div>
                                    <div class="cat-card">
                                        <div class="card-item">
                                            <h5>Manager</h5>
                                            <img src="{{asset('backend/assets/images/blog/01.png')}}" alt="">
                                            <button type="button" class="btn"><span>Add</span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="ac-form mt-4 mt-lg-0">
                                <div class="form-title">
                                    <h4>Creat Account</h4>
                                </div>
                                <form action="{{route('admin.blogger.sent')}}" method="POST">
                                    @csrf
                                    <div class="input-group mb-4">
                                        <label for="fName">Name</label>
                                        <input type="text" class="form-control" id="fName" name="name">
                                    </div>
                                    <div class="input-group mb-5">
                                        <label for="uEmail">Email</label>
                                        <input type="email" class="form-control" id="uEmail" name="email">
                                    </div>
                                    <div class="input-btn pb-5 pb-lg-0">
                                        <button type="submit" class="btn"><span>Create Link</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- creat account area ends  -->
    </div>
@endsection
