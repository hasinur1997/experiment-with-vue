<template>
    <div class="columns">
        <div class="column">
            <article class="message" v-for="status in statuses" :key="status.name">
                <div class="message-header">
                    <p>{{ status.title }}</p>
                    <p>{{ status.created_at | ago | uppercase }}</p>
                </div>
                <div class="message-body">
                    <p>{{ status.body }}</p>
                </div>
            </article>
        </div>
    </div>
</template>

<script>
    import Status from '@/Models/Status'
    import moment from 'moment'

    export default {
        name: 'Home',
        components: {
        
        },

        data() {
            return {
                statuses: []
            }
        },

        filters: {
            ago(date) {
                return moment(date).fromNow()
            },

            uppercase(value) {
                return value.toUpperCase()
            }
        },

        methods: {

        },

        created() {
            axios.get('/statuses')
                    .then(({data}) => this.statuses = data)
        }
    }
</script>