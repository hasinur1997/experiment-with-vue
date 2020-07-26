<template>
    <div>
        <div class="table-container">
            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="project in projects" :key="project.id">
                        <td>{{ project.name }}</td>
                        <td>{{ project.description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ProjectList',
        data() {
            return {
                projects: []
            }
        },

        methods: {
            refreshProjects(data) {
                this.projects.unshift(data)
            },

            getProjects() {
                axios.get('/projects')
                    .then(response => {
                        this.projects = response.data
                    })
                    .catch()
            }

        },

        created() {
            this.getProjects()
            Event.$on('addProject', this.refreshProjects)
        }
    }
</script>