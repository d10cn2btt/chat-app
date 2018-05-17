<?php

namespace App\Events;

use App\Models\ChatRoom;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatRoomBroadCast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $chatRoom;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat-room.' . $this->chatRoom->user_id . '.' . $this->chatRoom->friend_id);
//        return new PrivateChannel('chat-room.1.2');
    }

//    public function broadcastWith()
//    {
////        return array_merge([
////            'chatRoom' => [
////                'user' => '12123123'
////            ]],
////            ['chatRoom' => $this->chatRoom]
////        );
//
//        $this->chatRoom = $this->chatRoom->setAttribute('abc', 123123);
//
//        dd($this->chatRoom);
//    }
}
