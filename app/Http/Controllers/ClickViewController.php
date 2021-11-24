<?php

namespace App\Http\Controllers;

use App\Models\Click;
use App\Models\View;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClickViewController extends Controller
{
    public function views(Request $request)
    {
        $views = new View();
        $views->blogger_id = $request->blogger_id;
        $views->template_type = $request->template_type;
        $views->template_id = $request->template_id;
        $views->post_id = $request->post_id;
        $views->ip_address = request()->getClientIp();

        if (View::where('ip_address', request()->getClientIp())
                ->where('template_type', $request->template_type)
                ->where('template_id', $request->template_id)
                ->where('post_id', $request->post_id)->first() != null)
        {
            $viewCount = View::where('ip_address', request()->getClientIp())
                ->where('template_type', $request->template_type)
                ->where('template_id', $request->template_id)
                ->where('post_id', $request->post_id)->count();
            $views->view_count = ++$viewCount;
        }
        else
        {
            $views->view_count = 1;
        }
        $views->save();

        $unique_clicks = Click::where('ip_address', request()->getClientIp())
                            ->where('template_type', $request->template_type)
                            ->where('template_id', $request->template_id)
                            ->where('post_id', $request->post_id)
                            ->orderBy('created_at','desc')
                            ->first();

        if ($unique_clicks == null)
        {
            $unique_clicks = new Click();
            $unique_clicks->blogger_id = $request->blogger_id;
            $unique_clicks->template_type = $request->template_type;
            $unique_clicks->template_id = $request->template_id;
            $unique_clicks->post_id = $request->post_id;
            $unique_clicks->ip_address = request()->getClientIp();
            $unique_clicks->click_count = 1;
            $unique_clicks->save();

            return response()->json(['success' => 'success']);
        }
        elseif($unique_clicks != null)
        {
            if ($unique_clicks->created_at->diffInHours(Carbon::now()) > 24)
            {
                $unique_clicks = new Click();
                $unique_clicks->blogger_id = $request->blogger_id;
                $unique_clicks->template_type = $request->template_type;
                $unique_clicks->template_id = $request->template_id;
                $unique_clicks->post_id = $request->post_id;
                $unique_clicks->ip_address = request()->getClientIp();

                $ClickCount = Click::where('ip_address', request()->getClientIp())
                    ->where('template_type', $request->template_type)
                    ->where('template_id', $request->template_id)
                    ->where('post_id', $request->post_id)->count();

                $unique_clicks->click_count = ++$ClickCount;
                $unique_clicks->save();

                return response()->json(['success' => 'success']);
            }
            else
            {
                return response()->json(['success' => 'Less than 24']);
            }
        }

        return response()->json(['success' => 'Success']);
    }
}
