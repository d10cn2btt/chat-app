<?php

namespace App\Models;

use App\Events\ChatRoomBroadCast;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $dispatchesEvents = [
//        'created' => ChatRoomBroadCast::class,
    ];

    protected $fillable = [
        'user_id',
        'friend_id',
        'chat',
    ];
}
