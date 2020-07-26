<template>
    <div>
        <form action="" @keydown="form.errors.clear($event.target.name)">
            <div class="field">
                <div class="control">
                    <input class="input is-primary" type="text" name="name" placeholder="Project Name" v-model="form.name">
                    <span v-if="form.errors.has('name')" class="help is-danger" v-text="form.errors.get('name')"></span>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <textarea class="textarea is-primary" name="description" placeholder="Project Description" v-model="form.description"></textarea>
                    <span v-if="form.errors.has('description')" class="help is-danger" v-text="form.errors.get('description')">Required </span>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary" @click.prevent="createProject()" :disabled="form.errors.any()">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

    export default {
      name: 'AddProject',
      components: {},
      data() {
        return {
            responseData: '',
            form: new Form({
                name: '',
                description: ''
            })
        }
      },

      filters: {

      },

      methods: {
        createProject() {
            var data = {
                name: this.form.name,
                description: this.form.description
            }

            this.form.post('/projects')
                .then(response => {
                    this.onSuccess(response.data)
                })
                .catch(errors => {
                    this.form.errors.record(errors.response.data.errors)
                });
        },

        onSuccess(response) {
            this.form.reset()
            Event.$emit('addProject', response)
        },
      }

    }
</script>

