<style>
    .btn-primary:hover {
        background-color: #367fa9;
    }

    .btn-primary {
        background-color: #3c8dbc;
        border-color: #367fa9;
    }
</style>

<template>
    <div class="input-group">
        <input type="text" class="form-control" v-model="chat" v-on:keyup.enter="sendChat" autofocus>
        <!--<div class="input-group-append">-->
            <!--<button class="btn btn-primary" type="button" v-on:click="sendChat">Send</button>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'friend_id', 'history', 'avatar'],
        data() {
            return {
                chat: '',
                timeout: Math.floor(Date.now() / 1000),
            }
        },
        methods: {
            sendChat: function (e) {
                if (this.chat == '' || this.timeout == Math.floor(Date.now() / 1000)) {
                    return false;
                }

                this.timeout = Math.floor(Date.now() / 1000);

                let data = {
                    chat: this.chat,
                    user_id: this.user_id,
                    friend_id: this.friend_id,
                    user: {
                        avatar: $('meta[name=user_avatar]').attr('content'),
                    }
                };

                axios.post('/chat-room/sendChat', data).then((response) => {
                    this.history.push(data);
                    this.chat = '';
                    $("html, body").animate({ scrollTop: $(document).height() }, 100);
                });
            }
        }
    }
</script>
