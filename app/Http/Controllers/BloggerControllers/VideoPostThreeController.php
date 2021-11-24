<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\Like;
use App\Models\VideoPostTemplateThree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class VideoPostThreeController extends Controller
{
    public function VideoPostIndexThree()
    {
        return view('blogger.posts.video_templates.editor_template_three');
    }

    public function VideoPostStoreThree(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_headline' => 'required',
            'first_description' => 'required|min:25',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'headline_4' => 'required',
            'headline_5' => 'required',
            'headline_6' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
            'description_5' => 'required',
            'description_6' => 'required',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image_4' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image_5' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'video' => 'required|mimes:mp4,mkv,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv|max:40000',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'   => $validator->errors()->all(),]);
        }

        $imagePost = new VideoPostTemplateThree();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = 3;
        $imagePost->post_type = 'video';
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }
        else{
            $imagePost->post_status = 0;
        }
        $imagePost->title = $request->title;
        $imagePost->intro_header = $request->first_headline;
        $imagePost->outro_header = $request->last_headline;
        $imagePost->intro_description = $request->first_description;
        $imagePost->outro_description = $request->last_description;
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

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        $fimage = time() . 'f.' . $request->thumbnail_image->extension();
        $fname_path = 'upload/blogger_image_post/' . $fimage;
        $image1 = time() . '1.' . $request->image_1->extension();
        $name_path1 = 'upload/blogger_image_post/' . $image1;
        $image2 = time() . '2.' . $request->image_2->extension();
        $name_path2 = 'upload/blogger_image_post/' . $image2;
        $image3 = time() . '3.' . $request->image_3->extension();
        $name_path3 = 'upload/blogger_image_post/' . $image3;
        $image4 = time() . '4.' . $request->image_4->extension();
        $name_path4 = 'upload/blogger_image_post/' . $image4;
        $image5 = time() . '5.' . $request->image_5->extension();
        $name_path5 = 'upload/blogger_image_post/' . $image5;

        $imagePost->fimage = $fimage;
        $imagePost->image1 = $image1;
        $imagePost->image2 = $image2;
        $imagePost->image3 = $image3;
        $imagePost->image4 = $image4;
        $imagePost->image5 = $image5;

        Image::make($request->file('thumbnail_image'))->save($fname_path, 80, 'jpg');
        Image::make($request->file('image_1'))->save($name_path1, 80, 'jpg');
        Image::make($request->file('image_2'))->save($name_path2, 80, 'jpg');
        Image::make($request->file('image_3'))->save($name_path3, 80, 'jpg');
        Image::make($request->file('image_4'))->save($name_path4, 80, 'jpg');
        Image::make($request->file('image_5'))->save($name_path5, 80, 'jpg');;

        $video_file_name = time() . 'v.' . $request->video->extension();
        $video_file_path = public_path().'/upload/blogger_video_post/'.$request->user()->id;
        $request->video->move($video_file_path, $video_file_name);
        $imagePost->video = $video_file_name;

        $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())
                                ->where('post_id',null)->get();
        if (count($products) > 0) {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $imagePost->product_id = json_encode($all_product);
        }

        $imagePost->save();
        $data = ['blogger_id' => $imagePost->blogger_id];
        $imagePost->categories()->attach($request->category,$data);

        if ($products != null) {
            foreach ($products as $product) {
                $product->post_id = $imagePost->id;
                $product->post_type = 'video';
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        event(new UserActivity($imagePost->blogger_id, $imagePost->post_type, $imagePost->template_id, $imagePost->id));

        if ($request->post_status == 0)
        {
            return response()->json([
                'success' => 'File Uploaded Successfully',
                'slug' => $imagePost->slug
                ]);
//            return redirect()->route('blogger.blog.post.video.show',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
//            return back()->with('success', 'Post saved in library successfully')
            return response()->json(['success' => 'Post saved in library successfully']);
        }

//        return back()->with('success', 'Post upload successfully');
        return response()->json(['success' => 'Post Uploaded Successfully']);
    }

    public function VideoPostShowThree($slug)
    {
        $post['post'] = VideoPostTemplateThree::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('template_id',$post['post']->template_id)
            ->where('post_type', $post['post']->post_type)->get();
        $post['related_posts'] = VideoPostTemplateThree::where('id','!=',$post['post']->id)->inRandomOrder()->get();
        $post['like'] = $this->checkLike($post['post']);
        return view('blogger.posts.video_post_show', compact('post'));
    }

    public function VideoPostEditThree($id)
    {
        $post['post'] = VideoPostTemplateThree::where('id', $id)->where('blogger_id', Auth::guard('blogger')->id())->first();
        if ($post['post'] == null)
        {
            return back();
        }
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
                                            ->where('post_id',$id)
                                            ->where('template_id',$post['post']->template_id)
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

        return view('blogger.posts.video_templates_edit.editor_template_three_edit', compact('post'));
    }

    public function VideoPostUpdateThree(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_headline' => 'required',
            'first_description' => 'required|min:25',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'headline_4' => 'required',
            'headline_5' => 'required',
            'headline_6' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
            'description_5' => 'required',
            'description_6' => 'required',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'   => $validator->errors()->all(),]);
        }

        $imagePost = VideoPostTemplateThree::where('blogger_id', Auth::guard('blogger')->id())
            ->where('id', $id)->first();
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }

        $imagePost->title = $request->title;
        $imagePost->intro_header = $request->first_headline;
        $imagePost->outro_header = $request->last_headline;
        $imagePost->intro_description = $request->first_description;
        $imagePost->outro_description = $request->last_description;
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

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        if ($request->has('thumbnail_image') AND $request->thumbnail_image != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->fimage;
            unlink($image_path);

            $fimage = time() . 'f.' . $request->thumbnail_image->extension();
            $fname_path = 'upload/blogger_image_post/' . $fimage;
            $imagePost->fimage = $fimage;
            Image::make($request->file('thumbnail_image'))->save($fname_path, 80, 'jpg');
        }
        if ($request->has('image_1') AND $request->image_1 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image1;
            unlink($image_path);

            $image1 = time() . '1.' . $request->image_1->extension();
            $name_path1 = 'upload/blogger_image_post/' . $image1;
            $imagePost->image1 = $image1;
            Image::make($request->file('image_1'))->save($name_path1, 80, 'jpg');
        }
        if($request->has('image_2') AND $request->image_2 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image2;
            unlink($image_path);

            $image2 = time() . '2.' . $request->image_2->extension();
            $name_path2 = 'upload/blogger_image_post/' . $image2;
            $imagePost->image2 = $image2;
            Image::make($request->file('image_2'))->save($name_path2, 80, 'jpg');
        }
        if ($request->has('image_3') AND $request->image_3 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image3;
            unlink($image_path);

            $image3 = time() . '3.' . $request->image_3->extension();
            $name_path3 = 'upload/blogger_image_post/' . $image3;
            $imagePost->image3 = $image3;
            Image::make($request->file('image_3'))->save($name_path3, 80, 'jpg');
        }
        if ($request->has('image_4') AND $request->image_4 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image4;
            unlink($image_path);

            $image4 = time() . '4.' . $request->image_4->extension();
            $name_path4 = 'upload/blogger_image_post/' . $image4;
            $imagePost->image4 = $image4;
            Image::make($request->file('image_4'))->save($name_path4, 80, 'jpg');
        }
        if ($request->has('image_5') AND $request->image_5 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image5;
            unlink($image_path);

            $image5 = time() . '5.' . $request->image_5->extension();
            $name_path5 = 'upload/blogger_image_post/' . $image5;
            $imagePost->image5 = $image5;
            Image::make($request->file('image_5'))->save($name_path5, 80, 'jpg');
        }
        if ($request->has('image_6') AND $request->image_6 != null)
        {
            $image_path = 'upload/blogger_image_post/'.$imagePost->image6;
            unlink($image_path);

            $image6 = time() . '6.' . $request->image_6->extension();
            $name_path6 = 'upload/blogger_image_post/' . $image6;
            $imagePost->image6 = $image6;
            Image::make($request->file('image_6'))->save($name_path6, 80, 'jpg');
        }
        if ($request->has('video') AND $request->video != null)
        {
            $image_path = public_path().'/upload/blogger_video_post/'.$request->user()->id.'/'.$imagePost->video;
            unlink($image_path);

            $video_file_name = time() . 'v.' . $request->video->extension();
            $video_file_path = public_path().'/upload/blogger_video_post/'.$request->user()->id;
            $request->video->move($video_file_path, $video_file_name);
            $imagePost->video = $video_file_name;
        }

        $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())
            ->where('post_id',null)->get();

        if (count($products) > 0)
        {
            foreach ($products as $product) {
                $all_product[] = $product->id;
            }
            $imagePost->product_id = json_encode($all_product);
        }

        $imagePost->save();
        $data = ['blogger_id'=>$imagePost->blogger_id];

        $imagePost->categories()->detach();
        $imagePost->categories()->attach($request->category,$data);

        if ($products != null)
        {
            foreach($products as $product)
            {
                $product->post_id = $imagePost->id;
                $product->post_type = $imagePost->post_type;
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        if ($request->post_status == 0)
        {
            return response()->json([
                'success' => 'File Uploaded Successfully',
                'slug' => $imagePost->slug
            ]);
        }
        elseif ($request->post_status == 3)
        {
//            return back()->with('success', 'Post saved in library successfully');
            return response()->json(['success' => 'Post saved in library successfully']);
        }

//        return back()->with('success', 'Post update successfully');
        return response()->json(['success' => 'Post Uploaded Successfully']);
    }

    public function checkLike($post)
    {
        if (Auth::guard('blogger')->check())
        {
            $user_guard = 'blogger';
        }
        else if (Auth::guard('web')->check())
        {
            $user_guard = 'web';
        }

        $like = Like::where('template_type', $post->post_type)
            ->where('template_id', $post->template_id)
            ->where('post_id', $post->id)
            ->where('user_type', $user_guard)
            ->where('user_id', Auth::id())
            ->exists();

        return $like;
    }
}
