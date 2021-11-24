@if(isset($posts))
@foreach($posts['allPost'] as $post)
    @if(isset($post->video))
        @continue
    @endif
    <div class="col-md-4 col-sm-6 col-12 mt-4 mr-sm-0">
        <div class="blog-item">
            <div class="item-thumb" style="height: 200px">
                <img src="{{asset('upload/blogger_image_post')}}/{{$post->fimage}}" class="rounded" alt="" style="height: 200px">
            </div>
            <div class="blog-text">
                <div class="blog-cat">
                    <span class="rounded">
                        @foreach($post->categories as $category) {{$category->name}} @if($post->categories->count() > 1)
                            +{{$post->categories->count()-1}}
                            more @break @endif  @endforeach
                    </span>
                    <span class="border-end pe-2" style="background-color: #fff">{{substr($post->blogger->blog->blog_name,0,15)}}{{strlen($post->blogger->blog->blog_name)>15 ? '..' : ''}}</span>
                    <span style="background-color: #fff">{{$post->created_at->diffForHumans()}}</span>
                </div>
                <h5>{{$post->title}}</h5>
                <p style="text-align: justify">
                    @if(isset($post->intro_description))
                        {{substr($post->intro_description,0,100)}}{{strlen($post->intro_description)>100 ? '...' : ''}}
                    @else
                        {{substr($post->outro_description,0,100)}}{{strlen($post->outro_description)>100 ? '...' : ''}}
                    @endif
                </p>
            </div>
            <div class="blog-more mt-2">
                <a href="{{route('post.show',['template_type' => $post->post_type ,'template_id' => $post->template_id,'slug' => $post->slug])}}">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
    </div>
@endforeach
@endif


{{--<div class="col-md-4 col-sm-6 col-12">--}}
{{--    <div class="blog-item style-one">--}}
{{--        <div class="blog-text">--}}
{{--            <div class="blog-cat">--}}
{{--                <span>Kitchen</span>--}}
{{--            </div>--}}
{{--            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, amet.</h5>--}}
{{--            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum, laborum! Dolore neque expedita possimus id.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-timeline">--}}
{{--            <div class="time-line">--}}
{{--                <span class="border-end pe-2">Mox</span>--}}
{{--                <span>5 Days ago</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="item-thumb">--}}
{{--            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-md-4 col-sm-6 col-12 mt-4 mr-sm-0">--}}
{{--    <div class="blog-item style-one">--}}
{{--        <div class="item-thumb">--}}
{{--            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">--}}
{{--        </div>--}}
{{--        <div class="blog-text">--}}
{{--            <div class="blog-cat pt-3">--}}
{{--                <span>Kitchen</span>--}}
{{--            </div>--}}
{{--            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, amet.</h5>--}}
{{--            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum, laborum! Dolore neque expedita possimus id.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-timeline">--}}
{{--            <div class="time-line">--}}
{{--                <span class="border-end pe-2">Mox</span>--}}
{{--                <span>5 Days ago</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="col-md-4 col-sm-6 col-12 mt-4 mt-md-0">--}}
{{--    <div class="blog-item style-one">--}}
{{--        <div class="blog-text">--}}
{{--            <div class="blog-cat">--}}
{{--                <span>Kitchen</span>--}}
{{--            </div>--}}
{{--            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, amet.</h5>--}}
{{--            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum, laborum! Dolore neque expedita possimus id.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-timeline">--}}
{{--            <div class="time-line">--}}
{{--                <span class="border-end pe-2">Mox</span>--}}
{{--                <span>5 Days ago</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="item-thumb">--}}
{{--            <img src="{{asset('backend/assets/images/blog/latest/01.jpg')}}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
