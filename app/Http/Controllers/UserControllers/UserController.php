<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\FollowBlogger;
use App\Models\Like;
use App\Models\PostCollection;
use App\Models\SavePost;
use App\Models\User;
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

        foreach ($user_data['following_blogs'] as $blog) {
            $blogger_id = $blog->blog->blogger_id;

            for ($i = 1; $i < 7; $i++) {
                switch ($i) {
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

                $model = 'App\Models\\' . 'ImagePostTemplate' . $template_id;
                $posts[] = $model::where('blogger_id', $blogger_id)->orderBy('created_at', 'desc')->get();
            }
            for ($i = 1; $i < 7; $i++) {
                switch ($i) {
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

                $model = 'App\Models\\' . 'VideoPostTemplate' . $template_id;
                $posts[] = $model::where('blogger_id', $blogger_id)->orderBy('created_at', 'desc')->get();
            }
        }

        $user_data['latest_posts'] = collect($posts)->sortBy('created_at');

        return view('user.dashboard', compact('user_data'));
    }

    public function settings()
    {
        $user = User::where('id', Auth::guard('web')->user()->id)->first();
        return view('user.settings', compact('user'));
    }

    public function settings_update(Request $request)
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

        foreach ($likes as $key => $like)
        {
            switch ($like->template_id) {
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

            $model = 'App\Models\\' . $like->template_type . 'PostTemplate' . $template_id;
            $posts[$key] = $model::where('id', $like->post_id)->orderBy('created_at', 'desc')->get();

            foreach ($posts[$key] as $like_time)
            {
                $like_time->liked_at = $like->created_at;
            }
        }

        if(isset($posts))
        {
            $posts['liked_posts'] = collect($posts)->sortBy('liked_at');
        }
        else{
            $posts = null;
        }

        return view('user.liked', compact('posts'));
    }

    public function saved()
    {
        $saves = SavePost::where('user_id', Auth::guard('web')->user()->id)
            ->where('user_type', 'web')
            ->orderBy('created_at', 'desc')->get();

        foreach ($saves as $key => $save)
        {
            switch ($save->template_id) {
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

            $model = 'App\Models\\' . $save->template_type . 'PostTemplate' . $template_id;
            $posts[$key] = $model::where('id', $save->post_id)->orderBy('created_at', 'desc')->get();

            foreach ($posts[$key] as $save_time)
            {
                $save_time->saved_at = $save->created_at;
            }
        }

        if (isset($posts)) {
            $posts['saved_posts'] = collect($posts)->sortBy('saved_at')->reverse();
        }
        else
        {
            $posts = null;
        }

        $collections = PostCollection::where('user_id', Auth::guard('web')->user()->id)->get();

        return view('user.saved', compact('posts','collections'));
    }
}
