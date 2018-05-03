<template>
    <ul class="chat">
        <li class="left clearfix" v-for="message in messages111">
            <div class="chat-body clearfix">
                <div class="header">
                    <strong class="primary-font">
                        {{message.user.name}}
                    </strong>
                </div>
                <p>{{message.message}}</p>
            </div>
        </li>
    </ul>
</template>

<script>
    export default {
        props: ['messages111'],
        updated() {
            console.log(this.messages111);
        }
    }
</script>
