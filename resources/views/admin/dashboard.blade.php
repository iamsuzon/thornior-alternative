@extends('layouts.admin_loggedin_app')

@section('content')
    <style>
        .blogeractive-item {
            overflow-y: hidden !important;
        }

        .blogeractive-item:hover {
            overflow-y: scroll !important;
        }

        .blogeractive-item a {
            padding: 10px;
            border-radius: 5px;
        }

        .blogeractive-item a:hover {
            background: #F4F5FF;
        }

        .blogger-admin .section-wrapper .bloger-card .blogs-body .offline li .list-thumb::after {
            background: none;
        }

        .blogger-admin .section-wrapper .bloger-card .blogs-body .blogger-list {
            justify-content: left;
        }
    </style>
    <div class="col-lg-9 col-12">
        <div class="bloger-card mb-4">
            <div class="blogs-header">
                <div class="active-status">
                    <h4>Blogs</h4>
                </div>
                <div class="view-more">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#activeModal">See All</a>
                </div>
            </div>
            <div class="blogs-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <span><strong class="me-1">Active</strong>now</span>
                        <ul class="blogger-list">
                            @foreach($bloggers as $blogger)
                                @break($loop->index == 4)
                                @if(\Illuminate\Support\Facades\Cache::has('blogger-is-online-' . $blogger->id))
                                    <li>
                                        <a href="{{route('blog',$blogger->blog->blog_slug)}}" target="_blank">
                                            <div class="list-thumb">
                                                <img src="{{asset('upload/blogger/avatar')}}/{{$blogger->image}}"
                                                     alt="">
                                            </div>
                                            <div class="list-text">
                                                <span>{{substr($blogger->blog->blog_name,0,12)}}..</span>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6 col-12">
                        <span><strong class="me-1">Active</strong>today</span>
                        <ul class="blogger-list offline">
                            @foreach($bloggers as $blogger)
                                @break($loop->index == 4)
                                @if(!\Illuminate\Support\Facades\Cache::has('blogger-is-online-' . $blogger->id) AND $blogger->last_seen->format('Y-m-d') == \Carbon\Carbon::today()->format('Y-m-d'))
                                    <li>
                                        <a href="{{route('blog',$blogger->blog->blog_slug)}}" target="_blank">
                                            <div class="list-thumb">
                                                <img src="{{asset('upload/blogger/avatar')}}/{{$blogger->image}}"
                                                     alt="">
                                            </div>
                                            <div class="list-text">
                                                <span>{{substr($blogger->blog->blog_name,0,12)}}..</span>
                                            </div>
                                            <span
                                                style="font-size: 10px">{{\Carbon\Carbon::parse($blogger->last_seen)->diffForHumans()}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="activeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bloggers Online Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="blogs-body">
                                    <h5>Online</h5>
                                    <ul class="blogger-list">
                                        @foreach($bloggers as $blogger)
                                            @if(\Illuminate\Support\Facades\Cache::has('blogger-is-online-' . $blogger->id))
                                                <li>
                                                    <a href="{{route('blog',$blogger->blog->blog_slug)}}"
                                                       target="_blank">
                                                        <div class="list-thumb">
                                                            <img
                                                                src="{{asset('upload/blogger/avatar')}}/{{$blogger->image}}"
                                                                alt="">
                                                        </div>
                                                        <div class="list-text">
                                                            <span>{{substr($blogger->blog->blog_name,0,12)}}..</span>
                                                        </div>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <hr class="my-4">

                                    <h5>Offline</h5>
                                    <ul class="blogger-list offline">
                                        @foreach($bloggers as $blogger)
                                            @if(!\Illuminate\Support\Facades\Cache::has('blogger-is-online-' . $blogger->id) AND $blogger->last_seen->format('Y-m-d') == \Carbon\Carbon::today()->format('Y-m-d'))
                                                <li>
                                                    <a href="{{route('blog',$blogger->blog->blog_slug)}}"
                                                       target="_blank">
                                                        <div class="list-thumb">
                                                            <img
                                                                src="{{asset('upload/blogger/avatar')}}/{{$blogger->image}}"
                                                                alt="">
                                                        </div>
                                                        <div class="list-text">
                                                            <span>{{substr($blogger->blog->blog_name,0,12)}}..</span>
                                                        </div>
                                                        <span
                                                            style="font-size: 10px">{{\Carbon\Carbon::parse($blogger->last_seen)->diffForHumans()}}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        <div class="bloger-card mb-4">--}}
        {{--            <div class="blogs-header">--}}
        {{--                <div class="active-status">--}}
        {{--                    <h4>Pages</h4>--}}
        {{--                </div>--}}
        {{--                <div class="view-more">--}}
        {{--                    <a href="#0">See All</a>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <div class="blogs-body">--}}
        {{--                <div class="row">--}}
        {{--                    <div class="col-lg-4 col-md-6 col-12">--}}
        {{--                        <div class="card">--}}
        {{--                            <div class="card-thumb">--}}
        {{--                                <img src="assets/images/blog/latest/01.jpg" alt="">--}}
        {{--                            </div>--}}
        {{--                            <div class="card-text">--}}
        {{--                                <p>User Friendly, Theme, Layout</p>--}}
        {{--                                <h6>Name Template</h6>--}}
        {{--                                <div class="text-footer">--}}
        {{--                                    <div class="fot-thumb">--}}
        {{--                                        <img src="assets/images/blog/latest/01.png" alt="">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="fot-text">--}}
        {{--                                        <h6>Adapted For Videos</h6>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-4 col-md-6 col-12 mt-4 mt-md-0">--}}
        {{--                        <div class="card">--}}
        {{--                            <div class="card-thumb">--}}
        {{--                                <img src="assets/images/blog/latest/03.jpg" alt="">--}}
        {{--                            </div>--}}
        {{--                            <div class="card-text">--}}
        {{--                                <p>User Friendly, Theme, Layout</p>--}}
        {{--                                <h6>Name Template</h6>--}}
        {{--                                <div class="text-footer">--}}
        {{--                                    <div class="fot-thumb">--}}
        {{--                                        <img src="assets/images/blog/latest/01.png" alt="">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="fot-text">--}}
        {{--                                        <h6>Adapted For Videos</h6>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0">--}}
        {{--                        <div class="card">--}}
        {{--                            <div class="card-thumb">--}}
        {{--                                <img src="assets/images/blog/latest/02.jpg" alt="">--}}
        {{--                            </div>--}}
        {{--                            <div class="card-text">--}}
        {{--                                <p>User Friendly, Theme, Layout</p>--}}
        {{--                                <h6>Name Template</h6>--}}
        {{--                                <div class="text-footer">--}}
        {{--                                    <div class="fot-thumb">--}}
        {{--                                        <img src="assets/images/blog/latest/01.png" alt="">--}}
        {{--                                    </div>--}}
        {{--                                    <div class="fot-text">--}}
        {{--                                        <h6>Adapted For Videos</h6>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="row">
            {{--            <div class="col-md-12 col-12">--}}
            {{--                <div class="bloger-card">--}}
            {{--                    <div class="blogs-header">--}}
            {{--                        <div class="active-status">--}}
            {{--                            <h4>Advertisment</h4>--}}
            {{--                        </div>--}}
            {{--                        <div class="view-more">--}}
            {{--                            <a href="#0">See All</a>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                    <div class="blogs-body">--}}
            {{--                        <ul class="add-list">--}}
            {{--                            <li>--}}
            {{--                                <div class="add-item active">--}}
            {{--                                    <div class="item-left">--}}
            {{--                                        <div class="item-thumb">--}}
            {{--                                            <img src="{{asset('upload/blogger_image_post/placeholder-1.png')}}" alt="">--}}
            {{--                                        </div>--}}
            {{--                                        <div class="item-text">--}}
            {{--                                            <span>Company</span>--}}
            {{--                                            <h6>Top Banner</h6>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-middle">--}}
            {{--                                        <span><i class="far fa-calendar-alt"></i></span><span>2021/02/01</span>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-right">--}}
            {{--                                        <i class="fas fa-ellipsis-v"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <div class="add-item">--}}
            {{--                                    <div class="item-left">--}}
            {{--                                        <div class="item-thumb">--}}
            {{--                                            <img src="{{asset('upload/blogger_image_post/placeholder-1.png')}}" alt="">--}}
            {{--                                        </div>--}}
            {{--                                        <div class="item-text">--}}
            {{--                                            <span>Company</span>--}}
            {{--                                            <h6>Top Banner</h6>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-middle">--}}
            {{--                                        <span><i class="far fa-calendar-alt"></i></span><span>2021/02/01</span>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-right">--}}
            {{--                                        <i class="fas fa-ellipsis-v"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                            <li>--}}
            {{--                                <div class="add-item">--}}
            {{--                                    <div class="item-left">--}}
            {{--                                        <div class="item-thumb">--}}
            {{--                                            <img src="{{asset('upload/blogger_image_post/placeholder-1.png')}}" alt="">--}}
            {{--                                        </div>--}}
            {{--                                        <div class="item-text">--}}
            {{--                                            <span>Company</span>--}}
            {{--                                            <h6>Top Banner</h6>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-middle">--}}
            {{--                                        <span><i class="far fa-calendar-alt"></i></span><span>2021/02/01</span>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="item-right">--}}
            {{--                                        <i class="fas fa-ellipsis-v"></i>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </li>--}}
            {{--                        </ul>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="col-md-12 col-12 mt-4">
                <div class="bloger-card">
                    <div class="blogs-header">
                        <div class="active-status">
                            <h4>Analytics</h4>
                        </div>
                        <div class="view-more d-flex">
                            <form action="{{route('admin.dashboard')}}" method="POST">
                                @csrf
                                @if($format == 'week')
                                    <button name="month" value="month" type="submit"
                                            class="btn bg-white text-dark me-2">Week
                                    </button>
                                @else
                                    <button name="week" value="week" type="submit" class="btn bg-white text-dark me-2">
                                        Month
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="blogs-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="bloger-card mb-4">
            <div class="blogs-header pb-3">
                <div class="active-status">
                    <h4>Activity</h4>
                </div>
                <div class="view-more">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#activityModal">See All</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bloggers Activities</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="blogs-body">
                                    <ul class="blogeractive-item">
                                        @forelse($activity as $active)
                                            <a style="display: block" class="@if($loop->first) mt-1 @else mt-3 @endif"
                                               @if($active->slug)
                                               href="{{route('post.show',[$active->template_type,$active->slug])}}">
                                                @else
                                                    href="{{route('blog',$active->blogger->blog->blog_slug)}}">
                                                @endif
                                                <li>
                                                    <div class="item-thumb" style="width: 12%">
                                                        <img
                                                            src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}"
                                                            alt="" style="width: 40px;height: 40px">
                                                    </div>
                                                    <div class="item-text">
                                                        <h6>{{$active->blogger->name}}
                                                            @if($active->slug)
                                                                <span>has made a {{$active->template_type}} post</span>
                                                            @else
                                                                <span>has made changes in his blog</span>
                                                            @endif
                                                        </h6>
                                                        <span>{{$active->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </li>
                                            </a>
                                        @empty
                                            <li>
                                                <div class="item-text">
                                                    <span>No activity to show</span>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blogs-body">
                <ul class="blogeractive-item">
                    @forelse($activity as $active)
                        @if($loop->index == 10) @break @endif
                        <a class="@if($loop->first) mt-1 @else mt-3 @endif"
                           @if($active->slug)
                           href="{{route('post.show',[$active->template_type,$active->slug])}}"
                           @else
                           href="{{route('blog',$active->blogger->blog->blog_slug)}}"
                           @endif
                           target="_blank">
                            <li>
                                <div class="item-thumb">
                                    <img src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}" alt="">
                                </div>
                                <div class="item-text">
                                    <h6>{{$active->blogger->name}}
                                        @if($active->slug)
                                            <span>has made a {{$active->template_type}} post</span></h6>
                                    @else
                                        <span>has made changes in his blog</span></h6>
                                    @endif
                                    <span>{{$active->created_at->diffForHumans()}}</span>
                                </div>
                            </li>
                        </a>
                    @empty
                        <li>
                            <div class="item-text">
                                <span>No activity to show</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="bloger-card">
            <div class="blogs-header">
                <div class="active-status">
                    <h4>Calendar</h4>
                </div>
                <div class="view-more">
                    <a href="#0">Months</a>
                </div>
            </div>
            <div class="blogs-body">
                <div id="datepicker"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{--        <script src="{{asset('backend/assets/js/line-chart.js')}}"></script>--}}

    <script>
        const labels = [
            @foreach($views as $view)
                @foreach($view as $month)
                @if($format == 'week')
                '{{$month->created_at->format('l')}}',
            @else
                '{{$month->created_at->format('M')}}',
            @endif
            @break
            @endforeach
            @endforeach
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Website Views',
                backgroundColor: '#000',
                borderColor: '#333',
                pointBorderWidth: 8,
                pointHoverBorderWidth: 10,
                tension: 0.2,
                data: [@foreach($views as $view) {{count($view)}}, @endforeach],
            }]
        };

        const config = {
            type: 'line',
            data,
            options: {}
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endsection
