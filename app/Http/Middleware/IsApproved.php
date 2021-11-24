<?php

namespace App\Http\Middleware;

use App\Models\Blogger;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($this->findUser() == null)
        {
            if (Auth::guard('web')->check() == true)
            {
                return redirect()->route('user.notapprove');
            }
            else{
                return redirect()->route('blogger.notapprove');
            }
        }
        return $next($request);
    }

    public function findUser()
    {
        if (Auth::guard('web')->check() == true)
        {
            $user = User::findOrFail(Auth::id());
            return $user->user_approved_at;
        }
        else{
            $blogger = Blogger::findOrFail(Auth::guard('blogger')->id());
            return $blogger->is_approved;
        }

    }
}
