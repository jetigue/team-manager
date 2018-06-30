<template>
    <form action="/track/meets" method="POST" id="newTrackMeet" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Meet name</label>
            <div class="control">
                <div class="select">
                    <select name="track_meet_name_id" v-model="selected">
                        <option
                                v-for="item in items"
                                :value="item.id">{{item.name}}
                        </option>
                    </select>
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>
            </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Track Meet</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                selected: [],
                form: new Form({
                    name: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                .post('/track/meets')

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
                            title: 'New Track Meet Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            },

            created () {
                axios.get('/track/meet/names')
                    .then((response) => {
                        this.items = response.data
                    });
            }
        }
    }
</script>