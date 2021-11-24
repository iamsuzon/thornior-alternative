<?php

namespace App\Listeners;

use App\Events\UserActivity;
use App\Models\NotifyAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminUserActivity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserActivity $event)
    {
        $notify = new NotifyAdmin();
        $notify->blogger_id = $event->blogger_id;
        $notify->template_type = $event->template_type;
        $notify->template_id = $event->template_id;
        $notify->post_id = $event->post_id;
        $notify->save();
    }
}
