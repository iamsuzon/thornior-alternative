<?php

namespace App\Http\Controllers;

use App\Models\AllCollections;
use App\Models\SavePost;
use Illuminate\Http\Request;

class SavePostController extends Controller
{
    public function save(Request $request, $template_type, $template_id)
    {
        $TEMPLATE_TYPE = ['image', 'video'];
        $TEMPLATE_TOTAL_EACH = 6;

        if (!in_array($template_type, $TEMPLATE_TYPE) or $template_id > $TEMPLATE_TOTAL_EACH or $template_id < 1) {
            abort(404);
        }

        $save = SavePost::where('template_type', $template_type)
            ->where('template_id', $template_id)
            ->where('post_id', $request->post_id)
            ->where('user_type', 'web')
            ->where('user_id', $request->user()->id)
            ->first();

        if ($save != null) {
            $colection = AllCollections::where('template_type', $template_type)
                ->where('template_id', $template_id)
                ->where('post_id', $request->post_id)
                ->where('user_id', $request->user()->id)
                ->first();

            if ($colection != null) {
                $colection->delete();
            }

            $save->delete();
            return back();
        }

        $save = new SavePost();
        $save->template_type = $template_type;
        $save->template_id = $template_id;
        $save->post_id = $request->post_id;
        $save->user_type = 'web';
        $save->user_id = $request->user()->id;
        $save->post_user_id = $request->post_user_id;
        $save->save();

        return back();
    }
}
