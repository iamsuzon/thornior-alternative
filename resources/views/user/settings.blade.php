@extends('layouts.user_loggedin_app')

@section('content')
    <style>
        #imagePreview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-position: center center;
            background-size: cover;
            -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
            display: inline-block;
            background-image: url('http://via.placeholder.com/350x150');
            cursor: pointer;
        }

        #uploadFile {
            display: none
        }

        @media screen and (max-width: 576px) {

        }
    </style>

    <!-- profile area start -->
    <section class="blogger-profile">
        <div class="container">
            <div class="section-header">
                <a href="{{url()->previous()}}">
                    <h4><i class="fa fa-angle-left me-2"></i> My Profile</h4>
                </a>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="profiler-thumble">
                            <form action="{{route('user.settings.update')}}" method="POST" id="profileImageForm"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="post-image">
                                    <p><input type="file" accept="image/*" name="image" id="file"
                                              onchange="profileImage(event)" style="display: none;"></p>
                                    <p id="image-box"><img
                                            src="@if(($user->image) != 'user.jpg') {{asset('upload/user/avatar')}}/{{$user->image}} @else {{asset('upload/user/avatar/user.jpg')}} @endif"
                                            id="output" width="100%" height="auto"/></p>
                                    <p class="text-center image-label m-0" id="image-label"><label for="file"
                                                                                                   style="cursor: pointer;"><i
                                                class="fas fa-camera"></i> Change Image</label></p>
                                </div>
                                <button class="btn text-white" id="profileImageFormButton" type="submit"
                                        style="display: none">Upload
                                </button>
                            </form>
                            <div class="thumb-title">
                                <h6>{{$user->name}}</h6>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="true"><i class="fa fa-home me-1"></i>
                                My Profile
                            </button>
                            <button class="nav-link" id="v-pills-help-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-help" type="button" role="tab" aria-controls="v-pills-help"
                                    aria-selected="false"><i class="fas fa-hands-helping me-1"></i> Help Center
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                                 aria-labelledby="v-pills-profile-tab">
                                <div class="profile-home">
                                    <div class="profile-header">
                                        <div class="header-left">
                                            <h3>Hi {{Auth::user()->name}}!</h3>
                                            <p>Do you want to edit your profile? You can do all that here.</p>
                                            @if (Session::has('success'))
                                                <div class="alert alert-info">{{ Session::get('success') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="profile-form">
                                        <div class="form-head">
                                            <h4>Account Overview</h4>
                                        </div>
                                        <form action="{{route('user.settings.update')}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="input-group mb-3">
                                                        <label for="fName">Name</label>
                                                        <input type="text" id="fName" name="name" class="form-control"
                                                               placeholder="{{Auth::user()->name}}"
                                                               value="{{$user->name}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="input-group mb-3">
                                                        <label for="userEmail">Email</label>
                                                        <input type="email" id="userEmail" name="email"
                                                               class="form-control"
                                                               placeholder="{{Auth::user()->email}}"
                                                               value="{{$user->email}}">
                                                    </div>
                                                </div>
                                                {{--                                                <div class="col-md-6 col-12">--}}
                                                {{--                                                    <div class="input-sellect mb-3">--}}
                                                {{--                                                        <label for="chooseLand">Land / Region</label>--}}
                                                {{--                                                        @include('layouts.countries')--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                                <div class="col-12">
                                                    <div class="input-group mb-4">
                                                        <label for="aboutMe">About Me</label>
                                                        <textarea name="about" id="" cols="30"
                                                                  rows="10">{{$user->about}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="input-btn d-flex justify-content-end">
                                                    <button type="submit" class="btn"><span>Save Change</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-help" role="tabpanel"
                                 aria-labelledby="v-pills-help-tab">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur asperiores
                                    quidem ducimus blanditiis. Illo minima vel aliquam, nobis quidem voluptate porro
                                    consectetur laboriosam velit ab nesciunt eius incidunt voluptatum iste, hic debitis
                                    error? Pariatur ab repellendus magnam incidunt qui odit!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile area ends  -->
@endsection

@section('script')
    <script>
        var profileImage = function (event) {
            // profile image
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);

            $('#profileImageFormButton').show();
        };
    </script>
@endsection
