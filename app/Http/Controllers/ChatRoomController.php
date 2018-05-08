<?php

namespace App\Http\Controllers;

use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dump(Auth::user()->friends());
//        dump(Auth::user()->friendOf->merge(Auth::user()->friendsOfMine));
//        dump(Auth::user()->friendsOfMine()->where('friend_id', '>', 2)->get());
//        $friends = Auth::user()->friendOf->sortBy('id');

        $friends = Auth::user()->friends();

        return view('chat-room.index', compact('friends'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $friend = User::find($userId);
        return view('chat-room.show', compact('friend'));
    }

    public function history(Request $request, $chatRoomId)
    {
        return ChatRoom::where(function ($query) use ($chatRoomId) {
            $query->where('user_id', Auth::user()->id)
                ->where('friend_id', $chatRoomId);
        })->orWhere(function ($query) use ($chatRoomId) {
            $query->where('friend_id', Auth::user()->id)
                ->where('user_id', $chatRoomId);
        })->get();
    }

    public function sendChat(Request $request)
    {
        ChatRoom::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);
    }
}
