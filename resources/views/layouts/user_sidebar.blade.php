<div class="vertical-sidebar" id="slideNav">
    <div class="sidebar-content">
        <div class="brand-logo">
            <a href="{{route('index')}}">
                <img src="{{asset('backend/assets/images/logo/01.png')}}" alt="">
            </a>
            <span class="close-icon d-md-none float-end me-2" onclick="menuAnimation(this)">
                    <i class="fa fa-times"></i>
                </span>
        </div>
        <div class="sidebar-menu">
            <ul class="menu-list mt-4">
                <li><a href="{{route('user.dashboard')}}" @if(Route::currentRouteName() == 'user.dashboard')class="active" @endif><span><i class="fas fa-th-large"></i></span><span class="ml-3">Overview</span></a></li>
{{--                <li><a href="{{route('user.dashboard')}}" @if(Route::currentRouteName() == 'user.dashboard')class="active" @endif><span><i class="fab fa-blogger-b"></i></span><span class="ml-3">Feed</span></a></li>--}}
{{--                <li><a href="#0"><span><i class="fas fa-book-open"></i></span><span class="ml-3">Library</span></a></li>--}}
                <li><a href="{{route('user.settings')}}" @if(Route::currentRouteName() == 'user.settings')class="active" @endif><span><i class="fas fa-cog"></i></span><span class="ml-3">Settings</span></a></li>
            </ul>

            <ul class="menu-list mt-5">
                <h6 class="ml-3">Library</h6>
                <li><a href="{{route('user.saved')}}" @if(Route::currentRouteName() == 'user.saved')class="active" @endif><span><i class="fas fa-bookmark"></i></span><span class="ml-3">Saved</span></a></li>
                <li><a href="{{route('user.liked')}}" @if(Route::currentRouteName() == 'user.liked')class="active" @endif><span><i class="fas fa-heart"></i></span><span class="ml-3">Liked</span></a></li>
                <li><a href="{{route('user.collection')}}" @if(Route::currentRouteName() == 'user.collection')class="active" @endif><span><i class="fas fa-list-alt"></i></span><span class="ml-3">Collections</span></a></li>
            </ul>
        </div>

    </div>
</div>
