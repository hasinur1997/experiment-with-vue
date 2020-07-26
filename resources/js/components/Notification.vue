<template>
    <div>
        <article class="message is-success">
            <div class="message-body">
                <slot></slot>
                <button class="delete" @click="$emit('close')"></button>
            </div>
        </article>
    </div>
</template>

<script>
    export default {
        name: 'Notification',
    }
</script>

<style scoped>
    .message {
        margin: 20px 0;
    }
    .delete {
        float: right;
    }    
</style>