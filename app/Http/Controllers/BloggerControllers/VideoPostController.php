<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\AllCollections;
use App\Models\BloggerProduct;
use App\Models\AllPost;
use App\Models\FollowBlogger;
use App\Models\Like;
use App\Models\NotifyAdmin;
use App\Models\SavePost;
use App\Models\Video;
use App\Models\View;
use App\Services\Blogger\AddImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class VideoPostController extends Controller
{
    public function index1()
    {
        return view('blogger.posts.video_templates.editor_template_one');
    }

    public function index2()
    {
        return view('blogger.posts.video_templates.editor_template_two');
    }

    public function index3()
    {
        return view('blogger.posts.video_templates.editor_template_three');
    }

    public function index4()
    {
        return view('blogger.posts.video_templates.editor_template_four');
    }

    public function index5()
    {
        return view('blogger.posts.video_templates.editor_template_five');
    }

    public function index6()
    {
        return view('blogger.posts.video_templates.editor_template_six');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required',
            'category' => 'required',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'video' => 'required|mimes:mp4,mkv,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:40000',
        ]);

        if ($request->has('main_article_image') and $request->main_article_image != null) {
            $validator = Validator::make($request->all(), [
                'main_article_image' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_1') and $request->image_1 != null) {
            $validator = Validator::make($request->all(), [
                'image_1' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_2') and $request->image_2 != null) {
            $validator = Validator::make($request->all(), [
                'image_2' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_3') and $request->image_3 != null) {
            $validator = Validator::make($request->all(), [
                'image_3' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_4') and $request->image_4 != null) {
            $validator = Validator::make($request->all(), [
                'image_4' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_5') and $request->image_5 != null) {
            $validator = Validator::make($request->all(), [
                'image_5' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_6') and $request->image_6 != null) {
            $validator = Validator::make($request->all(), [
                'image_6' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_7') and $request->image_7 != null) {
            $validator = Validator::make($request->all(), [
                'image_7' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()]);
        }

        $videoPost = new Video();
        $videoPost->blogger_id = Auth::guard('blogger')->id();
        $videoPost->template_id = $request->template;
        $videoPost->post_type = 'video';
        if ($request->post_status == 1) {
            $videoPost->post_status = 1;
        } else {
            $videoPost->post_status = 0;
        }
        $videoPost->title = $request->title;

        $videoPost->intro_heading = $request->intro_headline;
        $videoPost->outro_heading = $request->outro_headline;
        $videoPost->intro_description = $request->intro_description;
        $videoPost->outro_description = $request->outro_description;

        $videoPost->last_heading = $request->last_headline;
        $videoPost->last_description = $request->last_description;

        $videoPost->headline1 = $request->headline_1;
        $videoPost->headline2 = $request->headline_2;
        $videoPost->headline3 = $request->headline_3;
        $videoPost->headline4 = $request->headline_4;
        $videoPost->headline5 = $request->headline_5;
        $videoPost->headline6 = $request->headline_6;
        $videoPost->description1 = $request->description_1;
        $videoPost->description2 = $request->description_2;
        $videoPost->description3 = $request->description_3;
        $videoPost->description4 = $request->description_4;
        $videoPost->description5 = $request->description_5;
        $videoPost->description6 = $request->description_6;

        $videoPost->point_heading_1 = $request->point_headline_1;
        $videoPost->point_heading_2 = $request->point_headline_2;
        $videoPost->point_heading_3 = $request->point_headline_3;
        $videoPost->point_heading_4 = $request->point_headline_4;
        $videoPost->point_heading_5 = $request->point_headline_5;
        $videoPost->point_heading_6 = $request->point_headline_6;

        $videoPost->point_description_1 = $request->point_description_1;
        $videoPost->point_description_2 = $request->point_description_2;
        $videoPost->point_description_3 = $request->point_description_3;
        $videoPost->point_description_4 = $request->point_description_4;
        $videoPost->point_description_5 = $request->point_description_5;
        $videoPost->point_description_6 = $request->point_description_6;

        $videoPost->color1 = $request->color_code1;
        $videoPost->color2 = $request->color_code2;
        $videoPost->color3 = $request->color_code3;
        $videoPost->color4 = $request->color_code4;
        $videoPost->color5 = $request->color_code5;

        if ($request->has('video') and $request->video != null) {
            $video_file_name = time() . 'v.' . $request->video->extension();
            $video_file_path = public_path('/upload/blogger_video_post/' . $request->user()->id);
            $request->video->move($video_file_path, $video_file_name);
            $videoPost->video = $video_file_name;
            $videoPost->address = $video_file_path.'/'.$video_file_name;
        }

        $products = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id', null)->get();
        if (count($products) > 0) {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $videoPost->product_id = json_encode($all_product);
        }

        $videoPost->save();
        $data = ['blogger_id' => $videoPost->blogger_id];
        $videoPost->categories()->attach($request->category, $data);

        $images = new AddImages();
        $images->storeImage($request, $videoPost);

        if ($products != null) {
            foreach ($products as $product) {
                $product->post_id = $videoPost->id;
                $product->post_type = 'video';
                $product->post_slug = $videoPost->slug;
                $product->save();
            }
        }

        event(new UserActivity($videoPost->blogger_id, $videoPost->post_type, $videoPost->slug, $videoPost->id));

        if ($request->post_status == 0) {
            return response()->json([
                'success' => 'File Uploaded Successfully',
                'slug' => $videoPost->slug
            ]);
        } elseif ($request->post_status == 3) {
            return response()->json(['success' => 'Post saved in library successfully']);
        }

        return response()->json(['success' => 'Post Uploaded Successfully']);
    }

    public function show($slug)
    {
        $post['post'] = Video::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_slug',$post['post']->slug)
            ->get();

        return view('blogger.posts.video_post_show', compact('post'));
    }

    public function edit($slug)
    {
        $post['post'] = Video::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        if ($post['post'] == null)
        {
            return back();
        }

        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('post_slug',$post['post']->slug)
            ->get();

        $ColorData = null;
        for($i=1; $i<6; $i++)
        {
            $color = 'color'.$i;
            if ($post['post']->$color == null)
            {
                continue;
            }
            $ColorData[$i] = $post['post']->$color;
        }
        $post['colors'] = $ColorData;

        switch ($post['post']->template_id)
        {
            case 1;
                return view('blogger.posts.video_templates_edit.editor_template_one_edit', compact('post'));

            case 2;
                return view('blogger.posts.video_templates_edit.editor_template_two_edit', compact('post'));

            case 3;
                return view('blogger.posts.video_templates_edit.editor_template_three_edit', compact('post'));

            case 4;
                return view('blogger.posts.video_templates_edit.editor_template_four_edit', compact('post'));

            case 5;
                return view('blogger.posts.video_templates_edit.editor_template_five_edit', compact('post'));

            case 6;
                return view('blogger.posts.video_templates_edit.editor_template_six_edit', compact('post'));
        }

        return null;
    }

    public function update(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required'
        ]);

        if ($request->has('thumbnail_image') and $request->thumbnail_image != null) {
            $validator = Validator::make($request->all(), [
                'thumbnail_image' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('main_article_image') and $request->main_article_image != null) {
            $validator = Validator::make($request->all(), [
                'main_article_image' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_1') and $request->image_1 != null) {
            $validator = Validator::make($request->all(), [
                'image_1' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_2') and $request->image_2 != null) {
            $validator = Validator::make($request->all(), [
                'image_2' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_3') and $request->image_3 != null) {
            $validator = Validator::make($request->all(), [
                'image_3' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_4') and $request->image_4 != null) {
            $validator = Validator::make($request->all(), [
                'image_4' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_5') and $request->image_5 != null) {
            $validator = Validator::make($request->all(), [
                'image_5' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_6') and $request->image_6 != null) {
            $validator = Validator::make($request->all(), [
                'image_6' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_7') and $request->image_7 != null) {
            $validator = Validator::make($request->all(), [
                'image_7' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('video') and $request->video != null) {
            $validator = Validator::make($request->all(), [
                'video' => 'required|mimes:mp4,mkv,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:40000',
            ]);
        }

        $videoPost = Video::where('blogger_id', Auth::guard('blogger')->id())
            ->where('slug', $slug)->first();
        if ($request->post_status == 1) {
            $videoPost->post_status = 1;
        }

        $videoPost->title = $request->title;

        $videoPost->intro_heading = $request->intro_headline;
        $videoPost->outro_heading = $request->outro_headline;
        $videoPost->intro_description = $request->intro_description;
        $videoPost->outro_description = $request->outro_description;

        $videoPost->last_heading = $request->last_headline;
        $videoPost->last_description = $request->last_description;

        $videoPost->headline1 = $request->headline_1;
        $videoPost->headline2 = $request->headline_2;
        $videoPost->headline3 = $request->headline_3;
        $videoPost->headline4 = $request->headline_4;
        $videoPost->headline5 = $request->headline_5;
        $videoPost->headline6 = $request->headline_6;
        $videoPost->description1 = $request->description_1;
        $videoPost->description2 = $request->description_2;
        $videoPost->description3 = $request->description_3;
        $videoPost->description4 = $request->description_4;
        $videoPost->description5 = $request->description_5;
        $videoPost->description6 = $request->description_6;

        $videoPost->point_heading_1 = $request->point_headline_1;
        $videoPost->point_heading_2 = $request->point_headline_2;
        $videoPost->point_heading_3 = $request->point_headline_3;
        $videoPost->point_heading_4 = $request->point_headline_4;
        $videoPost->point_heading_5 = $request->point_headline_5;
        $videoPost->point_heading_6 = $request->point_headline_6;

        $videoPost->point_description_1 = $request->point_description_1;
        $videoPost->point_description_2 = $request->point_description_2;
        $videoPost->point_description_3 = $request->point_description_3;
        $videoPost->point_description_4 = $request->point_description_4;
        $videoPost->point_description_5 = $request->point_description_5;
        $videoPost->point_description_6 = $request->point_description_6;

        $videoPost->color1 = $request->color_code1;
        $videoPost->color2 = $request->color_code2;
        $videoPost->color3 = $request->color_code3;
        $videoPost->color4 = $request->color_code4;
        $videoPost->color5 = $request->color_code5;

        if ($request->has('video') and $request->video != null) {
            $image_path = public_path() . '/upload/blogger_video_post/' . $request->user()->id . '/' . $imagePost->video;
            unlink($image_path);

            $video_file_name = time() . 'v.' . $request->video->extension();
            $video_file_path = public_path() . '/upload/blogger_video_post/' . $request->user()->id;
            $request->video->move($video_file_path, $video_file_name);
            $imagePost->video = $video_file_name;
        }

        $videoPost->save();
        $data = ['blogger_id'=>$videoPost->blogger_id];

        $videoPost->categories()->detach();
        $videoPost->categories()->attach($request->category,$data);

        $images = new AddImages();
        $images->updateImage($request, $videoPost);
    }

    public function destroy(Request $request,$slug)
    {
        $post = Video::where('blogger_id',$request->blogger_id)
                ->where('slug',$slug)
                ->first();

        abort_if($post == null, 404);

        foreach ($post->medias as $media)
        {
            unlink($media->address); // Image
        }

        unlink($post->address); // Video

        $post->categories()->detach();

        $likes = Like::where('template_type', $post->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($likes != null)
        {
            foreach ($likes as $like)
            {
                $like->delete();
            }
        }

        // comments will auto delete

        $saves = SavePost::where('template_type', $post->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($saves != null)
        {
            foreach ($saves as $save)
            {
                $save->delete();
            }
        }

        $collections = AllCollections::where('template_type', $post->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($collections != null)
        {
            foreach ($collections as $collection)
            {
                $collection->delete();
            }
        }

        $post->delete();

        return back()->with('success','The Post is Deleted Successfully');
    }
}
