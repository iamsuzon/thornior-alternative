<?php

namespace App\Http\Controllers;

use App\Models\AllPost;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        $posts = AllPost::all();
        return view('home',compact('posts'));
    }

    public function show($id)
    {
        $post = AllPost::find($id);
        return view('post',compact('post'));
    }
}
