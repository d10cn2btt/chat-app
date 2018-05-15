/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));

Vue.component('list-friend', require('./components/chat-room/ListFriend.vue'));
Vue.component('chat-room-list', require('./components/chat-room/Chat.vue'));
Vue.component('chat-room-composer', require('./components/chat-room/ChatComposer.vue'));
Vue.component('online-user', require('./components/chat-room/OnlineUser.vue'));

Vue.component('notification', require('./components/Notification.vue'));

// const app = new Vue({
//     el: '#app',
//     data: {
//         messageList: []
//     },
//     created() {
//         // Get all message when enter room
//         // this.fetchMessages();
//         /**
//          * Sync message real-time
//          * `chat-channel` must same in MessageSent.php and routes/channels.php
//          */
//         Echo.private('chat-channel')
//             .listen('MessageSent', (e) => {
//                 console.log(e);
//                 this.messageList.push({
//                     message: e.message.message,
//                     user: e.user
//                 })
//             })
//     },
//
//     methods: {
//         fetchMessages() {
//             axios.get('/messages').then(response => {
//                 this.messageList = response.data
//             })
//         },
//
//         addMessage(message, abc) {
//             console.log(abc);
//             this.messageList.push(message);
//
//             axios.post('/messages', message).then(resposne => {
//                 console.log(resposne.data);
//             })
//         }
//     }
// });

const app = new Vue({
    el: '#app',
    data: {
        chats: '',
        onlineUsers: '',
        notifications: '',
    },
    created() {
        const userId = $('meta[name="userId"]').attr('content');
        const friendId = $('meta[name="friendId"]').attr('content');

        if (friendId != undefined) {
            axios.post('/chat-room/history/' + friendId).then((response) => {
                // console.log(response.data);
                this.chats = response.data;
                this.scrollToBottom();
            });

            Echo.private('chat-room.' + friendId + '.' + userId)
                .listen('ChatRoomBroadCast', (e) => {
                    console.log(e);
                    this.chats.push(e.chatRoom);
                    this.scrollToBottom();
                });
        }

        if (userId != undefined) {
            // When we enter page, it will send a request to broadcast/auth
            // The Function handled is channel.php
            Echo.join('online')
                .here((users) => {
                    this.onlineUsers = users
                })
                .joining((user) => {
                    this.onlineUsers.push(user);
                })
                .leaving((user) => {
                    this.onlineUsers = this.onlineUsers.filter((u) => {
                        u != user;
                    });
                })
        }

        // Notification
        axios.post('/notification/listAll').then(response => {
            this.notifications = response;
        })
    },
    methods: {
        scrollToBottom: function() {
            setTimeout(function () {
                console.log($('.direct-chat-primary').height());
                $("html, body").animate({ scrollTop: $('.direct-chat-primary').height() }, 100);
            }, 0);
        }
    }
});
