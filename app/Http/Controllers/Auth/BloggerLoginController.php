<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blogger;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloggerLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:blogger', ['except' => ['bloggerlogout']]);
    }

    public function showForm()
    {
        return view('blogger.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Blogger::where('email',$request->email)->exists())
        {
            $blogger = Blogger::where('email',$request->email)->first();
            if (isset($blogger->blog->blog_status)) {
                $blog = $blogger->blog->blog_status;
                if ($blog == 'paused') {
                    return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors([
                            'password' => 'Your account is paused by admin',
                        ]);
                }
            }
        }

        if (Auth::guard('blogger')->attempt($credentials, $request->filled('remember')))
        {
            return redirect()->intended(route('blogger.dashboard'));
        }
        else{
            return $this->sendFailedLoginResponse($request);
        }
    }

    protected function sendFailedLoginResponse($request)
    {

        if ( ! Blogger::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => 'Email address not found',
                ]);
        }

        if ( ! Blogger::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => 'Incorrect password',
                ]);
        }

    }

    public function bloggerlogout(Request $request)
    {
        Auth::guard('blogger')->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
