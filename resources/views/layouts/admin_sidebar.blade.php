<div class="vertical-sidebar" id="slideNav">
    <div class="sidebar-content">
        <div class="brand-logo">
            <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="">
            <span class="close-icon d-md-none float-end me-2" onclick="menuAnimation(this)">
                    <i class="fa fa-times"></i>
                </span>
        </div>
        <div class="seller-thumb">
            <div class="img-thumb">
                <img src="{{asset('upload/admin/avatar')}}/{{Auth::guard('admin')->user()->image}}" alt="">
            </div>
            <div class="text-thumb">
                <p>{{Auth::guard('admin')->user()->name}}</p>
                <span class="online-status text-uppercase">{{Auth::guard('admin')->user()->role}}</span>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu-list">
                <div class="menu-title">
                    <p>Menu</p>
                </div>
                <li><a href="{{route('admin.dashboard')}}" @if(Route::currentRouteName() == 'admin.dashboard')class="active" @endif><span><i class="fas fa-th-large"></i></span><span>Overview</span></a></li>
                <li><a href="{{route('admin.blogs')}}" @if(Route::currentRouteName() == 'admin.blogs')class="active" @endif><span><i class="fab fa-blogger-b"></i></span><span>Blogs</span></a></li>
                <li><a href="#0"><span><i class="fas fa-book-open"></i></span><span>Ads</span></a></li>
                <li><a href="#0"><span><i class="fas fa-book-open"></i></span><span>Pages</span></a></li>
                <li><a href="#0"><span><i class="fas fa-list-ol"></i></span><span>Analytics</span></a></li>
                <li><a href="{{route('admin.activity')}}" @if(Route::currentRouteName() == 'admin.activity')class="active" @endif><span><i class="fas fa-gopuram"></i></span><span>Activity/Notifications</span></a></li>
{{--                <li class="accordion" id="accordionExample">--}}
{{--                    <a href="#0" class="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">--}}
{{--                            <span>--}}
{{--                                <i class="fas fa-hashtag"></i>--}}
{{--                            </span>--}}
{{--                        <span>Social Links</span>--}}
{{--                    </a>--}}
{{--                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Brands</span></a></li>--}}
{{--                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Product</span></a></li>--}}
{{--                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Categories</span></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li><a href="#0"><span><i class="fas fa-cog"></i></span><span>Settings</span></a></li>--}}
{{--                <div class="menu-title">--}}
{{--                    <p>Create</p>--}}
{{--                </div>--}}
{{--                <li><a href="#0"><span><i class="fas fa-paste"></i></span><span>Post</span></a></li>--}}
{{--                <li><a href="#0"><span><i class="fas fa-list-ol"></i></span><span>Category</span></a></li>--}}
{{--                <li><a href="#0"><span><i class="fas fa-gopuram"></i></span><span>Change Template</span></a></li>--}}
            </ul>
        </div>

    </div>
</div>
