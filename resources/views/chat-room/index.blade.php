@extends('layouts.app')

@section('content')
    <div class="container" id="list-friend">
        <div class="row">
            <div class="col">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">List of all friends</h3></div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @forelse($friends as $key => $friend)
                                <a onclick="loadIframe('{{route('chat-room.show', $friend->id)}}')">
                                    <li class="list-group-item">
                                        {{$friend->name}}
                                        <online-user :friend="{{$friend->id}}" :onlineusers="onlineUsers"></online-user>
                                    </li>
                                </a>
                            @empty
                                <li class="list-group-item">You don't have any friend</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div id="iframe-wrapper" class="hidden">
                <div class="friend-name"></div>
                <div id="load-iframe"></div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    function loadIframe(url) {
        $("#load-iframe").html(`<iframe class="iframe-chat-private" src="${url}"></iframe>`)
    }
</script>
@endpush
