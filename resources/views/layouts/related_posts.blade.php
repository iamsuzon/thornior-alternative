<!-- related blog slider start -->
@if(isset($post['related_posts']) AND !$post['related_posts']->isEmpty())
    <section class="latest-blog">
        <div class="container">
            <div class="section-wrapper">
                <div class="section-header">
                    <h4>Related Post</h4>
                </div>
                <div class="latest-blog-slider">
                    <div class="swiper-wrapper">
                        @foreach($post['related_posts'] as $post)
                            <div class="swiper-slide">
                                @if(Auth::guard('blogger')->check() == true AND $post->blogger_id == Auth::guard('blogger')->user()->id)
                                    <a href="{{route('blogger.blog.post'.'.'.$post->post_type.'.'.'show'.'.'.$post->template_id.'',$post->slug)}}">
                                        @else
                                            <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                @endif
                                                <div class="blog-item style-one">
                                                    <div class="item-thumb">
                                                        <img
                                                            src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}"
                                                            alt="">
                                                        @if(isset($post->video))
                                                            <div class="video-btn">
                                                                @if(Auth::guard('blogger')->check() == true)
                                                                    <a href="{{route('blogger.blog.post'.'.'.$post->post_type.'.'.'show'.'.'.$post->template_id.'',$post->slug)}}">
                                                                        @else
                                                                            <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">
                                                                                @endif
                                                                                <i class="fa fa-play"></i>
                                                                            </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="blog-text">
                                                        <div class="blog-cat">
                                            <span id="post_categories"
                                                  style="padding: 3px 10px;background-color: black;color: white;border-radius: 5px">@foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                                                    +{{$post->categories->count()-1}}
                                                    more @break @endif  @endforeach</span>
                                                        </div>
                                                        <h5>{{$post->title}}</h5>
                                                    </div>
                                                    <div class="blog-timeline">
                                                        <div class="bloger-thumb">
                                                            <img
                                                                src="{{asset('upload/blogger/avatar')}}/{{$post->blogger->image}}"
                                                                alt="avatar" style="width: 20px;height: 20px">
                                                        </div>
                                                        <div class="time-line">
                                                            <span class="border-end pe-2"
                                                                  style="font-size: 10px">{{substr($post->blogger->name, 0, 8)}}</span>
                                                            <span
                                                                style="font-size: 10px">{{$post->created_at->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                            </div>
                        @endforeach
                    </div>
                    <!-- add progressbar -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- related blog slider ends  -->
