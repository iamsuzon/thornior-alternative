<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Events\UserActivity;
use App\Models\AllBlogs;
use App\Models\BlogAbout;
use App\Models\Blogger;
use App\Models\BloggerProduct;
use App\Models\Category;
use App\Models\Click;
use App\Models\Comments;
use App\Models\Country;
use App\Models\FAQs;
use App\Models\HideUnhide;
use App\Models\Like;
use App\Models\NotifyAdmin;
use App\Models\SavePost;
use App\Models\Video;
use App\Models\Image as Images;
use App\Models\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class BloggerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check() == true and Auth::guard('blogger')->user()->blog->blog_status == 'paused') {
            Auth::guard('blogger')->logout();
            session()->invalidate();
        }

        $auth_id = Auth::guard('blogger')->id();

        $posts['image'] = Images::where('blogger_id', $auth_id)->orderBy('created_at', 'DESC')->limit(18)->get();
        $posts['video'] = Video::where('blogger_id', $auth_id)->orderBy('created_at', 'DESC')->limit(18)->get();

        $post_index = 0;
        foreach ($posts['image'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        if (!isset($posts['posts'])) {
            return view('blogger.dashboard', compact('posts'));
        }

        $posts['posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();
        $posts['comments'] = Comments::where('post_owner_id', $auth_id)->get()->sortByDesc('created_at');
        $posts['categories'] = DB::table('taggables')
            ->join('categories', 'taggables.category_id', '=', 'categories.id')
            ->join('bloggers as blogger', 'taggables.blogger_id', '=', 'blogger.id')
            ->where('blogger.id', '=', $auth_id)
            ->select('categories.*', 'taggables.*')
            ->get();

        $i = 1;
        foreach ($posts['categories'] as $category) {
            $category_post[$i] = $category->taggable_type::where('id', $category->taggable_id)
                ->where('blogger_id', $auth_id)
                ->first();

            $category_post[$i]->category_id = $category->category_id;
            $i++;
        }

        return view('blogger.dashboard', compact('posts', 'category_post'));
    }

    public function overview()
    {
        $status = HideUnhide::where('blogger_id', Auth::guard('blogger')->id())->get();
        $about = BlogAbout::where('blog_id', Auth::guard('blogger')->user()->blog->id)->first();
        $faqs = FAQs::where('blog_id', Auth::guard('blogger')->user()->blog->id)->get();

        foreach ($status as $state) {
            if ($state->section_name == 'post_section') {
                $status['post_section'] = $state;
            }
            if ($state->section_name == 'video_section') {
                $status['video_section'] = $state;
            }
            if ($state->section_name == 'link_section') {
                $status['link_section'] = $state;
            }
            if ($state->section_name == 'about_section') {
                $status['about_section'] = $state;
            }
        }

        return view('blogger.blog_overview', compact('status', 'about', 'faqs'));
    }

    public function settingsBlogShow()
    {
        $bloggerData['blog'] = AllBlogs::where('blogger_id', Auth::guard('blogger')->id())->first();

        if ($bloggerData['blog']->region != null) {
            $bloggerData['region'] = Country::where('code', $bloggerData['blog']->region)->first();
        }

        return view('blogger.settings.settings', compact('bloggerData'));
    }

    public function settingsBlogSubmit(Request $request)
    {
        $info = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'region' => 'required',
            'about' => 'max:800',
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $blog = AllBlogs::where('blogger_id', Auth::guard('blogger')->id())->first();
        $blog->blog_name = $info['name'];
        $blog->region = $info['region'];
        $blog->blog_description = $info['about'];

        if ($request->has('image')) {
            if ($blog->image != null) {
                $image_path = 'upload/blogger/blog/' . $blog->image;
                unlink($image_path);
            }
            $image_name = time() . '.' . $request->image->extension();
            $image_path = 'upload/blogger/blog/' . time() . '.' . $request->image->extension();
            Image::make($request->file('image'))->save($image_path, 80, 'jpg');
            $blog->image = $image_name;
        }

        $blog->save();

        event(new UserActivity($blog->blogger->id, null, null, null));

        return back()->with('message', 'Your Profile is Updated Successfully');
    }


    public function settingsProfileShow()
    {
        $bloggerData['blogger'] = Blogger::findOrFail(Auth::guard('blogger')->id());

        if ($bloggerData['blogger']->region != null) {
            $bloggerData['region'] = Country::where('code', $bloggerData['blogger']->region)->first();
        }

        return view('blogger.profile.index', compact('bloggerData'));
    }

    public function settingsProfileSubmit(Request $request)
    {
        $info = $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'region' => 'required',
            'about' => 'max:800',
        ]);

        $blogger = Blogger::findOrFail(Auth::guard('blogger')->id());
        $blogger->name = $info['name'];
        $blogger->email = $info['email'];
        $blogger->region = $info['region'];
        $blogger->about = $info['about'];

        $blogger->save();

        return back()->with('message', 'Your Profile is Updated Successfully');
    }

    public function settingsProfileImageSubmit(Request $request)
    {
        $rule = $this->validate($request, [
            'image' => 'required|max:2024'
        ]);

        $blogger = Blogger::findOrFail(Auth::guard('blogger')->id());

        if ($request->has('image')) {
            if ($blogger->image != null and $blogger->image != 'user.jpg') {
                $image_path = 'upload/blogger/avatar/' . $blogger->image;
                unlink($image_path);
            }
            $image_name = time() . '.' . $request->image->extension();
            $image_path = 'upload/blogger/avatar/' . time() . '.' . $request->image->extension();
            Image::make($request->file('image'))->fit(300, 300)->save($image_path, 80, 'jpg');
            $blogger->image = $image_name;
        }
        $blogger->save();

        return back()->with('message', 'Your Profile Picture is Updated Successfully');
    }

    public function postDelete(Request $request)
    {
        abort_if(Auth::guard('blogger')->user()->id != $request->blogger_id, 404);

        switch ($request->template_id) {
            case 1:
                $template_id = "One";
                break;
            case 2:
                $template_id = "Two";
                break;
            case 3:
                $template_id = "Three";
                break;
            case 4:
                $template_id = "Four";
                break;
            case 5:
                $template_id = "Five";
                break;
            case 6:
                $template_id = "Six";
                break;
        }

        $model = 'App\Models\\' . ucwords($request->template_type) . 'PostTemplate' . $template_id;
        $post = $model::where('id', $request->post_id)->first();

        abort_if($post == null, 404);

        if (isset($post->fimage)) {
            unlink('upload/blogger_image_post/' . $post->fimage);
        }
        if (isset($post->video) and $post->video != null) {
            unlink('upload/blogger_video_post/' . $request->blogger_id . '/' . $post->video);
        }
        if (isset($post->product_background_image) and $post->product_background_image != null) {
            unlink('upload/blogger_image_post/' . $post->product_background_image);
        }
        if (isset($post->product_background) and $post->product_background != null) {
            unlink('upload/blogger_image_post/' . $post->product_background);
        }

        if (isset($post->article_image1) and $post->article_image1 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image1);
        }
        if (isset($post->article_image2) and $post->article_image2 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image2);
        }
        if (isset($post->article_image3) and $post->article_image3 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image3);
        }
        if (isset($post->article_image4) and $post->article_image4 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image4);
        }
        if (isset($post->article_image5) and $post->article_image5 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image5);
        }
        if (isset($post->article_image6) and $post->article_image6 != null) {
            unlink('upload/blogger_image_post/' . $post->article_image6);
        }

        if (isset($post->image1) and $post->image1 != null) {
            unlink('upload/blogger_image_post/' . $post->image1);
        }
        if (isset($post->image2) and $post->image2 != null) {
            unlink('upload/blogger_image_post/' . $post->image2);
        }
        if (isset($post->image3) and $post->image3 != null) {
            unlink('upload/blogger_image_post/' . $post->image3);
        }
        if (isset($post->image4) and $post->image4 != null) {
            unlink('upload/blogger_image_post/' . $post->image4);
        }
        if (isset($post->image5) and $post->image5 != null) {
            unlink('upload/blogger_image_post/' . $post->image5);
        }
        if (isset($post->image6) and $post->image6 != null) {
            unlink('upload/blogger_image_post/' . $post->image6);
        }

        if (isset($post->bottom_image) and $post->bottom_image != null) {
            unlink('upload/blogger_image_post/' . $post->bottom_image);
        }
        if (isset($post->outro_image) and $post->outro_image != null) {
            unlink('upload/blogger_image_post/' . $post->outro_image);
        }

        if (isset($post->bottom_image1) and $post->bottom_image1 != null) {
            unlink('upload/blogger_image_post/' . $post->bottom_image1);
        }
        if (isset($post->bottom_image2) and $post->bottom_image2 != null) {
            unlink('upload/blogger_image_post/' . $post->bottom_image2);
        }
        if (isset($post->bottom_image3) and $post->bottom_image3 != null) {
            unlink('upload/blogger_image_post/' . $post->bottom_image3);
        }

        $products = BloggerProduct::where('blogger_id', $request->blogger_id)->get();
        foreach ($products as $product) {
            unlink('upload/blogger_product/' . $product->image);
            $product->delete();
        }

        $saved = SavePost::where('post_user_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->first();

        if ($saved != null) {
            $saved->delete();
        }

        $likes = Like::where('post_user_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->first();

        if ($likes != null) {
            $likes->delete();
        }

        $comments = Comments::where('post_user_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->get();

        foreach ($comments as $comment) {
            $comment->delete();
        }

        $views = View::where('blogger_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->get();

        foreach ($views as $view) {
            $view->delete();
        }

        $clicks = Click::where('blogger_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->get();

        foreach ($clicks as $click) {
            $click->delete();
        }

        $notify = NotifyAdmin::where('blogger_id', $request->blogger_id)
            ->where('template_type', $request->template_type)
            ->where('template_id', $request->template_id)
            ->where('post_id', $request->post_id)
            ->first();

        if ($notify != null) {
            $notify->delete();
        }

        $taggables = DB::table('taggables')->where('blogger_id', $request->blogger_id)
            ->where('taggable_id', $request->post_id)
            ->where('taggable_type', $model)
            ->delete();

        $post->delete();

        return back()->with('success', 'The post is deleted');
    }
}
