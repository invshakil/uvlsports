<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewArticleSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $adminEmails;
    public $articleData;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($adminEmails, $articleData)
    {
        $this->adminEmails = $adminEmails;
        $this->articleData = $articleData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}
