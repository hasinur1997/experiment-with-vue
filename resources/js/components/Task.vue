<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ul>
                    <li v-for="task in tasks" v-bind:key="task.id">
                        {{task.name}}
                    </li>
                </ul>
                <div class="form-group">
                    <input type="text" v-model="taskName" class="form-control" placeholder="Please task name" @keydown="tapParticipant">
                    <span v-if="activePeer" v-text="activePeer.name + ' is typing..'"></span>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create Task" @click="addTask()">
                </div>
            </div>
            <div class="col-md-4">
                <ul>
                    <li v-for="participant in participants" v-bind:key="participant.id">
                        {{participant.name}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Task',
        props: ['projectid'],
        data() {
            return {
                taskName: '',
                tasks: [],
                activePeer: false,
                typingTimmer: false,
                participants: [],
            }
        },

        methods: {

            flashActivePeers(e) {
                this.activePeer =  e;

                if (this.typingTimmer) clearTimeout(this.typingTimmer) 

                this.typingTimmer = setTimeout(() => {
                    this.activePeer = false
                }, 3000);
            },

            tapParticipant() {
                this.channel.whisper('typing', { name: window.App.user.name });
            },

            addTask() {
                var task = {
                    name: this.taskName,
                    project_id: this.projectid
                }

                axios.post('/tasks', task);
                this.tasks.push(task);
                this.taskName = '';
                
            },

            getTask() {
                axios.get('/projects/' + this.projectid + '/tasks')
                        .then((response)=> {
                            this.tasks = response.data;
                        })
            }
        },

        computed: {
            channel() {
                return window.Echo.join('tasks.' + this.projectid);
            }
        },

        created() {
            this.getTask()

            this.channel
                .here(users => {
                    this.participants = users
                })
                .joining(user => {
                    this.participants.push(user)
                })
                .leaving(user => {
                   this.participants.splice(this.participants.indexOf(user), 1)
                })
                .listen('TaskCreated', (e) => {
                    this.tasks.push(e.task)
                })
                .listenForWhisper('typing', this.flashActivePeers)
        }
    }
</script>