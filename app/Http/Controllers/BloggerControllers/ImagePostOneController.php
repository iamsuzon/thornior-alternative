<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\Comments;
use App\Models\ImagePostTemplateOne;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ImagePostOneController extends Controller
{
    public function ImagePostIndexOne()
    {
        return view('blogger.posts.image_templates.editor_template_one');
    }

    public function ImagePostStoreOne(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_headline' => 'required',
            'first_description' => 'required|min:25',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'main_article_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'headline_4' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image2' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'image3' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = new ImagePostTemplateOne();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = 1;
        $imagePost->post_type = 'image';
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
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;
        $imagePost->description4 = $request->description_4;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        $fimage = time() . 'f.' . $request->featured_image->extension();
        $fname_path = 'upload/blogger_image_post/' . $fimage;
        $main_article_image = time() . 'a.' . $request->main_article_image->extension();
        $main_article_image_path = 'upload/blogger_image_post/' . $main_article_image;
        $image1 = time() . '1.' . $request->image1->extension();
        $name_path1 = 'upload/blogger_image_post/' . $image1;
        $image2 = time() . '2.' . $request->image2->extension();
        $name_path2 = 'upload/blogger_image_post/' . $image2;
        $image3 = time() . '3.' . $request->image3->extension();
        $name_path3 = 'upload/blogger_image_post/' . $image3;

        $imagePost->fimage = $fimage;
        $imagePost->article_image = $main_article_image;
        $imagePost->image1 = $image1;
        $imagePost->image2 = $image2;
        $imagePost->image3 = $image3;

        Image::make($request->file('featured_image'))->save($fname_path, 80, 'jpg');
        Image::make($request->file('main_article_image'))->save($main_article_image_path, 80, 'jpg');
        Image::make($request->file('image1'))->save($name_path1, 80, 'jpg');
        Image::make($request->file('image2'))->save($name_path2, 80, 'jpg');
        Image::make($request->file('image3'))->save($name_path3, 80, 'jpg');

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
                $product->post_type = 'image';
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        event(new UserActivity($imagePost->blogger_id, $imagePost->post_type, $imagePost->template_id, $imagePost->id));

        if ($request->post_status == 0)
        {
            return redirect()->route('blogger.blog.post.image.show.1',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
            return back()->with('success', 'Post saved in library successfully');
        }

        return back()->with('success', 'Post upload successfully');
    }

    public function ImagePostShowOne($slug)
    {
        if (Auth::guard('blogger')->check())
        {
            $user_guard = 'blogger';
        }
        else if (Auth::guard('web')->check())
        {
            $user_guard = 'web';
        }

        $post['post'] = ImagePostTemplateOne::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();

        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('post_type', $post['post']->post_type)
            ->where('template_id',$post['post']->template_id)->get();
        $post['related_posts'] = ImagePostTemplateOne::where('id','!=',$post['post']->id)->inRandomOrder()->get();

        $post['like'] = $this->checkLike($post['post']);

        return view('blogger.posts.image_post_show', compact('post'));
    }

    public function ImagePostEditOne($id)
    {
        $post['post'] = ImagePostTemplateOne::where('id', $id)->where('blogger_id', Auth::guard('blogger')->id())->first();
        if ($post['post'] == null)
        {
            return back();
        }
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
                                            ->where('post_id',$id)
                                            ->where('template_id',$post['post']->template_id)
                                            ->get();
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

        return view('blogger.posts.image_templates_edit.editor_template_one_edit', compact('post'));
    }

    public function ImagePostUpdateOne(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_headline' => 'required',
            'first_description' => 'required|min:25',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'headline_4' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
            'last_headline' => 'required',
            'last_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = ImagePostTemplateOne::where('blogger_id', Auth::guard('blogger')->id())
            ->where('id', $id)->first();
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
        $imagePost->description1 = $request->description_1;
        $imagePost->description2 = $request->description_2;
        $imagePost->description3 = $request->description_3;
        $imagePost->description4 = $request->description_4;

        $imagePost->color1 = $request->color_code1;
        $imagePost->color2 = $request->color_code2;
        $imagePost->color3 = $request->color_code3;
        $imagePost->color4 = $request->color_code4;
        $imagePost->color5 = $request->color_code5;

        if ($request->has('featured_image') AND $request->featured_image != null)
        {
            $fimage = time() . 'f.' . $request->featured_image->extension();
            $fname_path = 'upload/blogger_image_post/' . $fimage;
            $imagePost->fimage = $fimage;
            Image::make($request->file('featured_image'))->save($fname_path, 80, 'jpg');
        }
        if ($request->has('main_article_image') AND $request->main_article_image != null)
        {
            $mimage = time() . 'm.' . $request->main_article_image->extension();
            $mname_path = 'upload/blogger_image_post/' . $mimage;
            $imagePost->article_image = $mimage;
            Image::make($request->file('main_article_image'))->save($mname_path, 80, 'jpg');
        }
        if ($request->has('image1') AND $request->image1 != null)
        {
            $image1 = time() . '1.' . $request->image1->extension();
            $name_path1 = 'upload/blogger_image_post/' . $image1;
            $imagePost->image1 = $image1;
            Image::make($request->file('image1'))->save($name_path1, 80, 'jpg');
        }
        if($request->has('image2') AND $request->image2 != null)
        {
            $image2 = time() . '2.' . $request->image2->extension();
            $name_path2 = 'upload/blogger_image_post/' . $image2;
            $imagePost->image2 = $image2;
            Image::make($request->file('image2'))->save($name_path2, 80, 'jpg');
        }
        if ($request->has('image3') AND $request->image3 != null)
        {
            $image3 = time() . '3.' . $request->image3->extension();
            $name_path3 = 'upload/blogger_image_post/' . $image3;
            $imagePost->image3 = $image3;
            Image::make($request->file('image3'))->save($name_path3, 80, 'jpg');
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
                $product->post_type = 'image';
                $product->template_id = $imagePost->template_id;
                $product->save();
            }
        }

        if ($request->post_status == 0)
        {
            return redirect()->route('blogger.blog.post.image.show',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
            return back()->with('success', 'Post saved in library successfully');
        }

        return back()->with('success', 'Post update successfully');
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
