<template>
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
            <span class="glyphicon glyphicon-globe"></span> Notifications <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li v-for="notice in notifications">
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['notifications']
    }
</script>
