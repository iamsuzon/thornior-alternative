@extends('layouts.blogger_loggedin_app')

@section('content')
    <style>
        .button-wrap {
            position: relative;
            text-align: center;
            top: 50%;
            margin-top: -2.5em;
        }

        @media (max-width: 40em) {
            .button-wrap {
                margin-top: -1.5em;
            }
        }

        .button-label {
            display: inline-block;
            padding: 5px 20px;
            padding-bottom: 0;
            margin: 0.5em;
            cursor: pointer;
            color: grey;
            border: 2px solid grey;
            border-radius: 5px;
            background: transparent;
            transition: 0.3s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .button-label h1 {
            font-size: 0.8em;
            color: grey;
            font-family: "Lato", sans-serif;
        }

        .button-label:hover {
            background: #000000;
            color: #FFFFFF;
            border-color: #000000;
        }

        .button-label:hover h1 {
            color: #FFFFFF;
        }

        .button-label:active {
            transform: translateY(2px);
        }

        @media (max-width: 40em) {
            .button-label {
                padding: 0em 1em 3px;
                margin: 0.25em;
            }
        }

        #yes-button:checked + .button-label {
            background: #000000;
            color: #FFFFFF;
            border-color: #000000;
        }

        #yes-button:checked + .button-label h1 {
            color: #FFFFFF;
        }

        #yes-button:checked + .button-label:hover {
            background: #000000;
            color: #e2e2e2;
        }

        #no-button:checked + .button-label {
            background: #000000;
            color: #FFFFFF;
            border-color: #000000;
        }

        #no-button:checked + .button-label h1 {
            color: #FFFFFF;
        }

        #no-button:checked + .button-label:hover {
            background: #000000;
            color: #FFFFFF;
            border-color: #000000;
        }

        #maybe-button:checked + .button-label {
            background: #000000;
            color: #FFFFFF;
            border-color: #000000;
        }

        #maybe-button:checked + .button-label h1 {
            color: #FFFFFF;
        }

        #maybe-button:checked + .button-label:hover {
            background: #000000;
            color: #FFFFFF;
        }

        .hidden {
            display: none;
        }

        .ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
            font-size: 13px;
        }
    </style>

    <!-- page header start -->
    <section class="blogger-page-header"
             @if((Auth::user()->blog->image != null)) style="background-image: url({{asset('upload/blogger/blog')}}/{{Auth::user()->blog->image}})"
             @else style="background-image: url({{asset('upload/blogger/blog/placeholder.jpg')}}" @endif>
        <div class="header-content">
            <span>@if(isset(Auth::user()->blog->region)) {{Auth::user()->blog->country->name}} @endif</span>
            <h3>{{Auth::user()->blog->blog_name}}</h3>
            <span class="update">{{Auth::user()->blog->updated_at->format('d M Y')}}</span>
            {{--            <button type="button" class="btn"><span>Create Mode</span></button>--}}
        </div>
    </section>
    <!-- page header ends  -->

    <!-- overview area start -->
    <section class="overview-blogger">
        <div class="container">
            <div class="section-header">
                <h3>Pages</h3>
                @if (session('success'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="section-wrapper">
                <div id="tabs">
                    <ul>
                        <li><a href="#tabs-1">Published</a></li>
                        <li><a href="#tabs-2">About</a></li>
                        {{--                        <li><a href="#tabs-2">Blogs</a></li>--}}
                    </ul>
                    <div id="tabs-1">
                        <div class="published-table mt-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th>
                                            <img
                                                src="https://thumbs.dreamstime.com/b/blog-icon-dark-background-simple-vector-116865750.jpg"
                                                alt="">
                                        </th>
                                        <td>
                                            <div class="publis-text">
                                                <h6>Blog</h6>
                                                <span>User friendly layout</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-date">
                                                {{--                                                <i class="fas fa-calendar-week"></i>--}}
                                                {{--                                                <div class="des-text">--}}
                                                {{--                                                    <span>Last Update</span>--}}
                                                {{--                                                    @if(isset($status))--}}
                                                {{--                                                        <p></p>--}}
                                                {{--                                                    @endif--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-btn">
                                                {{--                                                <button type="button" class="btn edit-btn"><span>Edit</span></button>--}}
                                                {{--                                                <button type="button" class="btn"><span>Published</span></button>--}}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <img src="https://cdn.iconscout.com/icon/free/png-256/compose-63-458703.png"
                                                 alt="">
                                        </th>
                                        <td>
                                            <div class="publis-text">
                                                <h6>Posts</h6>
                                                <span>User friendly layout</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-date">
                                                <i class="fas fa-calendar-week"></i>
                                                <div class="des-text">
                                                    <span>Last Update</span>
                                                    @if(isset($status['post_section']))
                                                        <p>{{$status['post_section']->modified_at->diffForHumans()}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-btn">
                                                {{--                                                <button type="button" class="btn edit-btn"><span>Edit</span></button>--}}
                                                <form action="{{route('blogger.overview.hide.post')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="post_section"
                                                           @if(isset($status['post_section']) AND $status['post_section']->is_section == 0) value="1"
                                                           @else value="0" @endif>
                                                    <input type="hidden" name="status"
                                                           @if(isset($status['post_section']) AND $status['post_section']->status == 'deactive') value="active"
                                                           @else value="deactive" @endif>
                                                    <input type="hidden" name="blogger_id"
                                                           value="{{Auth::guard('blogger')->id()}}">
                                                    <button type="submit" class="btn"><span>@if(isset($status['post_section']) AND $status['post_section']->is_section == 0)
                                                                Unpublished @else Published @endif</span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <img src="https://image.flaticon.com/icons/png/512/58/58945.png" alt="">
                                        </th>
                                        <td>
                                            <div class="publis-text">
                                                <h6>Videos</h6>
                                                <span>User friendly layout</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-date">
                                                <i class="fas fa-calendar-week"></i>
                                                <div class="des-text">
                                                    <span>Last Update</span>
                                                    @if(isset($status['video_section']))
                                                        <p>{{$status['video_section']->modified_at->diffForHumans()}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-btn">
                                                {{--                                                <button type="button" class="btn edit-btn"><span>Edit</span></button>--}}
                                                <form action="{{route('blogger.overview.hide.video')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="video_section"
                                                           @if(!isset($status['video_section'])) value="0"
                                                           @elseif(isset($status['video_section']) AND $status['video_section']->is_section == 1) value="0"
                                                           @else  value="1" @endif>
                                                    <input type="hidden" name="blogger_id"
                                                           value="{{Auth::guard('blogger')->id()}}">
                                                    <input type="hidden" name="status"
                                                           @if(!isset($status['video_section'])) value="deactive"
                                                           @elseif(isset($status['video_section']) AND $status['video_section']->status == 'deactive') value="active"
                                                           @else value="deactive" @endif>
                                                    <button type="submit" class="btn"><span>@if(!isset($status['video_section']))
                                                                Published @elseif(isset($status['video_section']) AND $status['video_section']->is_section == 1)
                                                                Published @else Unpublished @endif</span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX18689296.jpg"
                                                 alt="">
                                        </th>
                                        <td>
                                            <div class="publis-text">
                                                <h6>Links</h6>
                                                <span>User friendly layout</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-date">
                                                <i class="fas fa-calendar-week"></i>
                                                <div class="des-text">
                                                    <span>Last Update</span>
                                                    @if(isset($status['link_section']))
                                                        <p>{{$status['link_section']->modified_at->diffForHumans()}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-btn">
                                                {{--                                                <button type="button" class="btn edit-btn"><span>Edit</span></button>--}}
                                                <form action="{{route('blogger.overview.hide.link')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="link_section"
                                                           @if(isset($status['link_section']) AND $status['link_section']->is_section == 0) value="1"
                                                           @else value="0" @endif>
                                                    <input type="hidden" name="status"
                                                           @if(isset($status['link_section']) AND $status['link_section']->status == 'deactive') value="active"
                                                           @else value="deactive" @endif>
                                                    <input type="hidden" name="blogger_id"
                                                           value="{{Auth::guard('blogger')->id()}}">
                                                    <button type="submit" class="btn"><span>@if(isset($status['link_section']) AND $status['link_section']->is_section == 0)
                                                                Unpublished @else Published @endif</span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSkj2qDA3SmmU76Fqv_UunWg9ePNduYN0vDg&usqp=CAU"
                                                alt="">
                                        </th>
                                        <td>
                                            <div class="publis-text">
                                                <h6>About Me</h6>
                                                <span>User friendly layout</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-date">
                                                <i class="fas fa-calendar-week"></i>
                                                <div class="des-text">
                                                    <span>Last Update</span>
                                                    @if(isset($about))
                                                        @if(isset($status['about_section']) AND $status['about_section']>$about)
                                                            <p>{{$status['about_section']->modified_at->diffForHumans()}}</p>
                                                        @else
                                                            <p>{{$about->updated_at->diffForHumans()}}</p>
                                                        @endif
                                                    @else
                                                        @if(isset($status['about_section']))
                                                            <p>{{$status['about_section']->modified_at->diffForHumans()}}</p>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="publis-btn">
                                                <button type="button" class="btn btn-white mr-2" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"><span>Edit</span></button>

                                                <form action="{{route('blogger.overview.layout.about')}}" method="POST"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal fade" id="exampleModal"
                                                         tabindex="-1" aria-labelledby="exampleModalLabel"
                                                         aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-uppercase"
                                                                        id="exampleModalLabel">About Page Edit</h5>
                                                                    <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>

                                                                <div class="modal-body">
                                                                    <input type="hidden" name="blog_id"
                                                                           value="{{Auth::guard('blogger')->user()->blog->id}}">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <label for="about-title">About Title</label>
                                                                            <input type="text" id="about-title"
                                                                                   class="form-control" name="title"
                                                                                   placeholder="Hi I am {{Auth::user()->name}}"
                                                                                   aria-label="about-title"
                                                                                   value="@if(isset($about)) {{$about->title}} @endif">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                            <label for="about-description">About
                                                                                Description</label>
                                                                            <textarea rows="4" id="about-description"
                                                                                      class="form-control"
                                                                                      name="description">@if(isset($about)) {{$about->description}} @endif</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                            <label for="formFile" class="form-label">About
                                                                                Image</label>
                                                                            <input class="form-control" type="file"
                                                                                   id="formFile" name="image">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-4">
                                                                        <div class="col-12">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-12 text-center">
                                                                                    <div class="container">
                                                                                        <div class="button-wrap mt-4">
                                                                                            <p>Select About Page
                                                                                                Layout</p>
                                                                                            <input
                                                                                                class="hidden radio-label"
                                                                                                type="radio" value="1"
                                                                                                name="layout"
                                                                                                id="yes-button"/>
                                                                                            <label class="button-label"
                                                                                                   for="yes-button"
                                                                                                   @if(isset($about->layout) AND $about->layout == 1) style="background: #000;border: #000;color: #fff" @endif>
                                                                                                <h1>Layout 1</h1>
                                                                                            </label>
                                                                                            <input
                                                                                                class="hidden radio-label"
                                                                                                type="radio" value="2"
                                                                                                name="layout"
                                                                                                id="no-button"/>
                                                                                            <label class="button-label"
                                                                                                   for="no-button"
                                                                                                   @if(isset($about->layout) AND $about->layout == 2) style="background: #000;border: #000;color: #fff" @endif>
                                                                                                <h1>Layout 2</h1>
                                                                                            </label>
                                                                                            <input
                                                                                                class="hidden radio-label"
                                                                                                type="radio" value="3"
                                                                                                name="layout"
                                                                                                id="maybe-button"/>
                                                                                            <label class="button-label"
                                                                                                   for="maybe-button"
                                                                                                   @if(isset($about->layout) AND $about->layout == 3) style="background: #000;border: #000;color: #fff" @endif>
                                                                                                <h1>Layout 3</h1>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit"
                                                                            class="btn btn-secondary btn-sm">Save
                                                                    </button>
                                                                    <button type="button"
                                                                            class="btn btn-secondary btn-sm"
                                                                            data-bs-dismiss="modal">Close
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <form action="{{route('blogger.overview.hide.about')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="about_section"
                                                           @if(isset($status['about_section']) AND $status['about_section']->is_section == 0) value="1"
                                                           @else value="0" @endif>
                                                    <input type="hidden" name="status"
                                                           @if(isset($status['about_section']) AND $status['about_section']->status == 'deactive') value="active"
                                                           @else value="deactive" @endif>
                                                    <input type="hidden" name="blogger_id"
                                                           value="{{Auth::guard('blogger')->id()}}">
                                                    <button type="submit" class="btn"><span>@if(isset($status['about_section']) AND $status['about_section']->is_section == 0)
                                                                Unpublished @else Published @endif</span></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <div class="container">
                            <div class="jumbotron bg-white">
                                <form action="{{route('blogger.overview.faq.about')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="text-center">FAQs</h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="blog_id"
                                               value="{{Auth::guard('blogger')->user()->blog->id}}">
                                        <div class="col-12">
                                            <label for="question">Ask a Question Here?</label>
                                            <input class="form-control" type="text" id="question" name="question">
                                        </div>
                                        <div class="col-12 mt-4">
                                            <label for="answer">Write the Answer Here</label>
                                            <textarea class="form-control" name="answer" id="answer"
                                                      rows="10"></textarea>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <button class="btn btn-dark float-end" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="accordion" id="accordionExample">
                                    @if(isset($faqs))
                                        @foreach($faqs as $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading{{$faq->id}}">
                                                    <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{$faq->id}}"
                                                            aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                        {{$faq->question}}
                                                    </button>
                                                </h2>
                                                <div id="collapse{{$faq->id}}" class="accordion-collapse collapse"
                                                     aria-labelledby="heading{{$faq->id}}"
                                                     data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <span>{{$faq->answer}}</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <form
                                                                    action="{{route('blogger.overview.faq.about.delete')}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit" value="{{$faq->id}}" name="id"
                                                                            class="btn btn-white text-white float-end ml-2">
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                                <button class="btn btn-white text-white float-end"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal{{$faq->id}}">Edit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="exampleModal{{$faq->id}}" tabindex="-1"
                                                         aria-labelledby="exampleModalLabel{{$faq->id}}"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <form action="{{route('blogger.overview.faq.about.edit')}}"
                                                                  method="POST">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="exampleModalLabel{{$faq->id}}">FAQ</h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <input type="hidden" name="id"
                                                                                   value="{{$faq->id}}">
                                                                            <input type="hidden" name="blog_id"
                                                                                   value="{{Auth::guard('blogger')->user()->blog->id}}">
                                                                            <div class="col-12">
                                                                                <label for="question">Ask a Question
                                                                                    Here?</label>
                                                                                <input class="form-control" type="text"
                                                                                       id="question" name="question"
                                                                                       value="{{$faq->question}}">
                                                                            </div>
                                                                            <div class="col-12 mt-4">
                                                                                <label for="answer">Write the Answer
                                                                                    Here</label>
                                                                                <textarea class="form-control"
                                                                                          name="answer" id="answer"
                                                                                          rows="10">{{$faq->answer}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary">
                                                                            Save changes
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <div id="tabs-3">--}}
                    {{--                        <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>--}}
                    {{--                        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="container mt-5 my-4">
            <iframe src="{{route('blog',Auth::user()->blog->blog_slug)}}" style="height:400px;width:100%;"
                    title="Iframe Example"></iframe>
        </div>
    </section>

    <!-- overview area ends  -->
@endsection
