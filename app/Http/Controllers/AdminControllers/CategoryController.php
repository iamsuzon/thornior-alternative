<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $i = 1;
    public function index()
    {
        $categories = Category::simplePaginate(10);
        return view('admin.category.index',compact('categories'));
    }

    public function store(Request $request)
    {
        $rule = $this->validate($request,[
            'category_name' => 'required|unique:categories,name'
        ]);
        $slug = str_replace(' ','-',trim(strtolower($request->category_name)));
        $final_slug = $this->slugTest($slug);

        $catgory = New Category();
        $catgory->name = strtolower($request->category_name);
        $catgory->slug = $final_slug;
        if (isset($request->status) AND $request->status == 0)
        {
            $catgory->status = 0;
        }
        $catgory->save();

        return back()->with('success','Category Created Successfully');
    }

    public function edit(Request $request, $id)
    {
        $rule = $this->validate($request,[
            'category_name' => 'required'
        ]);
        $categoryTest = Category::find($id);
        if ($categoryTest->name == $request->category_name AND $categoryTest->status == $request->status)
        {
            return back()->with('info','No Changes Done');
        }
        elseif ($categoryTest->name == $request->category_name AND $categoryTest->status != $request->status)
        {
            $categoryTest->status = $request->status;
            $categoryTest->save();
            return back()->with('success','Category Edited Successfully');
        }
        $categoryTestAll = Category::where('name',trim(strtolower($request->category_name)))->first();
        if ($categoryTestAll != null)
        {
            return back()->with('error','The category name has already been taken.');
        }

        $slug = str_replace(' ','-',trim(strtolower($request->category_name)));
        $final_slug = $this->slugTest($slug);

        $catgory = $categoryTest;
        $catgory->name = strtolower($request->category_name);
        $catgory->slug = $final_slug;
        $catgory->status = $request->status;
        $catgory->save();

        return back()->with('success','Category Edited Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if ($category == null)
        {
            return back()->with('error','No Category Found!');
        }
        $categoryName =  $category->name;

        $category->delete();
        return back()->with('success','Category '.'<strong class="text-capitalize">'.$categoryName.'</strong>'.' Deleted Successfully');
    }

    public function slugTest($slug)
    {
        $slugTest = Category::where('slug',$slug)->first();
        if ($slugTest != null)
        {
            $slug = $slug.'-'.$this->i++;
            $this->slugTest($slug);
        }
        else {
            return $slug;
        }
    }
}
