@include('layouts.all_styles')

<div class="text-center">
<img style="margin-bottom: 65px;" src="{{asset('backend/bloggerPanel/Templates/'.$type.'/'.'v'.$id.'.png')}}" alt="" width="80%" height="auto">
</div>
    <nav class="navbar fixed-bottom navbar-light bg-light d-flex justify-content-center" style="box-shadow: 0px -2px 5px rgba(100,100,100,0.2)">
    <ul class="text-center py-2 mb-0">
        <li class="d-inline-block" style="margin-right: 10px"><a class="btn btn-secondary" href="{{route('blogger.blog.post'.'.'.$type.'.'.'index'.'.'.$id)}}">Select</a></li>
        <li class="d-inline-block" style="margin-left: 10px"><a class="btn btn-secondary" href="{{route('blogger.blog.post.templates')}}">Cancel</a></li>
    </ul>
</nav>

@include('layouts.all_scripts')
