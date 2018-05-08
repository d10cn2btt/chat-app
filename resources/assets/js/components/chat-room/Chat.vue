<style>
    .list-group-item {
        margin-bottom: 10px;
    }

    #wrapper {
        height: 300px;
        margin-bottom: 15px;
    }

    #chat-room-container {
        max-height: 300px;
        overflow-y: scroll;
    }
</style>

<template>
    <div class="container">
        <div id="wrapper">
            <div id="chat-room-container" class="row" v-if="chat123.length != 0">
                <div class="list-group-item col-md-7" v-for="msg in chat123" :class="[msg.user_id == user_id ? 'offset-md-5' : '']">
                    <!--<div class="text-right" v-if="msg.user_id == user_id">{{msg.chat}}</div>-->
                    <!--<div class="text-left" v-else>{{ msg.chat }}</div>-->
                    {{msg.chat}}
                </div>
            </div>
            <div class="no-history" v-else>There are no messages</div>
        </div>
        <div class="row">
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
