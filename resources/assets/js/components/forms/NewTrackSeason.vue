<template>
    <form action="/track/seasons" method="POST" id="newTrackSeason" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Season Name</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Season</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                .post('/api/track/seasons')

                    .then(data => {

                        Event.$emit('formSubmitted');

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'New Track Season Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            },
        }
    }
</script>