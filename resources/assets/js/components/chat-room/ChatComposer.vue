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
        <input type="text" class="form-control" v-model="chat" v-on:keyup.enter="sendChat">
        <!--<div class="input-group-append">-->
            <!--<button class="btn btn-primary" type="button" v-on:click="sendChat">Send</button>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {
        props: ['user_id', 'friend_id', 'history'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function (e) {
                if (this.chat == '') {
                    return false;
                }

                let data = {
                    chat: this.chat,
                    user_id: this.user_id,
                    friend_id: this.friend_id
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
