<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;
use App\Models\AllBlogs;
use App\Models\Blogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCreationController extends Controller
{
    public function step1(Request $request)
    {
        if ($request->blog_name != null) {
            if (AllBlogs::where('blog_name',trim($request->blog_name))->exists() == true)
            {
                return back()->with('warning','The Blog Name is Already Taken');
            }
            setcookie("blog_name", $request->blog_name, time() + 30 * 24 * 60 * 60);
            return redirect(route('blogger.blog.create.step2'));
        }
        return view('blogger.blog_create_process.step1');
    }

    public function step2(Request $request)
    {
        if ($request->region != null) {
            setcookie("region", $request->region, time() + 30 * 24 * 60 * 60);
            return redirect(route('blogger.blog.create.step3'));
        }
        return view('blogger.blog_create_process.step2');
    }

    public function step3(Request $request)
    {
        if ($request->howpost != null) {
            setcookie("howpost", $request->howpost, time() + 30 * 24 * 60 * 60);
            return redirect(route('blogger.blog.create.step4'));
        }
        return view('blogger.blog_create_process.step3');
    }

    public function step4(Request $request)
    {
        if ($request->categories != null) {
            setcookie("categories", serialize($request->categories), time() + 30 * 24 * 60 * 60);
            return redirect(route('blogger.blog.create.final'));
        }
        return view('blogger.blog_create_process.step4');
    }

    public function final(Request $request)
    {
        if ($request->finish != null) {
            $create_blog = new AllBlogs();
            $create_blog->blogger_id = Auth::guard('blogger')->id();
            $create_blog->blog_name = $_COOKIE['blog_name'];
//            $create_blog->blog_slug = trim(strtolower(str_replace (' ', '-', $_COOKIE['blog_name'])));
            $create_blog->region = $_COOKIE['region'];
            $create_blog->avg_post = $_COOKIE['howpost'];
            $create_blog->categories = unserialize($_COOKIE['categories']);
            $create_blog->save();

            $bid = $create_blog->blogger_id;
            $blogger = Blogger::where('id', '=' ,$bid)->first();
            if ($blogger->has_blog != 0)
            {
                return redirect(route('blogger.dashboard'))->with('success','Your Blog already Completed');
            }
            $blogger->has_blog = 1;
            $blogger->save();

            setcookie("blog_name", "", time()-3600);
            setcookie("region", "", time()-3600);
            setcookie("howpost", "", time()-3600);
            setcookie("categories", "", time()-3600);

            return redirect(route('blogger.dashboard'))->with('success','Your Blog is Completed');
        }
        return view('blogger.blog_create_process.final');
    }
}
