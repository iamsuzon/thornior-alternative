<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Admin;
use App\Models\AllBlogs;
use App\Models\AllCollections;
use App\Models\BlogAbout;
use App\Models\Blogger;
use App\Models\BloggerProduct;
use App\Models\BloggerReg;
use App\Models\BlogView;
use App\Models\Click;
use App\Models\Comments;
use App\Models\FAQs;
use App\Models\FollowBlogger;
use App\Models\HideUnhide;
use App\Models\Like;
use App\Models\NotifyAdmin;
use App\Models\PostCollection;
use App\Models\SavePost;
use App\Models\User;
use App\Models\Video;;
use App\Models\View;
use App\Models\WebsiteView;
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
    public function index(Request $request)
    {
        $bloggers = Blogger::where('last_seen', '!=', null)->orderBy('last_seen', 'DESC')->get();
        if ($request->has('week')) {
            $dateNow = Carbon::now()->subDays(7);

            $views = View::select('id', 'view_count', 'created_at')
                ->where('created_at', '>=', $dateNow)
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('l'); // grouping by week
                });

            $format = 'week';
        } else {
            $views = View::select('id', 'view_count', 'created_at')
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy(function ($date) {
                    return Carbon::parse($date->created_at)->format('m'); // grouping by months
                });

            $format = 'month';
        }

        $activity = NotifyAdmin::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('views', 'activity', 'format', 'bloggers'));
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
        $bloggers = BloggerReg::orderBy('id', 'DESC')->get();
        $blogs = AllBlogs::all();
        $users = User::all();
        $activity = NotifyAdmin::orderBy('created_at', 'desc')->get();

        $pending_users = $users->where('user_approved_at', null)
            ->where('email_verified_at', '!=', null);

        $accounts = null;
        $i=0;
        foreach ($blogs as $blog)
        {
            $accounts[$i] = $blog;
            $i++;
        }
        foreach ($users as $user)
        {
            $accounts[$i] = $user;
            $i++;
        }

        $accounts['all'] = collect($accounts)->sortBy('created_at')->reverse();

        return view('admin.blogs', compact('accounts', 'activity', 'bloggers', 'users', 'pending_users'));
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

    public function deleteUser($id)
    {
        $user = User::where('id',$id)->first();
        abort_if($user == null, 404);

        if ($user->image != 'user.jpg')
        {
            unlink('upload/user/avatar' . $user->image);
        }

        $saved = SavePost::where('user_id', $user->id)->get();

        if ($saved != null)
        {
            foreach ($saved as $save)
            {
                $save->delete();
            }
        }

        $likes = Like::where('user_id', $user->id)->get();

        if ($likes != null)
        {
            foreach ($likes as $like)
            {
                $like->delete();
            }
        }

        $comments = Comments::where('user_id', $user->id)->get();

        if ($comments != null)
        {
            foreach ($comments as $comment)
            {
                $comment->delete();
            }
        }

        $collections = PostCollection::where('user_id', $user->id)->get();

        if ($collections != null)
        {
            foreach ($collections as $collection)
            {
                $collection->delete();
            }
        }

        $collectionNames = AllCollections::where('user_id', $user->id)->get();

        if ($collectionNames != null)
        {
            foreach ($collectionNames as $collectionName)
            {
                $collectionName->delete();
            }
        }

        $follows = FollowBlogger::where('user_id', $user->id)->get();

        if ($follows != null)
        {
            foreach ($follows as $follow)
            {
                $follow->delete();
            }
        }

        $user->delete();

        return back()->with('success', 'The visitor account is deleted permanently');
    }

    public function deleteBlog($slug)
    {
        abort_if(AllBlogs::where('blog_slug', $slug)->exists() == false, 404);

        $blog = AllBlogs::where('blog_slug', $slug)->first();
        $blogger = $blog->blogger;

        // FAQ will auto delete

        $follows = FollowBlogger::where('blogger_id', $blogger->id)->get();

        if ($follows != null)
        {
            foreach ($follows as $follow)
            {
                $follow->delete();
            }
        }

        $blog_about = BlogAbout:: where('blog_id', $blog->id)->first();

        if ($blog_about != null) {
            if ($blog_about->image)
            {
                unlink('upload/blogger/blog/'. $blog_about->image);
            }
            $blog_about->delete();
        }

        if ($blog->image != NULL)
        {
            unlink('upload/blogger/blog/'. $blog->image);
        }

        $blog->delete();

        // Product will auto delete

        $image_posts = \App\Models\Image::where('blogger_id', $blogger->id)->get();
        foreach ($image_posts as $post) {
            $post->categories()->detach();
            $post->delete();
        }

        $video_posts = Video::where('blogger_id', $blogger->id)->get();
        foreach ($video_posts as $post) {
            unlink('upload/blogger_video_post/' . $blogger->id . '/' . $post->video);
            $post->categories()->detach();
            $post->delete();
        }

        $saved = SavePost::where('post_user_id', $blogger->id)->get();

        if ($saved != null)
        {
            foreach ($saved as $save)
            {
                $save->delete();
            }
        }

        $likes = Like::where('post_user_id', $blogger->id)->get();

        if ($likes != null)
        {
            foreach ($likes as $like)
            {
                $like->delete();
            }
        }

        // Comments will auto delete

        $views = View::where('blogger_id', $blogger->id)->get();

        if ($views != null)
        {
            foreach ($views as $view)
            {
                $view->delete();
            }
        }

        $clicks = Click::where('blogger_id', $blogger->id)->get();

        if ($clicks != null)
        {
            foreach ($clicks as $click)
            {
                $click->delete();
            }
        }

        // Notify Admin table data will auto delete

        // Hide Unhide data will auto delete

        if ($blogger->image != 'user.jpg')
        {
            unlink('upload/blogger/avatar/' . $blogger->image);
        }

        $blogger->delete();

        return back()->with('success', 'The blog is deleted permanently');
    }

    public function activity()
    {
        $activities = NotifyAdmin::orderBy('created_at', 'DESC')->get();
        $blogs = AllBlogs::all();

        $posts['image'] = \App\Models\Image::orderBy('created_at', 'DESC')->limit(5)->get();
        $posts['video'] = Video::orderBy('created_at', 'DESC')->limit(5)->get();

        $post_index = 0;
        $posts['posts'] = null;
        foreach ($posts['image'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }
        foreach ($posts['video'] as $post) {
            $posts['posts'][$post_index] = $post;
            $post_index++;
        }

        $posts['all_posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();

        return view('admin.activity', compact('activities', 'blogs', 'posts'));
    }

    public function analytics()
    {
        $views['website'] = WebsiteView::all()->count();
        $views['blog'] = BlogView::all()->count();
        $views['post'] = View::all()->count();

        $images = View::select('post_id')
                        ->groupBy('post_id')
                        ->orderByRaw('COUNT(post_id) DESC')
                        ->get();



        $count = View::where('post_id', $images[1]->post_id)->count();

        dd($count);

        $count = [];
        $index = 0;
        foreach ($images as $image)
        {
            $count[$index++] = View::where('post_id', $image->post_id)
                                    ->count();
        }


        dd($count);

        return view('admin.analytics', compact('views'));
    }

    public function adminPostDelete(Request $request)
    {
        $model = 'App\Models\\' . ucfirst($request->template_type);
        $post = $model::where('slug', $request->slug)->first();

        abort_if($post == null, 404);

        foreach ($post->medias as $media) {
            unlink($media->address); // Image
        }

        if ($post->address)
        {
            unlink($post->address); // Video
        }

        $products = BloggerProduct::where('blogger_id', $request->blogger_id)->get();
        foreach ($products as $product) {
            unlink('upload/blogger_product/' . $product->image);
            $product->delete();
        }

        $saved = SavePost::where('template_type', $request->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($saved != null)
        {
            foreach ($saved as $save)
            {
                $save->delete();
            }
        }

        $likes = Like::where('template_type', $request->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($likes != null)
        {
            foreach ($likes as $like)
            {
                $like->delete();
            }
        }

        // Comments will auto delete

        $views = View::where('template_type', $request->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($views != null)
        {
            foreach ($views as $view)
            {
                $view->delete();
            }
        }

        $clicks = Click::where('template_type', $request->template_type)
            ->where('post_id', $post->id)
            ->get();

        if ($clicks != null)
        {
            foreach ($clicks as $click)
            {
                $click->delete();
            }
        }

        // Notify Admin Table Data will auto delete

        $post->categories()->detach();

        $post->delete();

        return back()->with('success', 'The post is deleted');
    }
}
