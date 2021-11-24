<?php

namespace App\Http\Controllers;

use App\Models\BlogAbout;
use App\Models\FAQs;
use App\Models\HideUnhide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class HideUnhideController extends Controller
{
    public function hide_post(Request $request)
    {
        $info = $this->validate($request, [
            'post_section' => 'required',
            'blogger_id' => 'required'
        ]);

        abort_if(Auth::id() != $request->blogger_id, 403);
        if ($request->has('post_section')) {
            abort_if($request->post_section != '1' and $request->post_section != '0', 403);
        }


        if (HideUnhide::where('blogger_id', $request->blogger_id)->exists() == true and HideUnhide::where('section_name', 'post_section')->exists() == true) {
            $option = HideUnhide::where('blogger_id', $request->blogger_id)
                ->where('section_name', 'post_section')
                ->first();
        } else {
            $option = new HideUnhide();
        }
        $option->blogger_id = $request->blogger_id;
        $option->blog_id = Auth::guard('blogger')->user()->blog->id;

        $option->is_section = $request->post_section;
        $option->section_name = 'post_section';
        $option->status = $request->status;

        $option->save();

        if ($request->status == 'deactive') {
            return back()->with('success', 'Post Section is Hide Successfully');
        }
        return back()->with('success', 'Post Section is Published Successfully');
    }

    public function hide_video(Request $request)
    {
        $info = $this->validate($request, [
            'video_section' => 'required',
            'blogger_id' => 'required'
        ]);

        abort_if(Auth::id() != $request->blogger_id, 403);
        if ($request->has('video_section')) {
            abort_if($request->video_section != '1' and $request->video_section != '0', 403);
        }


        if (HideUnhide::where('blogger_id', $request->blogger_id)->exists() == true and HideUnhide::where('section_name', 'video_section')->exists() == true) {
            $option = HideUnhide::where('blogger_id', $request->blogger_id)
                ->where('section_name', 'video_section')
                ->first();
        } else {
            $option = new HideUnhide();
        }
        $option->blogger_id = $request->blogger_id;
        $option->blog_id = Auth::guard('blogger')->user()->blog->id;

        $option->is_section = $request->video_section;
        $option->section_name = 'video_section';
        $option->status = $request->status;

        $option->save();

        if ($request->status == 'deactive') {
            return back()->with('success', 'Video Section is Hide Successfully');
        }
        return back()->with('success', 'Video Section is Published Successfully');
    }

    public function hide_link(Request $request)
    {
        $info = $this->validate($request, [
            'link_section' => 'required',
            'blogger_id' => 'required'
        ]);

        abort_if(Auth::id() != $request->blogger_id, 403);
        if ($request->has('link_section')) {
            abort_if($request->link_section != '1' and $request->link_section != '0', 403);
        }


        if (HideUnhide::where('blogger_id', $request->blogger_id)->exists() == true and HideUnhide::where('section_name', 'link_section')->exists() == true) {
            $option = HideUnhide::where('blogger_id', $request->blogger_id)
                ->where('section_name', 'link_section')
                ->first();
        } else {
            $option = new HideUnhide();
        }
        $option->blogger_id = $request->blogger_id;
        $option->blog_id = Auth::guard('blogger')->user()->blog->id;

        $option->is_section = $request->link_section;
        $option->section_name = 'link_section';
        $option->status = $request->status;

        $option->save();

        if ($request->status == 'deactive') {
            return back()->with('success', 'Link Section is Hide Successfully');
        }
        return back()->with('success', 'Link Section is Published Successfully');
    }

    public function hide_about(Request $request)
    {
        $info = $this->validate($request, [
            'about_section' => 'required',
            'blogger_id' => 'required'
        ]);

        abort_if(Auth::id() != $request->blogger_id, 403);
        if ($request->has('link_section')) {
            abort_if($request->about_section != '1' and $request->about_section != '0', 403);
        }


        if (HideUnhide::where('blogger_id', $request->blogger_id)->exists() == true and HideUnhide::where('section_name', 'about_section')->exists() == true) {
            $option = HideUnhide::where('blogger_id', $request->blogger_id)
                ->where('section_name', 'about_section')
                ->first();
        } else {
            $option = new HideUnhide();
        }
        $option->blogger_id = $request->blogger_id;
        $option->blog_id = Auth::guard('blogger')->user()->blog->id;

        $option->is_section = $request->about_section;
        $option->section_name = 'about_section';
        $option->status = $request->status;

        $option->save();

        if ($request->status == 'deactive') {
            return back()->with('success', 'About Me Section is Hide Successfully');
        }
        return back()->with('success', 'About Me Section is Published Successfully');
    }

    public function layout_about(Request $request)
    {
        abort_if(Auth::user()->blog->id != $request->blog_id, 403);

        if (BlogAbout::where('blog_id', $request->blog_id)->exists() == false) {
            $info = $this->validate($request, [
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,svg|max:3072'
            ]);

            $about = new BlogAbout();

        } else {
            $about = BlogAbout::where('blog_id', $request->blog_id)->first();
        }
        $about->blog_id = $request->blog_id;
        $about->title = $request->title;
        $about->description = $request->description;
        if ($request->has('layout')) {
            $about->layout = $request->layout;
        }

        if ($request->has('image')) {
            $info = $this->validate($request, [
                'image' => 'required|mimes:jpeg,png,jpg,svg|max:3072',
            ]);

            $image = time() . 'bai.' . $request->image->extension();
            $image_path = 'upload/blogger/blog/' . $image;
            $about->image = $image;
            Image::make($request->file('image'))->save($image_path, 80, 'jpg');
        }

        if ($about->save()) {
            return back()->with('success', 'Your About Page Updated Successfully');
        }
    }

    public function about_question(Request $request)
    {
        $info = $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);

        abort_if(Auth::guard('blogger')->user()->blog->id != $request->blog_id, 404);

        $faq = new FAQs();
        $faq->blog_id = $request->blog_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return back()->with('success','FAQ Added Successfully');
    }

    public function about_question_edit(Request $request)
    {
        $info = $this->validate($request, [
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq = FAQs::where('id',$request->id)->first();
        $faq->blog_id = $request->blog_id;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        return back()->with('success','FAQ Updated Successfully');
    }

    public function about_question_delete(Request $request)
    {
        abort_if(FAQs::where('id',$request->id)->exists() == false, 403);

        $faq = FAQs::where('id',$request->id)->first();
        $faq->delete();

        return back()->with('success','FAQ Deleted Successfully');
    }
}
