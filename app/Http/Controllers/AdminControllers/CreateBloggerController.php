<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Mail\BloggerRegMail;
use App\Models\Blogger;
use App\Models\BloggerReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateBloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $bloggers = BloggerReg::orderBy('id','DESC')->get();
//        return view('admin.blogs',compact('bloggers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogger.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sent(Request $request)
    {
        $credentials = $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email',
        ]);

        if (BloggerReg::where('email',$request->email)->first() != null)
        {
            $bloggerReg = BloggerReg::where('email',$request->email)->first();
            $bloggerReg->token = Str::random(16);
            if ($bloggerReg->save())
            {
                Mail::to($bloggerReg->email)->send(new BloggerRegMail($bloggerReg));
                $blogger_email = $bloggerReg->email;
                return view('admin.blogger.link_sent',compact('blogger_email'));
            }
        }

        $bloggerReg = New BloggerReg();
        $bloggerReg->name = $credentials['name'];
        $bloggerReg->email = $credentials['email'];
        $bloggerReg->token = Str::random(16);

        if ($bloggerReg->save())
        {
            Mail::to($bloggerReg->email)->send(new BloggerRegMail($bloggerReg));
            $blogger_email = $bloggerReg->email;
            return view('admin.blogger.link_sent',compact('blogger_email'));
        }
    }

    public function sentagain($email)
    {
        $bloggerReg = BloggerReg::where('email',$email)->first();
        $bloggerReg->token = Str::random(16);
        if ($bloggerReg->save())
        {
            Mail::to($bloggerReg->email)->send(new BloggerRegMail($bloggerReg));
            $blogger_email = $bloggerReg->email;
            return view('admin.blogger.link_sent',compact('blogger_email'));
        }

    }

    public function compare($token)
    {
        return view('admin.blogger.auth.register',compact('token'));
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
           'name' => 'required|max:100',
           'email' => 'required|email',
           'password' => 'required|confirmed',
           'checkbox' => 'required'
        ]);

        $hasAccountCheck = BloggerReg::where('token',$request->token)
            ->where('account_status',1)
            ->exists();

        if ($hasAccountCheck == true)
        {
            return 'You Already Have an Account';
        }
        else{
            $noAccountCheck = BloggerReg::where('token',$request->token)
                ->where('account_status',0)
                ->first();
        }

        if (!empty($noAccountCheck) AND $request->checkbox=='on')
        {
            $newblogger = $noAccountCheck;
            $newblogger->name = $credentials['name'];
            $newblogger->email = trim($credentials['email']);
            $newblogger->password = Hash::make($credentials['password']);
            $newblogger->token = $request->token;
            $newblogger->account_status = 1;

            $newblogger->save();

            return redirect()->route('admin.blogger.account.approval',$newblogger->id);
        }
    }

    public function waitapproval($id)
    {
        if (BloggerReg::where('id',$id)->first() != null)
        {
            $newblogger = BloggerReg::where('id',$id)->first();

            $bloggerStore = new Blogger();
            $bloggerStore->bid = $newblogger->id;
            $bloggerStore->name = $newblogger->name;
            $bloggerStore->email = $newblogger->email;
            $bloggerStore->password = $newblogger->password;
            $bloggerStore->role_id = 5;
            $bloggerStore->save();

            return view('blogger.waitapproval', compact('newblogger'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function giveapproval($id)
    {
        if (BloggerReg::where('id',$id)->first() != null)
        {
            $bloggerStore = Blogger::where('bid',$id)->first();
            $bloggerStore->is_approved = 1;

            if ($bloggerStore->save())
            {
                $newblogger = BloggerReg::where('id',$id)->first();
                $newblogger->delete();
                return back()->with('success','The Blogger is Approved');
            }
        }
        return abort(403, 'Unauthorized action.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
