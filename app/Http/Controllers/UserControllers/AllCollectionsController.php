<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use App\Models\AllCollections;
use App\Models\PostCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllCollectionsController extends Controller
{
    public function store(Request $request)
    {
        abort_if(PostCollection::where('id',$request->collection_id)->exists() == false, 404);
        $EXISTS = AllCollections::where('template_type',$request->template_type)
                                ->where('template_id',$request->template_id)
                                ->where('post_id',$request->post_id)
                                ->where('user_id',$request->user()->id)
                                ->exists();
        if ($EXISTS == true) {
            $collection = AllCollections::where('template_type',$request->template_type)
                                        ->where('template_id',$request->template_id)
                                        ->where('post_id',$request->post_id)
                                        ->where('user_id',$request->user()->id)
                                        ->first();
        }
        else{
            $collection = new AllCollections();
        }

        $collection->collection_id = $request->collection_id;

        $collection_name = PostCollection::where('id',$request->collection_id)->select('slug')->first();

        $collection->collection_slug = $collection_name->slug;
        $collection->user_id = $request->user()->id;
        $collection->template_type = $request->template_type;
        $collection->template_id = $request->template_id;
        $collection->post_id = $request->post_id;
        $collection->post_user_id = $request->post_user_id;
        $collection->save();

        return back()->with('success','The Post is Added in the collection');
    }
}
