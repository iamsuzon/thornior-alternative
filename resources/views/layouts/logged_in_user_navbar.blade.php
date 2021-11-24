<div class="top-navbar">
    <div class="container-fluid p-0">
        <div class="nav-item">
            <div class="left-menu">
                <div class="nav-toggle me-3" onclick="menuAnimation(this)">
                    <i class="fa fa-times"></i>
                </div>
                <ul class="left-menulist">
                    <li class="@if(Route::currentRouteName() == 'index') active @endif ml-4 mr-4">
                        <a href="{{route('index')}}">Home</a>
                    </li>
{{--                    <li class="mr-4">--}}
{{--                        <a href="#0">Explore</a>--}}
{{--                    </li>--}}
                    <li class="mr-4">
                        <a href="{{route('categories')}}">Category</a>
                    </li>
                    <li class="mr-4">
                        <a href="{{route('blogs')}}">Blogs</a>
                    </li>
                    <li class="mr-4">
                        <a href="{{route('videos')}}">Stream</a>
                    </li>
                    <li>
                        <a href="{{route('user.collection')}}">Library</a>
                    </li>
                </ul>
            </div>
            <div class="menu-item">
                <ul class="item-list" id="topList">
                    <li><a href="#"><span><i class="fa fa-bell"></i></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><img class="rounded-circle" src="@if(Auth::user()->image != 'user.jpg') {{asset('upload/user/avatar')}}/{{Auth::user()->image}} @else {{asset('upload/user/avatar/user.jpg')}} @endif" alt="" style="width: 35px;height: 35px"></span>
                            <span class="ml-1">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="@auth('admin') {{route('admin.settings.profile.index')}} @else {{route('blogger.settings.profile')}} @endauth">Profile</a></li>
                            <li><a class="dropdown-item" href="@auth('admin') {{route('admin.logout')}} @elseauth('blogger') {{route('blogger.logout')}} @else {{route('logout')}} @endauth">Logout</a></li>
                            {{--                            <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                        </ul>
                    </li>
                </ul>
                <div class="top-toggle d-block d-sm-none" onclick="topNav(this)">
                    <i class="fa fa-ellipsis-v"></i>
                </div>
            </div>
        </div>
    </div>
</div>
