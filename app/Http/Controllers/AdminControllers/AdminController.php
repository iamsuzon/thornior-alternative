<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Admin;
use App\Models\AllBlogs;
use App\Models\BlogAbout;
use App\Models\BloggerProduct;
use App\Models\BloggerReg;
use App\Models\Click;
use App\Models\Comments;
use App\Models\FAQs;
use App\Models\FollowBlogger;
use App\Models\HideUnhide;
use App\Models\ImagePostTemplateFive;
use App\Models\ImagePostTemplateFour;
use App\Models\ImagePostTemplateOne;
use App\Models\ImagePostTemplateSix;
use App\Models\ImagePostTemplateThree;
use App\Models\ImagePostTemplateTwo;
use App\Models\Like;
use App\Models\NotifyAdmin;
use App\Models\SavePost;
use App\Models\VideoPostTemplateFive;
use App\Models\VideoPostTemplateFour;
use App\Models\VideoPostTemplateOne;
use App\Models\VideoPostTemplateSix;
use App\Models\VideoPostTemplateThree;
use App\Models\VideoPostTemplateTwo;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

;

class AdminController extends Controller
{
    public function index()
    {
        $views = View::select('id', 'view_count', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $activity = NotifyAdmin::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('views', 'activity'));
    }

    public function profile()
    {
        $admins['all'] = Admin::all();
        $admins['self'] = Admin::find(Auth::guard('admin')->id());
        return view('admin.settings.index', compact('admins'));
    }

    public function editProfile(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'image|max:2048',
        ]);

        if ($id != Auth::guard('admin')->id()) {
            abort(404);
        }

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password != null) {
            $password = trim($request->password);
            $admin->password = Hash::make($password);
        }
        if ($request->image != null) {
            $name_image = time() . '.' . $request->image->extension();
            $name_path = 'upload/admin/avatar/' . time() . '.' . $request->image->extension();
            $img = Image::make($request->file('image'))->fit(300, 300)->save($name_path, 80, 'jpg');
            $admin->image = $name_image;
        }
        $admin->save();

        return back()->with('success', 'Your Profile is Updated Successfully');
    }

    public function blogs()
    {
        $bloggers = BloggerReg::orderBy('id','DESC')->get();
        $blogs = AllBlogs::all();
        $activity = NotifyAdmin::orderBy('created_at', 'desc')->get();

        return view('admin.blogs', compact('blogs', 'activity', 'bloggers'));
    }

    public function pauseBlog($slug)
    {
        abort_if(AllBlogs::where('blog_slug', $slug)->exists() == false, 404);

        $blog = AllBlogs::where('blog_slug', $slug)->first();
        if ($blog->blog_status == 'published') {
            $blog->blog_status = 'paused';
            $blog->save();

            return back()->with('success', 'The blog is paused');
        } else {
            $blog->blog_status = 'published';
            $blog->save();

            return back()->with('success', 'The blog is published');
        }
    }

    public function deleteBlog($slug)
    {
        abort_if(AllBlogs::where('blog_slug', $slug)->exists() == false, 404);

        $blog = AllBlogs::where('blog_slug', $slug)->first();
        $blogger = $blog->blogger;

        $faqs = FAQs::where('blog_id', $blog->id)->get();
        foreach ($faqs as $faq) {
            $faq->delete();
        }
        $follow = FollowBlogger::where('blogger_id', $blogger->id)->first();
        if ($follow != null) {
            $follow->delete();
        }

        $blog_about = BlogAbout:: where('blog_id', $blog->id)->first();
        if ($blog_about != null) {
            $blog_about->delete();
        }

        $blog->delete();

        $products = BloggerProduct::where('blogger_id', $blogger->id)->get();
        foreach ($products as $product) {
            unlink('upload/blogger_product/' . $product->image);
            $product->delete();
        }

        $image_1 = ImagePostTemplateOne::where('blogger_id', $blogger->id)->get();
        foreach ($image_1 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->article_image);
            unlink('upload/blogger_image_post/' . $image->image1);
            unlink('upload/blogger_image_post/' . $image->image2);
            unlink('upload/blogger_image_post/' . $image->image3);
            $image->delete();
        }
        $image_2 = ImagePostTemplateTwo::where('blogger_id', $blogger->id)->get();
        foreach ($image_2 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->article_image1);
            unlink('upload/blogger_image_post/' . $image->article_image2);
            unlink('upload/blogger_image_post/' . $image->article_image3);
            unlink('upload/blogger_image_post/' . $image->article_image4);
            unlink('upload/blogger_image_post/' . $image->article_image5);
            unlink('upload/blogger_image_post/' . $image->bottom_image);
            $image->delete();
        }
        $image_3 = ImagePostTemplateThree::where('blogger_id', $blogger->id)->get();
        foreach ($image_3 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->article_image1);
            unlink('upload/blogger_image_post/' . $image->article_image2);
            unlink('upload/blogger_image_post/' . $image->article_image3);
            unlink('upload/blogger_image_post/' . $image->article_image4);
            unlink('upload/blogger_image_post/' . $image->bottom_image1);
            unlink('upload/blogger_image_post/' . $image->bottom_image2);
            $image->delete();
        }
        $image_4 = ImagePostTemplateFour::where('blogger_id', $blogger->id)->get();
        foreach ($image_4 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->article_image1);
            unlink('upload/blogger_image_post/' . $image->article_image2);
            unlink('upload/blogger_image_post/' . $image->article_image3);
            unlink('upload/blogger_image_post/' . $image->article_image4);
            unlink('upload/blogger_image_post/' . $image->bottom_image1);
            unlink('upload/blogger_image_post/' . $image->bottom_image2);
            unlink('upload/blogger_image_post/' . $image->bottom_image3);
            $image->delete();
        }
        $image_5 = ImagePostTemplateFive::where('blogger_id', $blogger->id)->get();
        foreach ($image_5 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->article_image1);
            unlink('upload/blogger_image_post/' . $image->article_image2);
            unlink('upload/blogger_image_post/' . $image->article_image3);
            unlink('upload/blogger_image_post/' . $image->article_image4);
            unlink('upload/blogger_image_post/' . $image->article_image5);
            unlink('upload/blogger_image_post/' . $image->article_image6);
            $product->delete();
        }
        $image_6 = ImagePostTemplateSix::where('blogger_id', $blogger->id)->get();
        foreach ($image_6 as $image) {
            unlink('upload/blogger_image_post/' . $image->fimage);
            unlink('upload/blogger_image_post/' . $image->fimage2);
            unlink('upload/blogger_image_post/' . $image->fimage3);
            unlink('upload/blogger_image_post/' . $image->article_image1);
            unlink('upload/blogger_image_post/' . $image->article_image2);
            unlink('upload/blogger_image_post/' . $image->article_image3);
            unlink('upload/blogger_image_post/' . $image->article_image4);
            unlink('upload/blogger_image_post/' . $image->article_image5);
            unlink('upload/blogger_image_post/' . $image->article_image6);
            $image->delete();
        }

        $video_1 = VideoPostTemplateOne::where('blogger_id', $blogger->id)->get();
        foreach ($video_1 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->article_image != null) {
                unlink('upload/blogger_image_post/' . $video->article_image);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/'. $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }
        $video_2 = VideoPostTemplateTwo::where('blogger_id', $blogger->id)->get();
        foreach ($video_2 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->image4 != null) {
                unlink('upload/blogger_image_post/' . $video->image4);
            }
            if ($video->image5 != null) {
                unlink('upload/blogger_image_post/' . $video->image5);
            }
            if ($video->image6 != null) {
                unlink('upload/blogger_image_post/' . $video->image6);
            }
            if ($video->outro_image != null) {
                unlink('upload/blogger_image_post/' . $video->outro_image);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/' . $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }
        $video_3 = VideoPostTemplateThree::where('blogger_id', $blogger->id)->get();
        foreach ($video_3 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->image4 != null) {
                unlink('upload/blogger_image_post/' . $video->image4);
            }
            if ($video->image5 != null) {
                unlink('upload/blogger_image_post/' . $video->image5);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/' . $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }
        $video_4 = VideoPostTemplateFour::where('blogger_id', $blogger->id)->get();
        foreach ($video_4 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->image4 != null) {
                unlink('upload/blogger_image_post/' . $video->image4);
            }
            if ($video->image5 != null) {
                unlink('upload/blogger_image_post/' . $video->image5);
            }
            if ($video->background_image != null) {
                unlink('upload/blogger_image_post/' . $video->background_image);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/' . $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }
        $video_5 = VideoPostTemplateFive::where('blogger_id', $blogger->id)->get();
        foreach ($video_5 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->image4 != null) {
                unlink('upload/blogger_image_post/' . $video->image4);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/' . $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }
        $video_6 = VideoPostTemplateSix::where('blogger_id', $blogger->id)->get();
        foreach ($video_6 as $video) {
            if ($video->fimage != null) {
                unlink('upload/blogger_image_post/' . $video->fimage);
            }
            if ($video->image1 != null) {
                unlink('upload/blogger_image_post/' . $video->image1);
            }
            if ($video->image2 != null) {
                unlink('upload/blogger_image_post/' . $video->image2);
            }
            if ($video->image3 != null) {
                unlink('upload/blogger_image_post/' . $video->image3);
            }
            if ($video->image4 != null) {
                unlink('upload/blogger_image_post/' . $video->image4);
            }
            if ($video->image5 != null) {
                unlink('upload/blogger_image_post/' . $video->image5);
            }
            if ($video->image6 != null) {
                unlink('upload/blogger_image_post/' . $video->image6);
            }
            if ($video->video != null) {
                unlink('upload/blogger_video_post/' . $blogger->id. '/' .$video->video);
            }
            $video->delete();
        }

        $saved = SavePost::where('post_user_id', $blogger->id)->get();
        foreach ($saved as $save) {
            $save->delete();
        }

        $likes = Like::where('post_user_id', $blogger->id)->get();
        foreach ($likes as $like) {
            $like->delete();
        }

        $comments = Comments::where('post_user_id', $blogger->id)->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        $views = View::where('blogger_id', $blogger->id)->get();
        foreach ($views as $view) {
            $view->delete();
        }

        $clicks = Click::where('blogger_id', $blogger->id)->get();
        foreach ($clicks as $click) {
            $click->delete();
        }

        $notify = NotifyAdmin::where('blogger_id', $blogger->id)->get();
        foreach ($notify as $not) {
            $not->delete();
        }

        $hideUnhide = HideUnhide::where('blogger_id', $blogger->id)->get();
        foreach ($hideUnhide as $hide) {
            $hide->delete();
        }

        $blogger->delete();

        return back()->with('success', 'The blog is deleted permanently');
    }

    public function activity()
    {
        $activities = NotifyAdmin::orderBy('created_at','DESC')->get();
        $blogs = AllBlogs::all();

        $posts['image_one'] = ImagePostTemplateOne::orderBy('created_at', 'DESC')->get();
        $posts['image_two'] = ImagePostTemplateTwo::orderBy('created_at', 'DESC')->get();
        $posts['image_three'] = ImagePostTemplateThree::orderBy('created_at', 'DESC')->get();
        $posts['image_four'] = ImagePostTemplateFour::orderBy('created_at', 'DESC')->get();
        $posts['image_five'] = ImagePostTemplateFive::orderBy('created_at', 'DESC')->get();
        $posts['image_six'] = ImagePostTemplateSix::orderBy('created_at', 'DESC')->get();

        $posts['video_one'] = VideoPostTemplateOne::orderBy('created_at', 'DESC')->get();
        $posts['video_two'] = VideoPostTemplateTwo::orderBy('created_at', 'DESC')->get();
        $posts['video_three'] = VideoPostTemplateThree::orderBy('created_at', 'DESC')->get();
        $posts['video_four'] = VideoPostTemplateFour::orderBy('created_at', 'DESC')->get();
        $posts['video_five'] = VideoPostTemplateFive::orderBy('created_at', 'DESC')->get();
        $posts['video_six'] = VideoPostTemplateSix::orderBy('created_at', 'DESC')->get();

        $post_index = 0;
        $posts['posts'] = null;
        foreach ($posts['image_one'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['image_two'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['image_three'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['image_four'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['image_five'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['image_six'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        foreach ($posts['video_one'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_two'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_three'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_four'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_five'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video_six'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        $posts['all_posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('admin.activity',compact('activities','blogs','posts'));
    }

    public function adminPostDelete(Request $request)
    {
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

        abort_if($post == null,404);

        if (isset($post->fimage))
        {
            unlink('upload/blogger_image_post/'.$post->fimage);
        }
        if (isset($post->video) AND $post->video != null)
        {
            unlink('upload/blogger_video_post/'. $request->blogger_id.'/'.$post->video);
        }
        if (isset($post->product_background_image) AND $post->product_background_image != null)
        {
            unlink('upload/blogger_image_post/'.$post->product_background_image);
        }
        if (isset($post->product_background) AND $post->product_background != null)
        {
            unlink('upload/blogger_image_post/'.$post->product_background);
        }

        if (isset($post->article_image1) AND $post->article_image1 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image1);
        }
        if (isset($post->article_image2) AND $post->article_image2 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image2);
        }
        if (isset($post->article_image3) AND $post->article_image3 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image3);
        }
        if (isset($post->article_image4) AND $post->article_image4 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image4);
        }
        if (isset($post->article_image5) AND $post->article_image5 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image5);
        }
        if (isset($post->article_image6) AND $post->article_image6 != null)
        {
            unlink('upload/blogger_image_post/'.$post->article_image6);
        }

        if (isset($post->image1) AND $post->image1 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image1);
        }
        if (isset($post->image2) AND $post->image2 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image2);
        }
        if (isset($post->image3) AND $post->image3 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image3);
        }
        if (isset($post->image4) AND $post->image4 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image4);
        }
        if (isset($post->image5) AND $post->image5 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image5);
        }
        if (isset($post->image6) AND $post->image6 != null)
        {
            unlink('upload/blogger_image_post/'.$post->image6);
        }

        if (isset($post->bottom_image) AND $post->bottom_image != null)
        {
            unlink('upload/blogger_image_post/'.$post->bottom_image);
        }
        if (isset($post->outro_image) AND $post->outro_image != null)
        {
            unlink('upload/blogger_image_post/'.$post->outro_image);
        }

        if (isset($post->bottom_image1) AND $post->bottom_image1 != null)
        {
            unlink('upload/blogger_image_post/'.$post->bottom_image1);
        }
        if (isset($post->bottom_image2) AND $post->bottom_image2 != null)
        {
            unlink('upload/blogger_image_post/'.$post->bottom_image2);
        }
        if (isset($post->bottom_image3) AND $post->bottom_image3 != null)
        {
            unlink('upload/blogger_image_post/'.$post->bottom_image3);
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
