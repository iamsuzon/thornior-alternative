<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActivity
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $blogger_id;
    public $template_type;
    public $template_id;
    public $post_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($blogger_id,$template_type,$template_id,$post_id)
    {
        $this->blogger_id = $blogger_id;
        $this->template_type = $template_type;
        $this->template_id = $template_id;
        $this->post_id = $post_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
