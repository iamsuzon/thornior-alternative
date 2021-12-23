<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeCommentsController extends Controller
{
    public function like(Request $request, $template_type,$template_id)
    {
        $TEMPLATE_TYPE = ['image','video'];

        abort_if(!in_array($template_type,$TEMPLATE_TYPE), 403);

        $user = $this->getUser($request);

        $liked = Like::where('template_type',$template_type)
            ->where('template_id',$template_id)
            ->where('post_id',$request->post_id)
            ->where('user_type',$user['user_guard'])
            ->where('user_id',$user->id)
            ->first();

        if ($liked != null)
        {
            $liked->delete();
            return back();
        }

        $like  = New Like();
        $like->template_type = $template_type;
        $like->template_id = $template_id;
        $like->post_id = $request->post_id;
        $like->user_type = $user['user_guard'];
        $like->user_id = $user->id;
        $like->post_user_id = $request->post_user_id;
        $like->save();

        return back();
    }

    public function store(Request $request, $template_type,$template_id)
    {
        $TEMPLATE_TYPE = ['image','video'];

        abort_if(!in_array($template_type,$TEMPLATE_TYPE), 404);

        if ($request->comment == null)
        {
            return back();
        }

        $user = $this->getUser($request);

        $comment = New Comments();
        $comment->template_type = $template_type;
        $comment->template_id = $template_id;

        if (strtolower($template_type) == 'image')
        {
            $comment->image_id = $request->post_id;
        }
        else
        {
            $comment->video_id = $request->post_id;
        }

        $comment->user_type = $user['user_guard'];
        $comment->user_id = $user->id;
        $comment->post_owner_id = $request->post_user_id;

        $comment->comment = trim($request->comment);
        $comment->save();

        return back();
    }

    public function getUser($request)
    {
        if ($request->user('blogger'))
        {
            $user = $request->user('blogger');
            $user['user_guard'] = 'blogger';
            return $user;
        }
        else if ($request->user('web'))
        {
            $user = $request->user('web');
            $user['user_guard'] = 'web';
            return $user;
        }
    }
}
