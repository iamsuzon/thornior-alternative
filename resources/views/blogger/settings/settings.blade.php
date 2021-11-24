@extends('layouts.blogger_loggedin_app')

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

        #uploadFile{
            display: none
        }
        @media screen and (max-width: 576px) {

        }
    </style>

    <!-- profile area start -->
    <section class="blogger-profile">
        <div class="container">
            <div class="section-header">
                <h3><i class="fa fa-angle-left me-2"></i> My Blog</h3>
            </div>
            <div class="section-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fa fa-home me-1"></i> My Blog</button>
                            <button class="nav-link" id="v-pills-notices-tab" data-bs-toggle="pill" data-bs-target="#v-pills-notices" type="button" role="tab" aria-controls="v-pills-notices" aria-selected="false"><i class="fa fa-user me-1"></i> Notices</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-wrench me-1"></i> Settings</button>
                            <button class="nav-link" id="v-pills-security-tab" data-bs-toggle="pill" data-bs-target="#v-pills-security" type="button" role="tab" aria-controls="v-pills-security" aria-selected="false"><i class="fas fa-exclamation-triangle me-1"></i> Security & Sharing</button>
                            <button class="nav-link" id="v-pills-privacy-tab" data-bs-toggle="pill" data-bs-target="#v-pills-privacy" type="button" role="tab" aria-controls="v-pills-privacy" aria-selected="false"><i class="fas fa-sign-in-alt me-1"></i> Notice & Login</button>
                            <button class="nav-link" id="v-pills-help-tab" data-bs-toggle="pill" data-bs-target="#v-pills-help" type="button" role="tab" aria-controls="v-pills-help" aria-selected="false"><i class="fas fa-hands-helping me-1"></i> Help Center</button>
                        </div>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="profile-home">
                                    <div class="profile-header">
                                        <div class="header-left">
                                            <h3>Hi {{Auth::user()->name}}!</h3>
                                            <p>You want to edit your blog? You can do all that here.</p>
                                            @if (Session::has('message'))
                                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="profile-form">
                                        <div class="form-head">
                                            <h4>Blog Overview</h4>
                                        </div>
                                        <form action="{{route('blogger.settings.blog.submit')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger py-2">
                                                    <ul class="m-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="input-group mb-3">
                                                        <label for="fName">Name</label>
                                                        <input type="text" id="fName" name="name" class="form-control" placeholder="{{Auth::user()->name}}" value="{{$bloggerData['blog']->blog_name}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <div class="input-sellect mb-3">
                                                        <label for="chooseLand">Land / Region</label>
                                                        @include('layouts.countries')
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group mb-4">
                                                        <label for="aboutMe">About Me</label>
                                                        <textarea name="about" id="" cols="30" rows="10">{{$bloggerData['blog']->blog_description}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="post-image">
                                                        <p>Use 1024x350 for the best fit</p>
                                                        <p><input type="file" accept="image/*" name="image" id="file"
                                                                  onchange="profileImage(event)" style="display: none;"></p>
                                                        <p id="image-box"><img src="@if(($bloggerData['blog']->image) != null) {{asset('upload/blogger/blog')}}/{{$bloggerData['blog']->image}} @else {{asset('upload/blogger/blog/placeholder.jpg')}} @endif"
                                                                               id="output" width="100%" height="100px"/></p>
                                                        <p class="text-center image-label m-0" id="image-label"><label for="file"
                                                                                                                       style="cursor: pointer;"><i
                                                                    class="fas fa-camera"></i>  Change Image</label></p>
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
                            <div class="tab-pane fade" id="v-pills-notices" role="tabpanel" aria-labelledby="v-pills-notices-tab">
                                <div class="blogger-notices">
{{--                                    <div class="notices-header">--}}
{{--                                        <h3>Notices</h3>--}}
{{--                                        <p>Select which notification you want to revice.</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="notices-form">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-6 col-12">--}}
{{--                                                <div class="notices-content">--}}
{{--                                                    <div class="item-title">--}}
{{--                                                        <h6>Email</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-content">--}}
{{--                                                        <div class="item-head">--}}
{{--                                                            <div class="left">--}}
{{--                                                                <h6>Receive The Newsletter</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="right">--}}
{{--                                                                <div class="form-check form-switch">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="item-text">--}}
{{--                                                            <p>Receive by email the latest news from the restaurant: Best deals, loyalty offers and special. Note: It doesn’t concern the booking emails.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="item-title">--}}
{{--                                                        <h6> Notifications</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-content">--}}
{{--                                                        <div class="item-head">--}}
{{--                                                            <div class="left">--}}
{{--                                                                <h6>Receive Special Offers</h6>--}}
{{--                                                                <p>Receive Booking Information</p>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="right d-flex">--}}
{{--                                                                <div class="form-check form-switch mr-2">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="form-check form-switch">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="item-text">--}}
{{--                                                            <p>Receive mobile phone push notification alert about your booking, and the restaurant’s news: Best deals, loyalty offers and specials.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6 col-12">--}}
{{--                                                <div class="notices-content">--}}
{{--                                                    <div class="item-title">--}}
{{--                                                        <h6>Privacy</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-content">--}}
{{--                                                        <div class="item-head">--}}
{{--                                                            <div class="left">--}}
{{--                                                                <h6>Receive Special Offers</h6>--}}
{{--                                                                <p>Receive Booking Information</p>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="right d-flex">--}}
{{--                                                                <div class="form-check form-switch mr-2">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="form-check form-switch">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="item-text">--}}
{{--                                                            <p>Receive mobile phone push notification alert about your booking, and the restaurant’s news: Best deals, loyalty offers and specials.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="item-title">--}}
{{--                                                        <h6>Help Center</h6>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="item-content">--}}
{{--                                                        <div class="item-head">--}}
{{--                                                            <div class="left">--}}
{{--                                                                <h6>Receive The Newsletter</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="right">--}}
{{--                                                                <div class="form-check form-switch">--}}
{{--                                                                    <input type="checkbox" class="form-check-input theme-switcher" id="flexSwitchCheckDefault">--}}
{{--                                                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="item-text">--}}
{{--                                                            <p>Receive by email the latest news from the restaurant: Best deals, loyalty offers and special. Note: It doesn’t concern the booking emails.</p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
{{--                                <div class="blogger-settings">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-4">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fa fa-home"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>My Profile</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-4">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fa fa-user"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>Notices</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-4">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fa fa-wrench"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>Settings</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-4 mb-sm-0">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fas fa-exclamation-triangle"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>Security & Sharing</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-4 mb-sm-0">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fas fa-sign-in-alt"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>Privacy & Login</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-xl-4 col-lg-6 col-sm-6 col-12">--}}
{{--                                            <div class="card">--}}
{{--                                                <div class="card-icon">--}}
{{--                                                    <i class="fa fa-hands-helping"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="card-text">--}}
{{--                                                    <h4>Help Center</h4>--}}
{{--                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="tab-pane fade" id="v-pills-security" role="tabpanel" aria-labelledby="v-pills-security-tab">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus impedit illum illo dolorem! Incidunt quam ratione delectus optio impedit nesciunt cupiditate numquam quod voluptatum? Tempore nostrum, perferendis nemo quod illum ipsam aut provident sint eligendi!</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-privacy" role="tabpanel" aria-labelledby="v-pills-privacy-tab">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis ipsa ipsam quaerat. Aperiam laborum quia aliquid fugit eaque? Suscipit sequi expedita nulla, modi tempora dolor.</p>
                            </div>
                            <div class="tab-pane fade" id="v-pills-help" role="tabpanel" aria-labelledby="v-pills-help-tab">
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur asperiores quidem ducimus blanditiis. Illo minima vel aliquam, nobis quidem voluptate porro consectetur laboriosam velit ab nesciunt eius incidunt voluptatum iste, hic debitis error? Pariatur ab repellendus magnam incidunt qui odit!</p>
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
