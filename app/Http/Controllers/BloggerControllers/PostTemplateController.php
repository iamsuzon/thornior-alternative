<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;

class PostTemplateController extends Controller
{
    public function postTemplates()
    {
        return view('blogger.posts.post_template_list');
    }

    public function postTemplatesPreview($type,$id)
    {
        if ($type == null OR $id == null){return back();}
        return view('blogger.posts.post_template_preview',compact('type','id'));
    }
}
