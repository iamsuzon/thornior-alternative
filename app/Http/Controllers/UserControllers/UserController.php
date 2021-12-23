<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\FollowBlogger;
use App\Models\Like;
use App\Models\PostCollection;
use App\Models\SavePost;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_data['following_blogs'] = FollowBlogger::where('user_id', Auth::guard('web')->id())->get();

        if (count($user_data['following_blogs']) > 0) {
            foreach ($user_data['following_blogs'] as $blog) {
                $blogger_id = $blog->blog->blogger_id;

                $posts['image'] = \App\Models\Image::where('blogger_id', $blogger_id)->orderBy('created_at', 'desc')->get();
                $posts['video'] = Video::where('blogger_id', $blogger_id)->orderBy('created_at', 'desc')->get();
            }

            $post_index = 0;
            foreach ($posts['image'] as $post) {
                $posts['posts'][$post_index] = $post;
                $post_index++;
            }
            foreach ($posts['video'] as $post) {
                $posts['posts'][$post_index] = $post;
                $post_index++;
            }

            if (isset($posts['posts']) AND !empty($posts['posts']))
            {
                $user_data['latest_posts'] = collect($posts['posts'])->sortBy('created_at')->reverse();
            }
        } else {
            $posts = null;
            $user_data = null;
        }

        return view('user.dashboard', compact('user_data', 'posts'));
    }

    public
    function settings()
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->first();
        return view('user.settings', compact('user'));
    }

    public
    function settings_update(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();
        if ($request->has('image') and $request->image != null) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

            if ($user->image != null) {
                $image_path = 'upload/user/avatar/' . $user->image;
                unlink($image_path);
            }

            $image = time() . 'pp.' . $request->image->extension();
            $image_path = 'upload/user/avatar/' . $image;
            $user->image = $image;
            Image::make($request->file('image'))->save($image_path, 80, 'jpg');
            $user->save();

            return back()->with('success', 'Your profile picture updated');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->about = $request->about;
        $user->save();

        return back()->with('success', 'Your profile updated');
    }

    public function liked()
    {
        $likes = Like::where('user_id', Auth::guard('web')->user()->id)
            ->where('user_type', 'web')
            ->orderBy('created_at', 'desc')->get();

        foreach ($likes as $key => $like) {

            $model = 'App\Models\\' . ucfirst($like->template_type);
            $posts['posts'][$key] = $model::where('id', $like->post_id)->orderBy('created_at', 'desc')->first();

            $posts['posts'][$key]->liked_at = $like->created_at;
        }

        if (isset($posts)) {
            $posts['liked_posts'] = collect($posts['posts'])->sortBy('liked_at');
        } else {
            $posts = null;
        }

        return view('user.liked', compact('posts'));
    }

    public function saved()
    {
        $saves = SavePost::where('user_id', Auth::guard('web')->user()->id)
            ->where('user_type', 'web')
            ->orderBy('created_at', 'desc')->get();

        foreach ($saves as $key => $save) {
            $model = 'App\Models\\' . ucfirst($save->template_type);
            $posts['posts'][$key] = $model::where('id', $save->post_id)->orderBy('created_at', 'desc')->first();

            $posts['posts'][$key]->saved_at = $save->created_at;
        }

        if (isset($posts)) {
            $post_index = 0;
            foreach ($posts['posts'] as $post) {
                $posts['post'][$post_index] = $post;
                $post_index++;
            }
        }

        if (isset($posts)) {
            $posts['saved_posts'] = collect($posts['post'])->sortBy('saved_at')->reverse();
        } else {
            $posts = null;
        }

        $collections = PostCollection::where('user_id', Auth::guard('web')->user()->id)->get();

        return view('user.saved', compact('posts', 'collections'));
    }

    public function watch()
    {
        $saves = SavePost::where('user_id', Auth::guard('web')->user()->id)
            ->where('user_type', 'web')
            ->orderBy('created_at', 'desc')->get();

        foreach ($saves as $key => $save) {
            $model = 'App\Models\\' . ucfirst($save->template_type);
            $posts['posts'][$key] = $model::where('id', $save->post_id)->orderBy('created_at', 'desc')->first();

            $posts['posts'][$key]->saved_at = $save->created_at;
        }

        $post_index = 0;
        foreach ($posts['posts'] as $post) {
            $posts['post'][$post_index] = $post;
            $post_index++;
        }

        if (isset($posts)) {
            $posts['saved_posts'] = collect($posts['post'])->sortBy('saved_at')->reverse();
        } else {
            $posts = null;
        }

        $collections = PostCollection::where('user_id', Auth::guard('web')->user()->id)->get();

        return view('user.watch', compact('posts', 'collections'));
    }
}
