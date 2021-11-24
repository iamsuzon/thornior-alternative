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
                <img src="@if(Auth::user()->image != 'user.jpg') {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @else {{asset('upload/blogger/avatar/user.jpg')}} @endif" alt="">
            </div>
            <div class="text-thumb">
                <p>{{Auth::user()->name}}</p>
                <span class="online-status">{{Auth::user()->email}}</span>
            </div>
            <div class="post-status">
                <ul class="status-list">
                    <li>
                        <strong>{{$postCount['image']}}</strong>
                        <p>Posts</p>
                    </li>
                    <li>
                        <strong>{{$postCount['video']}}</strong>
                        <p>Videos</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu-list">
                <div class="menu-title">
                    <p>Meny</p>
                </div>
                <li><a href="{{route('blogger.overview')}}" @if(Route::currentRouteName() == 'blogger.overview')class="active" @endif><span><i class="fas fa-th-large"></i></span><span>Overview</span></a></li>
                <li><a href="{{route('blogger.dashboard')}}" @if(Route::currentRouteName() == 'blogger.dashboard')class="active" @endif><span><i class="fab fa-blogger-b"></i></span><span>Blog</span></a></li>
                <li><a href="{{route('blogger.blog.product.index')}}" @if(Route::currentRouteName() == 'blogger.blog.product.index')class="active" @endif><span><i class="fas fa-book-open"></i></span><span>Products</span></a></li>
                <li class="accordion" id="accordionExample">
                    <a href="#0" class="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span>
                                <i class="fas fa-hashtag"></i>
                            </span>
                        <span>Social Links</span>
                    </a>
                    <!-- <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <ul class="sub-menu">
                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Brands</span></a></li>
                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Product</span></a></li>
                            <li><a href="#"><span><i class="fa fa-circle"></i></span><span>Categories</span></a></li>
                        </ul>
                    </div> -->
                </li>
                <li><a href="{{route('blogger.settings.blog')}}" @if(Route::currentRouteName() == 'blogger.settings.blog')class="active" @endif><span><i class="fas fa-cog"></i></span><span>Settings</span></a></li>
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
