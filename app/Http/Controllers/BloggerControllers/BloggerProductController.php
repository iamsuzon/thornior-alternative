<?php

namespace App\Http\Controllers\BloggerControllers;

use App\Http\Controllers\Controller;
use App\Models\BloggerProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BloggerProductController extends Controller
{
    public function index()
    {
        $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())->orderby('created_at', 'ASC')->get();

        return view('blogger.products.index', compact('products'));
    }

    public function GetAllProducts()
    {
        if (BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())->where('post_id',null)->get() != null)
        {
            $products = BloggerProduct::where('blogger_id',Auth::guard('blogger')->id())
                ->where('post_id',null)->get();
            return response()->json([
                'products'=>$products
            ]);
        }
    }

    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'details' => 'required|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:3072'
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $imageName = time() . '.' . $request->image->extension();

        $product = new BloggerProduct();
        $product->blogger_id = $request->id;
        $product->product_name = $request->name;
        $product->product_details = $request->details;
        $product->link = $request->link;
        $product->image = $imageName;

        if ($product->save()) {
            $request->image->move(public_path('upload/blogger_product'), $imageName);
        }

        return response()->json([
            'success' => 'Product Added successfully.'
        ]);
    }

    public function update(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'details' => 'required|min:25|max:255',
            'link' => 'required',
        );
        $error = Validator::make($request->all(), $rules);
        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $product = BloggerProduct::where('id', $request->product_id)->where('blogger_id', $request->id)->first();
        $product->product_name = $request->name;
        $product->product_details = $request->details;
        $product->link = $request->link;

        if (isset($request->image) and $request->image != null) {
            $imageName = time() . '.' . $request->image->extension();
            $product->image = $imageName;
            $request->image->move(public_path('upload/blogger_product'), $imageName);
        }

        $product->save();

        return back()->with('success', 'Product Updated successfully.');
    }

    public function draft($product_id)
    {
        $product = BloggerProduct::where('id',$product_id)->where('blogger_id',Auth::id())->first();
        if ($product == null)
        {
            return back();
        }
        $product->status = 'draft';
        $product->save();

        return back()->with('success', 'Product Drafted successfully.');
    }

    public function undraft($product_id)
    {
        $product = BloggerProduct::where('id',$product_id)->where('blogger_id',Auth::id())->first();
        if ($product == null)
        {
            return back();
        }
        $product->status = 'active';
        $product->save();

        return back()->with('success', 'Product Published successfully.');
    }

    public function delete($post_id)
    {
        $product = BloggerProduct::where('id',$post_id)->where('blogger_id',Auth::id())->first();
        if ($product != null)
        {
            $product->delete();
        }
        return back();
    }
}
