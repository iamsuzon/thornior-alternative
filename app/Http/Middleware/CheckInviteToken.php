<?php

namespace App\Http\Middleware;

use App\Models\BloggerReg;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckInviteToken
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
        if ($request->route('token')!==null AND BloggerReg::where('token', $request->route('token'))->exists())
        {
            $token = $request->route('token');
            $newBlogger = BloggerReg::where('token', $token)->first();
            $timeNow = Carbon::now();
            $timeNow = $timeNow->diffForHumans();
            $timeToCompare = $newBlogger->created_at->addHour(1);
            $timeToCompare = $timeToCompare->diffForHumans();


            if ($timeNow > $timeToCompare)
            {
                return redirect()->route('index');
//                return 'The Link is Expired, Please Request New Link';
            }
            return $next($request);
        }
        abort(403);
    }
}
