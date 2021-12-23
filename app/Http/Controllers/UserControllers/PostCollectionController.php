<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\AllCollections;
use App\Models\PostCollection;
use App\Models\SavePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCollectionController extends Controller
{
    public function index()
    {
        $collections = PostCollection::where('user_id', Auth::guard('web')->user()->id)->get();

        return view('user.collection', compact('collections'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $collection = new PostCollection();
        $collection->name = $request->name;
        $collection->user_id = $request->user()->id;
        $collection->user_type = 'web';
        $collection->save();

        return back()->with('success', 'The collection '.$collection->name.' has created');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $collection = PostCollection::where('user_id', $request->user()->id)
                                    ->where('id', $request->id)->first();
        $collection->name = $request->name;
        $collection->user_id = $request->user()->id;
        $collection->user_type = 'web';
        $collection->save();

        $collection_single = AllCollections::where('user_id', $collection->user_id)
                                            ->where('collection_id', $collection->id)
                                            ->get();
        foreach ($collection_single as $single)
        {
            $single->collection_slug = $collection->slug;
            $single->save();
        }

        return redirect()->route('user.collection.show',$collection->slug)->with('success', 'The collection '.$collection->name.' has renamed');
    }

    public function delete($slug)
    {
        abort_if(PostCollection::where('slug',$slug)->exists() == false, 404);

        $collection = PostCollection::where('slug',$slug)
                                ->where('user_id', Auth::guard('web')->user()->id)
                                ->first();
        $collection->delete();

        $collection_all = AllCollections::where('collection_slug',$slug)
                                    ->where('user_id', Auth::guard('web')->user()->id)
                                    ->get();
        foreach ($collection_all as $single)
        {
            $single->delete();
        }

        return redirect()->route('user.collection');
    }

    public function show($slug)
    {
        abort_if(PostCollection::where('slug',$slug)->exists() == false, 404);

        $collection['single'] = PostCollection::where('slug',$slug)
                                            ->where('user_id', Auth::guard('web')->user()->id)
                                            ->first();

        $collection_posts = AllCollections::where('user_id', Auth::guard('web')->user()->id)
                                ->where('collection_slug', $slug)
                                ->orderBy('created_at', 'desc')->get();

        foreach ($collection_posts as $key => $post)
        {
            $model = 'App\Models\\' . ucfirst($post->template_type);
            $posts['posts'][$key] = $model::where('id', $post->post_id)->orderBy('created_at', 'desc')->first();

            $posts['posts'][$key]->added_at = $post->created_at;
        }

        if (isset($posts['posts']))
        {
            $post_index = 0;
            foreach ($posts['posts'] as $post) {
                $posts['posts'][$post_index] = $post;
                $post_index++;
            }
        }

        if (isset($posts)) {
            $collection['collection'] = collect($posts['posts'])->sortBy('saved_at')->reverse();
        }
        else
        {
            $collection['collection'] = null;
        }

        return view('user.single_collection',compact('collection'));
    }
}
