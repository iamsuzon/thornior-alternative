<style>
    #comment-box .social-interaction li button {
        font-size: 25px;
        background: transparent;
        transition: 0.3s;
    }

    #comment-box .social-interaction li button:hover {
        color: #0c0c0c;
    }

    div#social-links {
        margin: 0 auto;
        max-width: 500px;
    }

    div#social-links ul {
        padding-left: 0;
    }

    div#social-links ul li {
        display: inline-block;
        margin-left: 10px !important;
    }

    div#social-links ul li a {
        margin: 5px;
        color: #444;
    }

    div#social-links ul li a span {
        font-size: 30px;
    }

    div#social-links ul li:hover a span {
        color: #000000;
        transition: 0.5s;
    }
</style>
<section id="comment-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="social-interaction mt-5">
                    <ul class="media-list list-unstyled d-flex justify-content-center">
                        <li>
                            @if(isset($post['like']) AND $post['like'] == false)
                                <form
                                    action="{{route('like',['template_type' => $post['post']->post_type, 'template_id' => $post['post']->template_id])}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_user_id" value="{{$post['post']->blogger->id}}">
                                    <input type="hidden" name="post_id" value="{{$post['post']->id}}">
                                    <button type="submit">
                                        <i class="far fa-heart"></i>
                                        <span>Like</span>
                                    </button>
                                </form>
                            @elseif(isset($post['like']) AND $post['like'] == true)
                                <form
                                    action="{{route('like',['template_type' => $post['post']->post_type, 'template_id' => $post['post']->template_id])}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_user_id" value="{{$post['post']->blogger->id}}">
                                    <input type="hidden" name="post_id" value="{{$post['post']->id}}">
                                    <button type="submit">
                                        <i class="fas fa-heart">
                                            <span>Liked</span>
                                        </i>
                                    </button>
                                </form>
                            @else
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="far fa-heart"></i>
                                    <span>Like</span>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-warning" id="exampleModalLabel">Please Log
                                                    In To <a href="{{route('login')}}">Continue ></a></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                        <li>
                            @if(isset($post['save']) AND $post['save'] == false)
                                <form
                                    action="{{route('user.post.save',['template_type' => $post['post']->post_type, 'template_id' => $post['post']->template_id])}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_user_id" value="{{$post['post']->blogger->id}}">
                                    <input type="hidden" name="post_id" value="{{$post['post']->id}}">
                                    <button type="submit">
                                        <i class="far fa-bookmark">
                                            <span>Save</span>
                                        </i>
                                    </button>
                                </form>
                            @elseif(isset($post['save']) AND $post['save'] == true)
                                <form
                                    action="{{route('user.post.save',['template_type' => $post['post']->post_type, 'template_id' => $post['post']->template_id])}}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_user_id" value="{{$post['post']->blogger->id}}">
                                    <input type="hidden" name="post_id" value="{{$post['post']->id}}">
                                    <button type="submit">
                                        <i class="fas fa-bookmark">
                                            <span>Saved</span>
                                        </i>
                                    </button>
                                </form>
                            @else
                                <button data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="far fa-bookmark"></i>
                                    <span>Save</span>
                                </button>
                            @endif
                        </li>
                        <!--                    <span><i class="fas fa-bookmark"></i>Like</span>-->
                        <li>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModalShare">
                                <i class="far fa-share-square"></i>
                                <span>Share</span>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalShare" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="exampleModalLabel">
                                                Share Post
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <input class="form-control" type="text" value="{{url()->full()}}">
                                                </div>
                                            </div>
                                            <div class="row my-4">
                                                <div class="col-12 text-center">
                                                    @if(isset($shareComponent))
                                                        {!! $shareComponent !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <hr>

                    <div class="comments mt-5">
                        @foreach($post['post']->comments as $comment)

                            <div class="comment-{{$comment->id}}">
                                <div class="comment-image">
                                    <img class="rounded-circle"
                                         @if($comment->user_type == 'blogger')
                                         src="{{asset('upload/blogger/avatar')}}/{{$comment->blogger->image}}"
                                         @elseif($comment->user_type == 'web')
                                         src="{{asset('upload/blogger/avatar')}}/{{$comment->user->image}}"
                                         @endif
                                         alt="User Avatar"
                                         style="width: 45px;height: 45px">
                                </div>
                                <div class="ml-2 comment-text">
                                    <p class="m-0"><strong>
                                            @if($comment->user_type == 'blogger')
                                                {{$comment->blogger->name}}
                                            @elseif($comment->user_type == 'web')
                                                {{$comment->user->name}}
                                            @endif
                                        </strong></p>
                                    <p style="color: darkgrey">{{$comment->created_at->diffForHumans()}}</p>
                                    <p>{{$comment->comment}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-field">
                        <h4>Leave a comment</h4>
                        <form
                            action="{{route('comment',['template_type' => $post['post']->post_type, 'template_id' => $post['post']->template_id])}}"
                            method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post['post']->id}}">
                            <input type="hidden" name="post_user_id" value="{{$post['post']->blogger_id}}">
                            <textarea class="form-control" name="comment" id="" cols="30" rows="8"
                                      placeholder="Write a comment here...."></textarea>
                            <div class="text-center mt-3">
                                @if(Auth::guard('blogger')->check() OR Auth::guard('web')->check())
                                    <button type="submit" class="btn btn-danger rounded-0">Post
                                        Comment
                                    </button>
                                @else
                                    <button class="btn btn-danger rounded-0" disabled>
                                        Please login to comment
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
