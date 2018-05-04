<?php

namespace App\Events;

use App\Models\Message;
use App\Models\MoreText;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Log;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $message;
    public $more;

    /**
     * MessageSent constructor.
     * @param User $user
     * @param Message $message
     */
    public function __construct(User $user, Message $message, MoreText $more)
    {
        Log::info(($message));

        $this->user = $user;
        $this->message = $message;
        $this->more = (['123' => 'xxx']);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-channel');
    }

    /**
     * Determine if this event should broadcast.
     *
     * @return bool
     */
    public function broadcastWhen()
    {
//        Log::info($this->more);
//        Log::info($this->message);
        return true;
    }

//    /**
//     * Get the data to broadcast.
//     *
//     * @return array
//     */
//    public function broadcastWith()
//    {
//        return ['id' => $this->data];
//    }
}
