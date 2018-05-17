<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

//Broadcast::channel('App.User.{id}', function ($user, $id) {
//    return (int) $user->id === (int) $id;
//});

Broadcast::channel('chat-channel', function ($user) {
    return Auth::check();
});

Broadcast::channel('chat-room.{user_id}.{friend_id}', function ($user, $userId, $friendId) {
    return true;
    return $user->id == $friendId;
});

Broadcast::channel('online', function ($user) {
    return $user;
});
