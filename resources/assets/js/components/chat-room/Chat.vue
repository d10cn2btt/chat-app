<style>
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        border-top: 3px solid #d2d6de;
        margin-bottom: 20px;
        width: 100%;
        /*box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);*/
    }

    .box.box-primary {
        border-top-color: #3c8dbc;
    }

    .direct-chat-msg {
        margin-bottom: 10px;
    }

    .direct-chat-info {
        display: block;
        margin-bottom: 2px;
        font-size: 12px;
    }

    .direct-chat-messager {
        transform: translate(0, 0);
        padding: 10px;
        /*height: 90vh;*/
        overflow: auto;
    }

    .direct-chat-name {
        font-weight: 600;
    }

    .direct-chat-timestamp {
        color: #999;
    }

    .direct-chat-img {
        border-radius: 50%;
        float: left;
        width: 40px;
        height: 40px;
    }

    .direct-chat-text {
        border-radius: 5px;
        position: relative;
        padding: 5px 10px;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        margin: 5px 0 0 15px;
        color: #444;
        max-width: 60%;
    }

    .right .direct-chat-img {
        float: right;
    }

    .direct-chat-primary .right > .direct-chat-text {
        background: #3c8dbc;
        border-color: #3c8dbc;
        color: #fff;
    }

    .right .direct-chat-text:after, .right .direct-chat-text:before {
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #d2d6de;
    }

    .right .direct-chat-text {
        margin-right: 15px;
        margin-left: 0;
        float: right;
    }

    .box-footer {
        padding: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
        left: 0;
        background: white;
    }

    .direct-chat-primary .right>.direct-chat-text:after, .direct-chat-primary .right>.direct-chat-text:before {
        border-left-color: #3c8dbc;
    }

    .direct-chat-text:after {
        border-width: 5px;
        margin-top: -5px;
    }

    .direct-chat-text:after, .direct-chat-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid transparent;
        border-right-color: #d2d6de;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }

    .direct-chat-text:before {
        border-width: 6px;
        margin-top: -6px;
    }

    .right .direct-chat-name {
        float: right;
    }

    .direct-chat-text {
        float: left;
    }

    .direct-chat-msg:last-child {
        /*margin-bottom: 40px;*/
    }

    .no-message {
        /*height: 90vh;*/
        text-align: center;
        font-size: 20px;
    }
</style>

<template>
    <div class="box box-primary direct-chat direct-chat-primary">
        <div class="direct-chat-messager">
            <div class="direct-chat-msg clearfix" v-for="msg in chat123" :class="[msg.user_id == user_id ? 'right' : '']">
                <div class="direct-chat-info clearfix">
                    <!--<span class="direct-chat-name">Alexander Pierce</span>-->
                    <!--<span class="direct-chat-timestamp">{{msg.created_at}}</span>-->
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" :src="msg.user.avatar"
                     alt="Message User Image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">{{msg.chat}}</div>
                <!-- /.direct-chat-text -->
            </div>
        </div>
        <div class="box-footer">
            <chat-room-composer :user_id="user_id" :friend_id="friend_id" :history="chat123"></chat-room-composer>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['chat123', 'user_id', 'friend_id'],
        mounted() {
            console.log('Component mounted');
        }
    }
</script>
