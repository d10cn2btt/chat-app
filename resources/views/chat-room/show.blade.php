@extends('layouts.app')

@section('content')
    <div class="container" id="chat-room-private">
        <meta name="friendId" content="{{ $friend->id }}">

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="panel-title">{{$friend->name}}</span>
                    <div class="pull-right">
                        <a href="{{route('chat-room.index')}}"><i class="fa fa-arrow-left"></i> Go Back</a>
                    </div>
                </div>
                <div class="panel-body">
                    <chat-room-list :chat123="chats" :user_id="{{ Auth::user()->id }}" :friend_id="{{ $friend->id }}"></chat-room-list>
                </div>
            </div>
        </div>
    </div>
@endsection
