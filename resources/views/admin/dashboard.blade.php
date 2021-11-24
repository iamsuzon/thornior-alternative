@extends('layouts.admin_loggedin_app')

@section('content')
    <div class="col-lg-9 col-12">
{{--        <div class="bloger-card mb-4">--}}
{{--            <div class="blogs-header">--}}
{{--                <div class="active-status">--}}
{{--                    <h4>Blogs</h4>--}}
{{--                </div>--}}
{{--                <div class="view-more">--}}
{{--                    <a href="#0">See All</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="blogs-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-12">--}}
{{--                        <span><strong class="me-1">Active</strong>now</span>--}}
{{--                        <ul class="blogger-list">--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/01.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/02.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/03.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/04.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-12">--}}
{{--                        <span><strong class="me-1">Active</strong>today</span>--}}
{{--                        <ul class="blogger-list">--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/06.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/07.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/08.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="list-thumb">--}}
{{--                                    <img src="assets/images/blog/card/09.jpg" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="list-text">--}}
{{--                                    <span>Malize mons</span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
            {{--            <div class="col-md-6 col-12">--}}
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
            {{--                                            <img src="assets/images/blog/latest/02.jpg" alt="">--}}
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
            {{--                                            <img src="assets/images/blog/latest/02.jpg" alt="">--}}
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
            {{--                                            <img src="assets/images/blog/latest/02.jpg" alt="">--}}
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
            <div class="col-md-12 col-12">
                <div class="bloger-card">
                    <div class="blogs-header">
                        <div class="active-status">
                            <h4>Analytics</h4>
                        </div>
                        <div class="view-more d-flex">
                            {{--                            <a href="#0" class="me-2">Week</a>--}}
                            {{--                            <a href="#0">Views</a>--}}
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
                <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bloggers Activities</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="blogs-body">
                                    <ul class="blogeractive-item">
                                        @foreach($activity as $active)
                                            <a style="display: block" class="@if($loop->first) mt-1 @else mt-3 @endif" href="{{route('blog',$active->blogger->blog->blog_slug)}}">
                                                <li>
                                                    <div class="item-thumb" style="width: 12%">
                                                        <img src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}" alt="" style="width: 40px;height: 40px">
                                                    </div>
                                                    <div class="item-text">
                                                        <h6>{{$active->blogger->name}} <span>has made a {{$active->template_type}} post</span></h6>
                                                        <span>{{$active->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </li>
                                            </a>
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
            <div class="blogs-body">
                <ul class="blogeractive-item">
                    @foreach($activity as $active)
                        @if($loop->index == 10) @break @endif
                        <a class="@if($loop->first) mt-1 @else mt-3 @endif" href="{{route('blog',$active->blogger->blog->blog_slug)}}">
                            <li>
                                <div class="item-thumb">
                                    <img src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}" alt="">
                                </div>
                                <div class="item-text">
                                    <h6>{{$active->blogger->name}} <span>has made a {{$active->template_type}} post</span></h6>
                                    <span>{{$active->created_at->diffForHumans()}}</span>
                                </div>
                            </li>
                        </a>
                    @endforeach
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
    {{--    <script src="{{asset('backend/assets/js/line-chart.js')}}"></script>--}}

    <script>
        const labels = [
            @foreach($views as $view)
                @foreach($view as $month)
                '{{$month->created_at->format('M')}}',
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
