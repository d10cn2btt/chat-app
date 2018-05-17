@extends('layouts.app')

@section('content')
    <div class="container" id="list-friend">
        <meta name="url_private" content="{{route('chat-room.show', '')}}">
        {{--<div class="row">--}}
            {{--<div class="col">--}}
                {{--<div class="panel panel-primary">--}}
                    {{--<div class="panel-heading"><h3 class="panel-title">List of all friends</h3></div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<ul class="list-group">--}}
                            {{--@forelse($friends as $key => $friend)--}}
                                {{--<a onclick="loadIframe('{{route('chat-room.show', $friend->id)}}', {{$friend->id}})">--}}
                                    {{--<li class="list-group-item">--}}
                                        {{--<img class="avt-friend" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="">--}}
                                        {{--{{$friend->name}}--}}
                                        {{--<online-user :friend="{{$friend->id}}" :onlineusers="onlineUsers"></online-user>--}}
                                    {{--</li>--}}
                                {{--</a>--}}
                            {{--@empty--}}
                                {{--<li class="list-group-item">You don't have any friend</li>--}}
                            {{--@endforelse--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div id="iframe-wrapper1" class="col">--}}
                {{--<div id="load-iframe"></div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <list-friend :list_friend="{{$friends}}" :onlineusers="onlineusers"></list-friend>
    </div>
@endsection

@push('js')
<script>
    var currentChatWith = '';
    function loadIframe(url, friendId) {
        if (currentChatWith == friendId) {
            return false;
        }

        $("#load-iframe").html(`<iframe class="iframe-chat-private" src="${url}"></iframe>`)
        currentChatWith = friendId;
    }
</script>
@endpush
