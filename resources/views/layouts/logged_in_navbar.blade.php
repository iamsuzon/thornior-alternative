<div class="top-navbar">
    <div class="container-fluid p-0">
        <div class="nav-item">
            <div class="left-menu">
                @if(Route::currentRouteName() == 'blogger.blog.post.image.index.1'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.index.2'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.index.3'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.index.4'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.index.5'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.index.6'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.1'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.2'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.3'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.4'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.5'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.index.6'

                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.1'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.2'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.3'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.4'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.5'
                    OR Route::currentRouteName() == 'blogger.blog.post.image.edit.6'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.1'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.2'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.3'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.4'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.5'
                    OR Route::currentRouteName() == 'blogger.blog.post.video.edit.6')
                    <div class="nav-toggle me-3">
                        <a href="{{route('blogger.dashboard')}}">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                @else
                    <div class="nav-toggle me-3" onclick="menuAnimation(this)">
                        <i class="fa fa-times"></i>
                    </div>
                @endif
                <ul class="left-menulist">
                    <li class="active">
                        @auth('admin')
                            <a href="{{route('admin.dashboard')}}">Blog</a>
                        @else
                            <a href="{{route('blogger.dashboard')}}">Blog</a>
                        @endauth
                    </li>
                    <li>
                        <a href="{{route('index')}}">Explore</a>
                    </li>
                </ul>
            </div>

            <div class="menu-item">
                <ul class="item-list" id="topList">
                    @auth('blogger')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span><img class="rounded-circle" src="@auth('admin') {{asset('upload/admin/avatar')}}/{{Auth::user()->image}} @else {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @endauth" height="35" width="35" alt=""></span>
                                <span>{{ Auth::guard('blogger')->user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('blogger.dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{route('blogger.logout')}}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                    @auth('admin')
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span><img class="rounded-circle" src="@auth('admin') {{asset('upload/admin/avatar')}}/{{Auth::user()->image}} @else {{asset('upload/blogger/avatar')}}/{{Auth::user()->image}} @endauth" height="35" width="35" alt=""></span>
                                <span>{{ Auth::guard('admin')->user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                   href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                <a class="dropdown-item"
                                   href="{{ route('admin.settings.profile.index') }}">{{ __('Settings') }}</a>
                                <a class="dropdown-item" href="#"
                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{route('admin.logout')}}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
                <div class="top-toggle d-block d-sm-none" onclick="topNav(this)">
                    <i class="fa fa-ellipsis-v"></i>
                </div>
            </div>
        </div>
    </div>
</div>
