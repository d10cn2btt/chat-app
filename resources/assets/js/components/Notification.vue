<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-globe"></span>
            Notifications <span class="badge">{{notifications.length}}</span>
            <span class="caret"></span>
        </a>

        <div class="dropdown-menu">
            <a v-for="notice in notifications" class="dropdown-item" href="#" v-on:click="markAsRead(notice)">
                {{notice.data.chat_room.chat}}
            </a>
        </div>
    </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods: {
            markAsRead: function (notice) {
                let data = {
                    id: notice.id
                };

                axios.post('/notification/read', data).then(response => {
//                    window.location.href = '';
                })
            }
        }
    }
</script>
