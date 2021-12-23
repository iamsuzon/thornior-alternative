@extends('layouts.admin_loggedin_app')

@section('content')
    <style>
        .dataTables_wrapper .dataTables_length select {
            padding: 2px;
        }

        .dataTables_wrapper .dataTables_filter input {
            padding: 2px;
        }

        .paginate_button {
            padding: 0 10px !important;
        }
    </style>

    <div class="col-lg-9 col-12">
        <div class="bloger-card">
            <div class="table-responsive blogs-body">
                @if (Session::has('success'))
                    <div class="alert alert-info text-capitalize">{{ Session::get('success') }}</div>
                @endif
                <table id="myTable" class="display pt-3">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th>Country</th>
                        <th>Role</th>
                        <th>Done</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts['all'] as $account)
                        <tr>
                            <td>
                                <div class="table-item">
                                    <div class="item-thumb">
                                        @if($account->blog_name)
                                            <img src="{{asset('upload/blogger/avatar')}}/{{$account->blogger->image}}"
                                                 alt="">
                                        @else
                                            <img src="{{asset('upload/user/avatar')}}/{{$account->image}}"
                                                 alt="">
                                        @endif
                                    </div>
                                    <div class="item-text">
                                        @if($account->blog_name)
                                            <h6>{{$account->blogger->name}}</h6>
                                        @else
                                            <h6>{{$account->name}}</h6>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            @if($account->blog_name)
                                <td>{{$account->blogger->email}}</td>
                                <td><span
                                        class="@if($account->blog_status == 'published') publis @else text-danger @endif">{{$account->blog_status}}</span>
                                </td>
                                <td>{{$account->created_at->diffForHumans()}}</td>
                                <td>{{$account->country->name}}</td>
                                <td>Blogger</td>
                                <td><span class="web"><span
                                            class="web">thornior.com/blogs/{{substr($account->blog_slug, 0, 20)}}..</span></span>
                                </td>
                                <td class="dropdown">
                                    <a href="0" class="dropdown-toggle" type="button" id="dropdownMenuButton2"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item" data-bs-toggle="modal"
                                               data-bs-target="#BlogModal{{$account->blog_slug}}" href="#">View
                                                Profle</a></li>
                                        {{--                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#BlogModal{{$blog->blog_slug}}">Info</a></li>--}}
                                        <li><a class="dropdown-item"
                                               href="{{route('admin.blogs.pause',$account->blog_slug)}}">@if($account->blog_status == 'published')
                                                    Pause account @else Publish account @endif</a></li>
                                        <li><a class="dropdown-item"
                                               href="{{route('admin.blogs.delete',$account->blog_slug)}}">Delete</a>
                                        </li>
                                    </ul>
                                </td>

                                <!-- profile modal -->
                                <div class="modal fade" id="BlogModal{{$account->blog_slug}}" tabindex="-1"
                                     aria-labelledby="infoExampleLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="blogger-admin p-0">
                                                    <div class="section-wrapper">
                                                        <div class="bloger-card mt-4">
                                                            <div
                                                                class="d-flex justify-content-between border-bottom pb-3 mb-3">
                                                                <div class="info-profile d-flex"
                                                                     style="margin-left: 15px">
                                                                    <div class="pro-thumb" style="margin-right: 10px">
                                                                        <img class="rounded-pill" width="50px"
                                                                             height="50px"
                                                                             src="{{asset('upload/blogger/avatar')}}/{{$account->blogger->image}}"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="pro-text ps-2">
                                                                        <h4 class="m-0">{{$account->blogger->name}}</h4>
                                                                        <span class="small">Blogger</span>
                                                                        <p class="m-0 text-black-50"><i
                                                                                class="fa fa-envelope me-2"></i> {{$account->blogger->email}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="blog-cl">
                                                                    <div
                                                                        class="cl-content d-flex justify-content-between mr-5">
                                                                        <div class="cl-item text-center">
                                                                            <h5>Posts</h5>
                                                                            <span>{{\App\Models\Image::where('blogger_id', $account->blogger->id)->count()}}</span>
                                                                        </div>
                                                                        <div class="ml-4 cl-item text-center">
                                                                            <h5>Videos</h5>
                                                                            <span>{{\App\Models\Video::where('blogger_id', $account->blogger->id)->count()}}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="info-post">
                                                                <div class="post-title">
                                                                    <h4 class="m-0">Latest Post</h4>
                                                                </div>
                                                                @php
                                                                    $videos = \App\Models\Video::orderBy('created_at','DESC')
                                                                            ->where('blogger_id', $account->blogger->id)->limit(4)->get();

                                                                    $images = \App\Models\Image::orderBy('created_at','DESC')
                                                                            ->where('blogger_id', $account->blogger->id)->limit(4)->get();

                                                                    $posts = [];
                                                                    $index = 0;
                                                                    foreach($videos as $video)
                                                                        {
                                                                            $posts[$index] = $video;
                                                                            $index++;
                                                                        }
                                                                    foreach($images as $image)
                                                                        {
                                                                            $posts[$index] = $image;
                                                                            $index++;
                                                                        }

                                                                    $posts = collect($posts)->sortBy('created_at')->reverse();
                                                                @endphp
                                                                <ul class="post-list list-unstyled m-0"
                                                                    style="max-height: 300px; overflow-y: scroll;">
                                                                    @foreach($posts as $post)
                                                                        <li class="d-flex m-3 mb-4 align-items-besline">
                                                                            <div class="item-date text-center">
                                                                                    <span
                                                                                        class="small">{{$post->created_at->format('D')}}</span>
                                                                                <strong class="d-block text-dark"
                                                                                        style="font-size: 25px">{{$post->created_at->format('d')}}</strong>
                                                                            </div>
                                                                            <div class="item-thumb ms-2">
                                                                                <a href="{{route('post.show',[$post->post_type,$post->slug])}}">
                                                                                    <img class="rounded"
                                                                                         src="{{asset($post->medias[0]->address)}}"
                                                                                         width="100px" height="50px"
                                                                                         alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="item-text ps-2">
                                                                                <a href="{{route('post.show',[$post->post_type,$post->slug])}}">
                                                                                    <small>{{$post->created_at->diffForHumans()}}</small>
                                                                                    <h6 class="mb-1"
                                                                                        style="font-size: 14px; line-height: 1;">
                                                                                        {{substr($post->title, 0, 200)}}
                                                                                    </h6>
                                                                                </a>
                                                                                <div class="text-aut">
                                                                                    <a href="{{route('blog',$post->blogger->blog->blog_slug)}}">
                                                                                        <img class="rounded-pill"
                                                                                             src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                                                             height="20px"
                                                                                             width="20px" alt="">
                                                                                        <span>By: <strong
                                                                                                class="text-dark"
                                                                                                style="font-size: 14px;">{{$post->blogger->blog->blog_name}}</strong></span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- profile modal -->
                            @else
                                <td>{{$account->email}}</td>
                                <td><span
                                        class="publis">Approved</span>
                                </td>
                                <td>{{$account->created_at->diffForHumans()}}</td>
                                <td>{{$account->country->name}}</td>
                                <td>Visitor</td>
                                <td><span class="web"><span
                                            class="web"></span></span></td>
                                <td class="dropdown">
                                    <a href="0" class="dropdown-toggle" type="button" id="dropdownMenuButton2"
                                       data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item"
                                               href="{{route('admin.user.delete',$account->id)}}">Delete</a></li>
                                    </ul>
                                </td>

                                <!-- profile modal -->
                                <div class="modal fade" id="BlogModal{{$account->id}}" tabindex="-1"
                                     aria-labelledby="infoExampleLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body p-0">
                                                <div class="blogger-admin p-0">
                                                    <div class="section-wrapper">
                                                        <div class="bloger-card mt-4">
                                                            <div
                                                                class="d-flex justify-content-between border-bottom pb-3 mb-3">
                                                                <div class="info-profile d-flex">
                                                                    <div class="pro-thumb">
                                                                        <img class="rounded-pill" width="50px"
                                                                             height="50px"
                                                                             src="{{asset('upload/user/avatar')}}/{{$account->image}}"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="pro-text ps-2">
                                                                        <h4 class="m-0">{{$account->name}}</h4>
                                                                        <span class="small">Visitor</span>
                                                                        <p class="m-0 text-black-50"><i
                                                                                class="fa fa-envelope me-2"></i> {{$account->email}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                {{--                                                            <div class="blog-cl">--}}
                                                                {{--                                                                <div class="cl-content d-flex justify-content-between mr-5">--}}
                                                                {{--                                                                    <div class="cl-item text-center">--}}
                                                                {{--                                                                        <h5>Posts</h5>--}}
                                                                {{--                                                                        <span>12</span>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                    <div class="ml-4 cl-item text-center">--}}
                                                                {{--                                                                        <h5>Videos</h5>--}}
                                                                {{--                                                                        <span>05</span>--}}
                                                                {{--                                                                    </div>--}}
                                                                {{--                                                                </div>--}}
                                                                {{--                                                            </div>--}}
                                                            </div>
                                                            {{--                                                        <div class="info-post">--}}
                                                            {{--                                                            <div class="post-title">--}}
                                                            {{--                                                                <h4 class="m-0">Latest Post</h4>--}}
                                                            {{--                                                            </div>--}}
                                                            {{--                                                            <ul class="post-list list-unstyled m-0" style="max-height: 300px; overflow-y: scroll;">--}}
                                                            {{--                                                                <li class="d-flex m-3 align-items-besline">--}}
                                                            {{--                                                                    <div class="item-date text-center">--}}
                                                            {{--                                                                        <span class="small">Mon</span>--}}
                                                            {{--                                                                        <strong class="d-block">18</strong>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-thumb ms-2">--}}
                                                            {{--                                                                        <img class="rounded" src="assets/images/blog/01.png" width="50px" height="40px" alt="">--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-text ps-2">--}}
                                                            {{--                                                                        <small>28 minutes ago</small>--}}
                                                            {{--                                                                        <h6 class="mb-1" style="font-size: 14px; line-height: 1;">Get new inspiration to your leaving room, <br> here are a basic few tips.</h6>--}}
                                                            {{--                                                                        <div class="text-aut">--}}
                                                            {{--                                                                            <img class="rounded-pill" src="assets/images/blog/card/04.jpg" height="30px" width="30px" alt="">--}}
                                                            {{--                                                                            <span>By: <strong class="text-dark" style="font-size: 14px;">Yeasin Ar</strong></span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                                <li class="d-flex m-3 align-items-besline">--}}
                                                            {{--                                                                    <div class="item-date text-center">--}}
                                                            {{--                                                                        <span class="small">Mon</span>--}}
                                                            {{--                                                                        <strong class="d-block">18</strong>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-thumb ms-2">--}}
                                                            {{--                                                                        <img class="rounded" src="assets/images/blog/01.png" width="50px" height="40px" alt="">--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-text ps-2">--}}
                                                            {{--                                                                        <small>28 minutes ago</small>--}}
                                                            {{--                                                                        <h6 class="mb-1" style="font-size: 14px; line-height: 1;">Get new inspiration to your leaving room, <br> here are a basic few tips.</h6>--}}
                                                            {{--                                                                        <div class="text-aut">--}}
                                                            {{--                                                                            <img class="rounded-pill" src="assets/images/blog/card/04.jpg" height="30px" width="30px" alt="">--}}
                                                            {{--                                                                            <span>By: <strong class="text-dark" style="font-size: 14px;">Yeasin Ar</strong></span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                                <li class="d-flex m-3 align-items-besline">--}}
                                                            {{--                                                                    <div class="item-date text-center">--}}
                                                            {{--                                                                        <span class="small">Mon</span>--}}
                                                            {{--                                                                        <strong class="d-block">18</strong>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-thumb ms-2">--}}
                                                            {{--                                                                        <img class="rounded" src="assets/images/blog/01.png" width="50px" height="40px" alt="">--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-text ps-2">--}}
                                                            {{--                                                                        <small>28 minutes ago</small>--}}
                                                            {{--                                                                        <h6 class="mb-1" style="font-size: 14px; line-height: 1;">Get new inspiration to your leaving room, <br> here are a basic few tips.</h6>--}}
                                                            {{--                                                                        <div class="text-aut">--}}
                                                            {{--                                                                            <img class="rounded-pill" src="assets/images/blog/card/04.jpg" height="30px" width="30px" alt="">--}}
                                                            {{--                                                                            <span>By: <strong class="text-dark" style="font-size: 14px;">Yeasin Ar</strong></span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                                <li class="d-flex m-3 align-items-besline">--}}
                                                            {{--                                                                    <div class="item-date text-center">--}}
                                                            {{--                                                                        <span class="small">Mon</span>--}}
                                                            {{--                                                                        <strong class="d-block">18</strong>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-thumb ms-2">--}}
                                                            {{--                                                                        <img class="rounded" src="assets/images/blog/01.png" width="50px" height="40px" alt="">--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-text ps-2">--}}
                                                            {{--                                                                        <small>28 minutes ago</small>--}}
                                                            {{--                                                                        <h6 class="mb-1" style="font-size: 14px; line-height: 1;">Get new inspiration to your leaving room, <br> here are a basic few tips.</h6>--}}
                                                            {{--                                                                        <div class="text-aut">--}}
                                                            {{--                                                                            <img class="rounded-pill" src="assets/images/blog/card/04.jpg" height="30px" width="30px" alt="">--}}
                                                            {{--                                                                            <span>By: <strong class="text-dark" style="font-size: 14px;">Yeasin Ar</strong></span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                                <li class="d-flex m-3 align-items-besline">--}}
                                                            {{--                                                                    <div class="item-date text-center">--}}
                                                            {{--                                                                        <span class="small">Mon</span>--}}
                                                            {{--                                                                        <strong class="d-block">18</strong>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-thumb ms-2">--}}
                                                            {{--                                                                        <img class="rounded" src="assets/images/blog/01.png" width="50px" height="40px" alt="">--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                    <div class="item-text ps-2">--}}
                                                            {{--                                                                        <small>28 minutes ago</small>--}}
                                                            {{--                                                                        <h6 class="mb-1" style="font-size: 14px; line-height: 1;">Get new inspiration to your leaving room, <br> here are a basic few tips.</h6>--}}
                                                            {{--                                                                        <div class="text-aut">--}}
                                                            {{--                                                                            <img class="rounded-pill" src="assets/images/blog/card/04.jpg" height="30px" width="30px" alt="">--}}
                                                            {{--                                                                            <span>By: <strong class="text-dark" style="font-size: 14px;">Yeasin Ar</strong></span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                            </ul>--}}
                                                            {{--                                                        </div>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- profile modal -->
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="bloger-card mb-4 mt-4 mt-md-0">
            <div class="blogs-header pb-3">
                <div class="active-status">
                    <h4>Activity</h4>
                </div>
                <div class="view-more">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#activityModal">See All</a>
                </div>

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
                                               href="{{route('blog',$active->blogger->blog->blog_slug)}}">
                                                <li>
                                                    <div class="item-thumb" style="width: 12%">
                                                        <img
                                                            src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}"
                                                            alt="" style="width: 40px;height: 40px">
                                                    </div>
                                                    <div class="item-text">
                                                        <h6>{{$active->blogger->name}} <span>has made a {{$active->template_type}} post</span>
                                                        </h6>
                                                        <span>{{$active->created_at->diffForHumans()}}</span>
                                                    </div>
                                                </li>
                                            </a>
                                        @empty
                                            <li>No activity to show</li>
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
                           href="{{route('blog',$active->blogger->blog->blog_slug)}}">
                            <li>
                                <div class="item-thumb">
                                    <img src="{{asset('upload/blogger/avatar')}}/{{$active->blogger->image}}" alt="">
                                </div>
                                <div class="item-text">
                                    <h6>{{$active->blogger->name}}
                                        <span>has made a {{$active->template_type}} post</span></h6>
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
                    <h4>Create account</h4>
                </div>
                <div class="view-more">
                    <a href="" data-bs-toggle="modal" data-bs-target="#RequestModel">See All</a>
                </div>
            </div>
            <div class="blogs-body">
                <div class="crate-account">
                    <div class="ac-content">
                        <div class="left-titel">
                            <h6>In progress</h6>
                            <h6>Status</h6>
                        </div>
                        <div class="left-body">
                            @forelse($bloggers as $blogger)
                                @if($loop->index == 5) @break @endif
                                <div class="ac-item border-bottom">
                                    <div class="item-text">
                                        <h6>{{$blogger->name}} - <span class="text-info">Blogger</span></h6>
                                        <p>{{$blogger->email}}</p>
                                        <span>{{$blogger->created_at->format('d M Y')}}</span>
                                    </div>
                                    <div class="item-link">
                                        @if($blogger->account_status == 1)
                                            <a style="background: #000"
                                               href="{{route('admin.blogger.account.giveapproval',$blogger->id)}}"><span>Approve</span></a>
                                        @else
                                            <a class="disabled" href="#"><span>Link Sent</span></a>
                                            <a style="background: #000"
                                               href="{{route('admin.blogger.sent.again',$blogger->email)}}"><span>Send Again</span></a>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="ac-item border-bottom">
                                    <div class="item-text">
                                        <span>No pending request</span>
                                    </div>
                                </div>
                            @endforelse

                            @forelse($pending_users as $user)
                                @if($loop->index == 5) @break @endif
                                <div class="ac-item border-bottom">
                                    <div class="item-text">
                                        <h6>{{$user->name}} - <span class="text-info">Visitor</span></h6>
                                        <p>{{$user->email}}</p>
                                        <span>{{$user->created_at->format('d M Y')}}</span>
                                    </div>
                                    <div class="item-link">
                                        @if($user->email_verified_at != null)
                                            <a style="background: #000"
                                               href="{{route('admin.user.account.giveapproval',$user->id)}}"><span>Approve</span></a>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="ac-item border-bottom">
                                    <div class="item-text">
                                        <span>No pending request</span>
                                    </div>
                                </div>
                            @endforelse

                            <div class="ac-create mt-3">
                                <a href="{{route('admin.blogger.create')}}"><span><i class="fa fa-plus"></i></span>
                                    <span>Create New account</span></a>

                                <!-- promo code modal -->
                                <!-- Modal -->
                                <div class="modal fade" id="RequestModel" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="bloger-card modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="blogs-body">
                                                @forelse($bloggers as $blogger)
                                                    @if($loop->index == 5) @break @endif
                                                    <div class="ac-item border-bottom">
                                                        <div class="item-text">
                                                            <h6>{{$blogger->name}}</h6>
                                                            <p>{{$blogger->email}}</p>
                                                            <span>{{$blogger->created_at->format('d M Y')}}</span>
                                                        </div>
                                                        <div class="item-link">
                                                            @if($blogger->account_status == 1)
                                                                <a href="{{route('admin.blogger.account.giveapproval',$blogger->id)}}"><span>Approve</span></a>
                                                            @else
                                                                <a class="disabled" href="#"><span>Link Sent</span></a>
                                                                <a style="background: #000"
                                                                   href="{{route('admin.blogger.sent.again',$blogger->email)}}"><span>Send Again</span></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="ac-item border-bottom">
                                                        <div class="item-text">
                                                            <span style="font-size: 15px">No pending request</span>
                                                        </div>
                                                    </div>
                                                @endforelse

                                                @forelse($pending_users as $user)
                                                    @if($loop->index == 5) @break @endif
                                                    <div class="ac-item border-bottom">
                                                        <div class="item-text">
                                                            <h6>{{$user->name}} - <span class="text-info">Visitor</span>
                                                            </h6>
                                                            <p>{{$user->email}}</p>
                                                            <span>{{$user->created_at->format('d M Y')}}</span>
                                                        </div>
                                                        <div class="item-link">
                                                            @if($user->email_verified_at != null)
                                                                <a href="{{route('admin.user.account.giveapproval',$user->id)}}"><span>Approve</span></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="ac-item border-bottom">
                                                        <div class="item-text">
                                                            <span style="font-size: 15px">No pending request</span>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- promo code modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
