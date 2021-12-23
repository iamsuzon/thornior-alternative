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
    public $slug;
    public $image_id;
    public $video_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($blogger_id,$template_type,$slug,$post_id)
    {
        $this->blogger_id = $blogger_id;
        $this->template_type = $template_type;
        $this->slug = $slug;

        if ($template_type != null AND strtoupper($template_type) == 'IMAGE')
        {
            $this->image_id = $post_id;
            $this->video_id = null;
        }
        elseif($template_type != null AND strtoupper($template_type) == 'VIDEO')
        {
            $this->image_id = null;
            $this->video_id = $post_id;
        }
        else
        {
            $this->image_id = null;
            $this->video_id = null;
        }

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
