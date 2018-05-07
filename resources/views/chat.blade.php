@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Chats <i class="fa fa-home"></i></div>

                    <div class="panel-body">
                        <chat-messages :messages111="messageList"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form v-on:message-event="addMessage" :user="{{ Auth::user() }}"></chat-form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{--@{{ (messageList) }}--}}
            </div>
        </div>
    </div>
@endsection
