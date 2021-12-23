<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\AllCollections;
use App\Models\BloggerProduct;
use App\Models\Image;
use App\Models\Like;
use App\Models\SavePost;
use App\Services\Blogger\AddImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImagePostController extends Controller
{
    public function index1()
    {
        return view('blogger.posts.image_templates.editor_template_one');
    }

    public function index2()
    {
        return view('blogger.posts.image_templates.editor_template_two');
    }

    public function index3()
    {
        return view('blogger.posts.image_templates.editor_template_three');
    }

    public function index4()
    {
        return view('blogger.posts.image_templates.editor_template_four');
    }

    public function index5()
    {
        return view('blogger.posts.image_templates.editor_template_five');
    }

    public function index6()
    {
        return view('blogger.posts.image_templates.editor_template_six');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'template' => 'required',
            'category' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
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
        if ($request->has('image_8') and $request->image_8 != null) {
            $validator = Validator::make($request->all(), [
                'image_8' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_9') and $request->image_9 != null) {
            $validator = Validator::make($request->all(), [
                'image_9' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()]);
        }

        $imagePost = new Image();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = $request->template;
        $imagePost->post_type = 'image';
        if ($request->post_status == 1) {
            $imagePost->post_status = 1;
        } else {
            $imagePost->post_status = 0;
        }
        $imagePost->title = $request->title;

        $imagePost->intro_heading = $request->intro_headline;
        $imagePost->outro_heading = $request->outro_headline;
        $imagePost->intro_description = $request->intro_description;
        $imagePost->outro_description = $request->outro_description;

        $imagePost->last_heading = $request->last_headline;
        $imagePost->last_description = $request->last_description;

        $imagePost->headline1 = $request->headline_1;
        $imagePost->headline2 = $request->headline_2;
        $imagePost->headline3 = $request->headline_3;
        $imagePost->headline4 = $request->headline_4;
        $imagePost->headline5 = $request->headline_5;
        $imagePost->headline6 = $request->headline_6;
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;
        $imagePost->description4 = $request->description_4;
        $imagePost->description5 = $request->description_5;
        $imagePost->description6 = $request->description_6;

        $imagePost->point_heading_1 = $request->point_headline_1;
        $imagePost->point_heading_2 = $request->point_headline_2;
        $imagePost->point_heading_3 = $request->point_headline_3;
        $imagePost->point_heading_4 = $request->point_headline_4;
        $imagePost->point_heading_5 = $request->point_headline_5;
        $imagePost->point_heading_6 = $request->point_headline_6;

        $imagePost->point_description_1 = $request->point_description_1;
        $imagePost->point_description_2 = $request->point_description_2;
        $imagePost->point_description_3 = $request->point_description_3;
        $imagePost->point_description_4 = $request->point_description_4;
        $imagePost->point_description_5 = $request->point_description_5;
        $imagePost->point_description_6 = $request->point_description_6;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        $products = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id', null)->get();
        if (count($products) > 0) {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $imagePost->product_id = json_encode($all_product);
        }

        $imagePost->save();
        $data = ['blogger_id' => $imagePost->blogger_id];
        $imagePost->categories()->attach($request->category, $data);

        $images = new AddImages();
        $images->storeImage($request, $imagePost);

        if ($products != null) {
            foreach ($products as $product) {
                $product->post_id = $imagePost->id;
                $product->post_type = 'image';
                $product->post_slug = $imagePost->slug;
                $product->save();
            }
        }

        event(new UserActivity($imagePost->blogger_id, $imagePost->post_type, $imagePost->template_id, $imagePost->id));

        if ($request->post_status == 0) {
            return response()->json([
                'success' => 'File Uploaded Successfully',
                'slug' => $imagePost->slug
            ]);
        } elseif ($request->post_status == 3) {
            return response()->json(['success' => 'Post saved in library successfully']);
        }

        return back()->with('success', 'Post Uploaded Successfully');
    }

    public function show($slug)
    {
        $post['post'] = Image::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_slug', $post['post']->slug)
            ->get();

        return view('blogger.posts.image_post_show', compact('post'));
    }

    public function edit($slug)
    {
        $post['post'] = Image::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        if ($post['post'] == null)
        {
            return back();
        }

        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('post_slug',$post['post']->slug)
            ->where('post_type',$post['post']->post_type)
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
        if ($request->has('image_8') and $request->image_8 != null) {
            $validator = Validator::make($request->all(), [
                'image_8' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }
        if ($request->has('image_9') and $request->image_9 != null) {
            $validator = Validator::make($request->all(), [
                'image_9' => 'mimes:jpeg,png,jpg,svg|max:3072',
            ]);
        }


        $imagePost = Image::where('blogger_id', Auth::guard('blogger')->id())
            ->where('slug', $slug)->first();
        if ($request->post_status == 1) {
            $imagePost->post_status = 1;
        }

        $imagePost->title = $request->title;

        $imagePost->intro_heading = $request->intro_headline;
        $imagePost->outro_heading = $request->outro_headline;
        $imagePost->intro_description = $request->intro_description;
        $imagePost->outro_description = $request->outro_description;

        $imagePost->last_heading = $request->last_headline;
        $imagePost->last_description = $request->last_description;

        $imagePost->headline1 = $request->headline_1;
        $imagePost->headline2 = $request->headline_2;
        $imagePost->headline3 = $request->headline_3;
        $imagePost->headline4 = $request->headline_4;
        $imagePost->headline5 = $request->headline_5;
        $imagePost->headline6 = $request->headline_6;
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;
        $imagePost->description4 = $request->description_4;
        $imagePost->description5 = $request->description_5;
        $imagePost->description6 = $request->description_6;

        $imagePost->point_heading_1 = $request->point_headline_1;
        $imagePost->point_heading_2 = $request->point_headline_2;
        $imagePost->point_heading_3 = $request->point_headline_3;
        $imagePost->point_heading_4 = $request->point_headline_4;
        $imagePost->point_heading_5 = $request->point_headline_5;
        $imagePost->point_heading_6 = $request->point_headline_6;

        $imagePost->point_description_1 = $request->point_description_1;
        $imagePost->point_description_2 = $request->point_description_2;
        $imagePost->point_description_3 = $request->point_description_3;
        $imagePost->point_description_4 = $request->point_description_4;
        $imagePost->point_description_5 = $request->point_description_5;
        $imagePost->point_description_6 = $request->point_description_6;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        $imagePost->save();
        $data = ['blogger_id'=>$imagePost->blogger_id];

        $imagePost->categories()->detach();
        $imagePost->categories()->attach($request->category,$data);

        $images = new AddImages();
        $images->updateImage($request, $imagePost);
    }

    public function destroy(Request $request,$slug)
    {
        $post = Image::where('blogger_id',$request->blogger_id)
            ->where('slug',$slug)
            ->first();

        abort_if($post == null, 404);

        foreach ($post->medias as $media)
        {
            unlink($media->address);
        }

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
