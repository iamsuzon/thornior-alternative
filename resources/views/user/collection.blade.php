@extends('layouts.user_loggedin_app')

@section('content')
    <style>
        #addButton {
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            border: none;
            outline: none;
            background-color: #000;
            color: #fff;
            cursor: pointer;
            border-radius: 100%;
        }

        #addButton i {
            padding: 20px;
            font-size: 20px;
        }

        #addButton:hover {
            background-color: #555;
        }

        /* Babu  */
        .main-image img {
            width: 100%;
            height: 150px;
            border-radius: 10px 0 0 10px;
        }

        .item:hover .main-image, .item:hover .side-images {
            box-shadow: 0px 2px 10px #999;
            border-radius: 10px;
        }

        .side-images .img-fluid {
            width: 100%;
            height: 50px;
        }

        .rt-rounded {
            border-radius: 0 10px 0 0;
        }

        .rb-rounded {
            border-radius: 0 0 10px 0;
        }

        .babu .col-4,
        .babu .col-8 {
            padding: 0;
        }

        .post-count {
            margin-right: 30px;
            font-weight: 600;
        }

        .post-date {
            color: gray;
        }
    </style>

    <button id="addButton" title="Add new collection" data-bs-toggle="modal" data-bs-target="#exampleModalCollection">
        <i class="fas fa-plus"></i>
    </button>

    <div class="modal fade" id="exampleModalCollection" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">
                        Add New Collection
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('user.collection.store')}}" method="POST">
                    @csrf
                    <div class="modal-body my-2 mb-3">
                        <label for="name">Collection Name</label>
                        <input class="form-control" type="text" id="name" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (Session::has('success'))
        <div class="alert alert-info">{{ Session::get('success') }}</div>
    @endif

    <div class="row babu g-5">
        @php $i=1 @endphp
        @forelse($collections as $key => $collection)
            <a href="{{route('user.collection.show', $collection->slug)}}"
               class="col-xs-6 col-sm-6 col-md-3 rounded item">
                @if($collection->all_collection->count() != 0)
                    @php $i=1 @endphp
                    @foreach($collection->all_collection as $each => $collect)
                        @php $relation = $collect->template_type.'_post_'.$collect->template_id @endphp
                        <div class="row">
                            <div class="col-8 main-image">
                                    <img class="img-fluid"
                                         src="{{asset('upload/blogger_image_post')}}/{{$collect->$relation->fimage}}"
                                         alt=""/>
                            </div>
                            <div class="col-4 side-images">
                                    <img
                                        class="img-fluid rt-rounded rt-rounded"
                                        src="{{asset('upload/blogger_image_post')}}/{{$collect->$relation->fimage}}"
                                        alt=""
                                    />
                                    <img class="img-fluid" src="{{asset('upload/blogger_image_post')}}/{{$collect->$relation->fimage}}" alt=""/>
                                    <img
                                        class="img-fluid rb-rounded rb-rounded"
                                        src="{{asset('upload/blogger_image_post')}}/{{$collect->$relation->fimage}}"
                                        alt=""
                                    />
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col-8 main-image">
                            <img class="img-fluid" src="{{asset('upload/blogger_image_post/placeholder-1.png')}}"
                                 alt=""/>
                        </div>
                        <div class="col-4 side-images">
                            <img
                                class="img-fluid rt-rounded rt-rounded"
                                src="{{asset('upload/blogger_image_post/placeholder-2.png')}}"
                                alt=""
                            />
                            <img class="img-fluid" src="{{asset('upload/blogger_image_post/placeholder-2.png')}}"
                                 alt=""/>
                            <img
                                class="img-fluid rb-rounded rb-rounded"
                                src="{{asset('upload/blogger_image_post/placeholder-2.png')}}"
                                alt=""
                            />
                        </div>
                    </div>
                @endif

                <div class="text-area mt-3">
                    <h5 class="mx-0 mb-0">{{$collection->name}}</h5>
                    <p class="mx-0">
              <span class="post-count">{{$collection->all_collection->count()}} Posts</span
              ><span class="post-date">{{$collection->updated_at->format('d M Y')}}</span>
                    </p>
                </div>
            </a>
        @empty
        @endforelse
    </div>
@endsection
