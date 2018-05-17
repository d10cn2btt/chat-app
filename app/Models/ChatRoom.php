<?php

namespace App\Models;

use App\Events\ChatRoomBroadCast;
use Carbon\Carbon;
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
        'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::now()->diffForHumans($value);
    }
}
