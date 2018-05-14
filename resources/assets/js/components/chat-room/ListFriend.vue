<template>
    <div class="row">
        <div class="col">
            <div class="panel panel-primary">
                <div class="panel-heading"><h3 class="panel-title">List of all friends</h3></div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item" :class="[friend.id == currentChatWith ? 'active' : '']" v-on:click="loadIframe(friend.id)" v-for="friend in list_friend">
                            <img class="avt-friend" :src="friend.avatar" alt="">
                            {{friend.name}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="iframe-wrapper1" class="col" style="min-height: 80vh">
            <div id="load-iframe"></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['list_friend'],
        data: function () {
            return {
                currentChatWith: ''
            }
        },
        methods: {
            loadIframe: function (friendId) {
                if (this.currentChatWith == friendId) {
                    return false;
                }

                let url = $("meta[name=url_private]").attr('content') + '/' + friendId;

                $("#load-iframe").html(`<iframe class="iframe-chat-private" src="${url}"></iframe>`);
                this.currentChatWith = friendId;
            }
        }
    }
</script>
