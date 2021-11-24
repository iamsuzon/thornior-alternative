<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use App\Models\ImagePostTemplateFive;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ImagePostFiveController extends Controller
{
    public function ImagePostIndexFive()
    {
        return view('blogger.posts.image_templates.editor_template_five');
    }

    public function ImagePostStoreFive(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_1' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_2' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_3' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_4' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_5' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'article_image_6' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'product_background_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'intro_headline' => 'required',
            'headline_1' => 'required',
            'headline_2' => 'required',
            'headline_3' => 'required',
            'headline_4' => 'required',
            'headline_5' => 'required',
            'headline_6' => 'required',
            'intro_description' => 'required',
            'description_1' => 'required',
            'description_2' => 'required',
            'description_3' => 'required',
            'description_4' => 'required',
            'description_5' => 'required',
            'description_6' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = new ImagePostTemplateFive();
        $imagePost->blogger_id = Auth::guard('blogger')->id();
        $imagePost->template_id = 5;
        $imagePost->post_type = 'image';
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }
        else{
            $imagePost->post_status = 0;
        }
        $imagePost->title = $request->title;
        $imagePost->intro_headline = $request->intro_headline;
        $imagePost->intro_description = $request->intro_description;

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

        $fimage = time() . 'f.' . $request->cover_image->extension();
        $fname_path = 'upload/blogger_image_post/' . $fimage;

        $main_article_image_1 = time() . 'ai1.' . $request->article_image_1->extension();
        $main_article_image_path_1 = 'upload/blogger_image_post/' . $main_article_image_1;

        $main_article_image_2 = time() . 'ai2.' . $request->article_image_2->extension();
        $main_article_image_path_2 = 'upload/blogger_image_post/' . $main_article_image_2;

        $main_article_image_3 = time() . 'ai3.' . $request->article_image_3->extension();
        $main_article_image_path_3 = 'upload/blogger_image_post/' . $main_article_image_3;

        $main_article_image_4 = time() . 'ai4.' . $request->article_image_4->extension();
        $main_article_image_path_4 = 'upload/blogger_image_post/' . $main_article_image_4;

        $main_article_image_5 = time() . 'ai5.' . $request->article_image_5->extension();
        $main_article_image_path_5 = 'upload/blogger_image_post/' . $main_article_image_5;

        $main_article_image_6 = time() . 'ai6.' . $request->article_image_6->extension();
        $main_article_image_path_6 = 'upload/blogger_image_post/' . $main_article_image_6;

        $product_background_image = time() . 'ai6.' . $request->product_background_image->extension();
        $product_background_image_path = 'upload/blogger_image_post/' . $product_background_image;

        $imagePost->fimage = $fimage;
        $imagePost->article_image1 = $main_article_image_1;
        $imagePost->article_image2 = $main_article_image_2;
        $imagePost->article_image3 = $main_article_image_3;
        $imagePost->article_image4 = $main_article_image_4;
        $imagePost->article_image5 = $main_article_image_5;
        $imagePost->article_image6 = $main_article_image_6;
        $imagePost->product_background_image = $product_background_image;

        Image::make($request->file('cover_image'))->save($fname_path, 80, 'jpg');

        Image::make($request->file('article_image_1'))->save($main_article_image_path_1, 80, 'jpg');
        Image::make($request->file('article_image_2'))->save($main_article_image_path_2, 80, 'jpg');
        Image::make($request->file('article_image_3'))->save($main_article_image_path_3, 80, 'jpg');
        Image::make($request->file('article_image_4'))->save($main_article_image_path_4, 80, 'jpg');
        Image::make($request->file('article_image_5'))->save($main_article_image_path_5, 80, 'jpg');
        Image::make($request->file('article_image_6'))->save($main_article_image_path_6, 80, 'jpg');
        Image::make($request->file('product_background_image'))->save($product_background_image_path, 80, 'jpg');


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
        $data = ['blogger_id' => $imagePost->blogger_id];
        $imagePost->categories()->attach($request->category,$data);

        if ($products != null)
        {
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
            return redirect()->route('blogger.blog.post.image.show.3',$imagePost->slug);
        }
        elseif ($request->post_status == 3)
        {
            return back()->with('success', 'Post saved in library successfully');
        }

        return back()->with('success', 'Post upload successfully');
    }

    public function ImagePostShowFive($slug)
    {
        $post['post'] = ImagePostTemplateFive::where('slug', $slug)->where('blogger_id', Auth::guard('blogger')->id())->first();
        $post['products'] = BloggerProduct::where('blogger_id', Auth::guard('blogger')->id())
            ->where('post_id',$post['post']->id)
            ->where('post_type',$post['post']->post_type)
            ->where('template_id',$post['post']->template_id)->get();
        $post['related_posts'] = ImagePostTemplateFive::where('id','!=',$post['post']->id)->inRandomOrder()->get();

        $post['like'] = $this->checkLike($post['post']);

        if (strlen($post['post']->intro_description) > 400)
        {
            foreach ($this->splitText($post['post']->intro_description)[0] as $key => $description)
            {
                $post['post']['intro_description_'.$key] = $description;
            }
        }
        else{
            $post['post']->intro_description_0 = $post['post']->intro_description;
        }

        return view('blogger.posts.image_post_show', compact('post'));
    }

    public function ImagePostEditFive($id)
    {
        $post['post'] = ImagePostTemplateFive::where('id', $id)->where('blogger_id', Auth::guard('blogger')->id())->first();
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

        return view('blogger.posts.image_templates_edit.editor_template_five_edit', compact('post'));
    }

    public function ImagePostUpdateFive(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
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
            'intro_headline' => 'required',
            'intro_description' => 'required|min:25',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput($request->input());
        }

        $imagePost = ImagePostTemplateFive::where('blogger_id', Auth::guard('blogger')->id())
            ->where('id', $id)->first();
        if ($request->post_status == 1)
        {
            $imagePost->post_status = 1;
        }
        else{
            $imagePost->post_status = 0;
        }
        $imagePost->title = $request->title;
        $imagePost->intro_headline = $request->intro_headline;
        $imagePost->intro_description = $request->intro_description;

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

        if ($request->has('cover_image') AND $request->cover_image != null)
        {
            $fimage = time() . 'f.' . $request->cover_image->extension();
            $fname_path = 'upload/blogger_image_post/' . $fimage;
            $imagePost->fimage = $fimage;
            Image::make($request->file('cover_image'))->save($fname_path, 80, 'jpg');
        }
        if ($request->has('article_image_1') AND $request->main_article_image_1 != null)
        {
            $main_article_image_1 = time() . 'ai1.' . $request->main_article_image_1->extension();
            $main_article_image_path_1 = 'upload/blogger_image_post/' . $main_article_image_1;
            $imagePost->article_image1 = $main_article_image_1;
            Image::make($request->file('main_article_image_1'))->save($main_article_image_path_1, 80, 'jpg');
        }
        if ($request->has('article_image_2') AND $request->main_article_image_2 != null)
        {
            $main_article_image_2 = time() . 'ai2.' . $request->main_article_image_2->extension();
            $main_article_image_path_2 = 'upload/blogger_image_post/' . $main_article_image_2;
            $imagePost->article_image2 = $main_article_image_2;
            Image::make($request->file('main_article_image_2'))->save($main_article_image_path_2, 80, 'jpg');
        }
        if($request->has('article_image_3') AND $request->main_article_image_3 != null)
        {
            $main_article_image_3 = time() . 'ai3.' . $request->main_article_image_3->extension();
            $main_article_image_path_3 = 'upload/blogger_image_post/' . $main_article_image_3;
            $imagePost->article_image3 = $main_article_image_3;
            Image::make($request->file('main_article_image_3'))->save($main_article_image_path_3, 80, 'jpg');
        }
        if($request->has('article_image_4') AND $request->main_article_image_4 != null)
        {
            $main_article_image_4 = time() . 'ai4.' . $request->main_article_image_4->extension();
            $main_article_image_path_4 = 'upload/blogger_image_post/' . $main_article_image_4;
            $imagePost->article_image4 = $main_article_image_4;
            Image::make($request->file('main_article_image_4'))->save($main_article_image_path_4, 80, 'jpg');
        }
        if($request->has('article_image_5') AND $request->article_image_4 != null)
        {
            $main_article_image_5 = time() . 'ai5.' . $request->article_image_5->extension();
            $main_article_image_path_5 = 'upload/blogger_image_post/' . $main_article_image_5;
            $imagePost->article_image5 = $main_article_image_5;
            Image::make($request->file('article_image_5'))->save($main_article_image_path_5, 80, 'jpg');
        }
        if($request->has('article_image_6') AND $request->article_image_6 != null)
        {
            $main_article_image_6 = time() . 'ai6.' . $request->article_image_6->extension();
            $main_article_image_path_6 = 'upload/blogger_image_post/' . $main_article_image_6;
            $imagePost->article_image6 = $main_article_image_6;
            Image::make($request->file('article_image_6'))->save($main_article_image_path_6, 80, 'jpg');
        }
        if($request->has('product_background_image') AND $request->product_background_image != null)
        {
            $product_background_image = time() . 'ai6.' . $request->product_background_image->extension();
            $product_background_image_path = 'upload/blogger_image_post/' . $product_background_image;
            $imagePost->product_background_image = $product_background_image;
            Image::make($request->file('product_background_image'))->save($product_background_image_path, 80, 'jpg');
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

    public function splitText($text)
    {
        $intro_description = $text;
        $split_string1 = substr($intro_description, 0, floor(strlen($intro_description) / 2));
        $split_string2 = substr($intro_description, floor(strlen($intro_description) / 2));

        if (substr($split_string1, 0, -1) != ' ' AND substr($split_string2, 0, 1) != ' ')
        {
            $middle = strlen($split_string1) + strpos($split_string2, ' ') + 1;
        }
        else
        {
            $middle = strrpos(substr($intro_description, 0, floor(strlen($intro_description) / 2)), ' ') + 1;
        }

        $text1 = substr($intro_description, 0, $middle);
        $text2 = substr($intro_description, $middle);

        $splitedText[] = [$text1,$text2];

        return $splitedText;
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
