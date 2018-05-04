<template>
    <ul class="chat">
        {{messages111}}
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
        created() {
            console.log(this.messages111);
        }
    }
</script>
