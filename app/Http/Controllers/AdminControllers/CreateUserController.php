<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    public function giveapproval($id)
    {
        $user = User::where('id', $id)->first();

        abort_if($user == null, 404);
        abort_if($user->user_approved_at != null, 403);

        $user->user_approved_at = Carbon::now();
        $user->save();

        return back()->with('success', 'The user account is approved');
    }
}
