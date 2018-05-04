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

const app = new Vue({
    el: '#app',
    data: {
        messageList: []
    },
    created() {
        // Get all message when enter room
        // this.fetchMessages();
        /**
         * Sync message real-time
         * `chat-channel` must same in MessageSent.php and routes/channels.php
         */
        Echo.private('chat-channel')
            .listen('MessageSent', (e) => {
                console.log(e);
                this.messageList.push({
                    message: e.message.message,
                    user: e.user
                })
            })
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messageList = response.data
            })
        },

        addMessage(message, abc) {
            console.log(abc);
            this.messageList.push(message);

            axios.post('/messages', message).then(resposne => {
                console.log(resposne.data);
            })
        }
    }
});
