<header>
    <div class="header-main">
        <div class="header-item">
            <div class="header-top">
                <div class="container">
                    <div class="top-item">
                        <div class="top-search">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="top-logo">
                            <a href="#0">
                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="Thornior Logo">
                            </a>
                        </div>
                        <div class="top-menu">
                            <ul class="top-list">
                                <li>
                                @auth('web')
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                               href="{{ route('login') }}">{{ __('Dashboard') }}</a>
                                            <a class="dropdown-item" href="#"
                                               onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{route('logout')}}" method="POST"
                                                  class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endauth
                                @auth('blogger')
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::guard('blogger')->user()->name }}
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
                                            {{ Auth::guard('admin')->user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item"
                                               href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
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

                                @guest
                                    <a class="d-none d-sm-block" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endguest
                                <a href="#0" class="d-sm-none"><i class="fa fa-user-circle"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <div class="bottom-inner">
                        <div class="header-logo d-lg-none">
                            <a href="#0">
                                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="Thornior Logo">
                            </a>
                        </div>
                        <div class="main-menu">
                            <div class="crose-menu">
                                <i class="crose-bar fa fa-times-circle"></i>
                            </div>
                            <ul class="menu-list">
                                <li @if(Route::current()->getName() == 'index') class="active" @endif>
                                    <a href="{{route('index')}}">Home</a>
                                </li>
                                <li @if(Route::current()->getName() == 'categories') class="active" @endif>
                                    <a href="{{route('categories')}}">Categories</a>
                                </li>
                                <li @if(Route::current()->getName() == 'blogs') class="active" @endif>
                                    <a href="{{route('blogs')}}">Blogs</a>
                                </li>
                                <li @if(Route::current()->getName() == 'videos') class="active" @endif>
                                    <a href="{{route('videos')}}">Videos</a>
                                </li>
                                <li @if(Route::current()->getName() == 'about') class="active" @endif>
                                    <a href="{{route('about')}}">About</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mobile-bar">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
