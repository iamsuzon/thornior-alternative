<?php

namespace App\Http\Middleware;

use App\Models\Blogger;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasBlogNoSetup
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
        if (Blogger::where('id',Auth::guard('blogger')->id())->where('has_blog',1)->first() == null)
        {
            return $next($request);
        }
        return redirect(route('blogger.dashboard'));
    }
}
