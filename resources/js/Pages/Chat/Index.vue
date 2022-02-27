<template>
    <Head title="ChatApp"/>
    <chat-app>
    
    </chat-app>
</template>

<script>
    import ChatApp from '@/Layouts/ChatApp.vue';
    import {Head} from '@inertiajs/inertia-vue3';
    export default {
        components: {
            ChatApp,
            Head
        },
    }
</script>