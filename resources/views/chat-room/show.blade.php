<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="userId" content="{{ Auth::check() ? Auth::user()->id : 'null' }}">
    <meta name="user_avatar" content="{{ Auth::check() ? Auth::user()->avatar : 'null' }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html {
            background: white;
        }
    </style>

    {{--<script src="https://pushjs.org/scripts/push.min.js"></script>--}}

</head>
<body>
<div id="app">
    <div class="row1" id="1chat-room-private">
        <meta name="friendId" content="{{ $friend->id }}">
        <div class="col-md-12" style="padding: 0" id="box-private">
            <div class="panel panel-primary">
                <div class="panel-heading friend-name">
                    <span class="panel-title">{{$friend->name}}</span>
                    {{--<div class="pull-right">--}}
                        {{--<a href="{{route('chat-room.index')}}"><i class="fa fa-arrow-left"></i> Go Back</a>--}}
                    {{--</div>--}}
                </div>
                <div class="panel-body">
                    <chat-room-list :onlineusers="onlineusers" :chat123="chats" :user_id="{{ Auth::user()->id }}" :friend_id="{{ $friend->id }}"></chat-room-list>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function demo() {
        Push.create('Hello world!', {
            body: "CLGT",
            icon: 'https://deerawan.gallerycdn.vsassets.io/extensions/deerawan/vscode-material2-snippets/2.0.0/1488020846563/Microsoft.VisualStudio.Services.Icons.Default',
            link: '/#',
            timeout: 4000,
            onClick: function () {
                console.log("Fired!");
                window.focus();
                this.close();
            },
            vibrate: [200, 100, 200, 100, 200, 100, 200]
        });
    }
</script>
</body>
</html>
