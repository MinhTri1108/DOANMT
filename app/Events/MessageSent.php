<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\ChatForum;
class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // public $user;
    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatForum $message)
    {
        //
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        // return new PresencerChannel('Messenger');
        return ['chat'];
    }
    public function broadcastAs()
    {
        return 'message';
    }
    // public function broadcastWith(){
    //     return [
    //         // 'user' => $this->user,
    //         'message' => $this->message,
    //     ];
    // }
}
