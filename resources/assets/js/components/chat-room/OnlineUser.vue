<template>
    <div class="pull-right">
        <i class="fa fa-circle green" v-if="checkUser()"></i>
        <i class="fa fa-circle red" v-else=""></i>
    </div>
</template>
<script>
    export default {
        props: ['friend', 'onlineusers'],
        methods: {
            checkUser: function () {
                console.log('onlines uer', this.onlineusers);
                return _.find(this.onlineusers, {id: this.friend.id});
            }
        }
    }
</script>

<style>
    .red {
        color: darkred;
    }

    .green {
        color: lawngreen;
    }
</style>
