<style>
    .openBtn {
        border: none;
        padding: 10px 15px;
        font-size: 20px;
        cursor: pointer;
    }
    .overlay {
        height: 100%;
        width: 100%;
        display: none;
        position: fixed;
        z-index: 9999;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0, 0.9);
    }

    .overlay-content {
        position: relative;
        top: 46%;
        width: 80%;
        text-align: center;
        margin-top: 30px;
        margin: auto;
    }

    .overlay .closebtn {
        position: absolute;
        top: 20px;
        right: 45px;
        font-size: 60px;
        cursor: pointer;
        color: white;
    }

    .overlay .closebtn:hover {
        color: red;
    }

    .overlay input[type=text] {
        padding: 15px;
        font-size: 17px;
        border: none;
        float: left;
        width: 80%;
        background: white;
        border-radius: 5px;
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .overlay input[type=text]:hover {
        background: #f1f1f1;
    }

    .overlay input[type=text]:focus {
        color: #000;
    }

    .overlay button {
        float: left;
        width: 20%;
        padding: 15px;
        background: beige;
        color: black;
        font-size: 17px;
        border: none;
        cursor: pointer;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
    }

    .overlay button:hover {
        background: #bbb;
    }
</style>

<header>
    <div class="header-main">
        <div class="header-item">
            <div class="header-top">
                <div class="container">
                    <div class="top-item">
                        <div class="top-search">
                            <div class="search-icon">
                                <i class="fa fa-search openBtn" onclick="openSearch()"></i>
                            </div>
                        </div>

                        <div id="myOverlay" class="overlay">
                            <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
                            <div class="overlay-content">
                                <form action="{{route('search.post')}}" method="POST">
                                    @csrf
                                    <input type="text" placeholder="Search.." name="search">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <div class="top-logo">
                            <a href="{{route('index')}}">
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

<script>
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }
</script>
