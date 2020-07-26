<template>
    <div>
        <h2>My Projects</h2>
        <Notification v-if="showMessage" @close="showMessage = false">
            Project has been created successfully !
        </Notification>

        <ProjectList></ProjectList>

        <addProject></addProject>
        
    </div>
</template>

<script>
    import addProject from '@/Views/project/Create'
    import Notification from '@/components/Notification'
    import ProjectList from '@/Views/project/index'
    export default {
        name: 'Project',
        components: {
            addProject,
            Notification,
            ProjectList
        },

        data() {
            return {
                showMessage: false
            }
        },

        methods: {

        },

        created() {
            Event.$on('addProject', () => this.showMessage = true )
        }
    }
</script>

