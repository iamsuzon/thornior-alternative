<?php

namespace App\Http\Middleware;

use App\Models\Blogger;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ActivityByBlogger
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
        if (Auth::guard('blogger')->check()) {
            $expiresAt = Carbon::now()->addMinutes(3); // keep online for 3 min
            Cache::put('blogger-is-online-' . Auth::guard('blogger')->id(), true, $expiresAt);
            // last seen
            Blogger::where('id', Auth::guard('blogger')->id())->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }
        return $next($request);
    }
}
