<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\AllBlogs;
use App\Models\FollowBlogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowBloggerController extends Controller
{
    public function follow(Request $request)
    {
        abort_if(Auth::guard('web')->id() != $request->user_id, 404);
        abort_if(AllBlogs::where('id',$request->blog_id)->exists() == false, 404);

        $follow = new FollowBlogger();
        $follow->user_id = $request->user_id;
        $follow->blog_id = $request->blog_id;
        $follow->blogger_id = $follow->blog->blogger_id;
        $follow->save();

        return back();
    }

    public function unfollow(Request $request)
    {
        abort_if(Auth::guard('web')->id() != $request->user_id, 404);
        abort_if(AllBlogs::where('id',$request->blog_id)->exists() == false, 404);

        $follow = FollowBlogger::where('blog_id',$request->blog_id)
                                ->where('user_id',$request->user_id)
                                ->first();
        $follow->delete();

        return back();
    }
}
