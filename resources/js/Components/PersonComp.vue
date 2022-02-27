<template>
    <div class="person" :data-chat="data_chat">
        <div class="user-info">
            <div class="f-head">
                <img src="/assets/img/90x90.jpg" alt="avatar">
            </div>
            <div class="f-body">
                <div class="meta-info">
                    <span class="user-name" :data-name="name">{{name}}</span>
                    <span class="user-meta-time">{{time_chat}}</span>
                </div>
                <span class="preview">{{preview_chat}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'preview_chat', 'time_chat', 'data_chat'],
    }
</script>