<template>
    <form action="/meets/divisions" method="POST" id="newMeetDivision" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Meet Division</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Add Division</button>
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
                    .post('/meets/divisions')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Division Added Successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        // flash('Venue Added Successfully');
                        Event.$emit('formSubmitted');
                    })

                    .catch(errors => console.log(errors));

            },
        }
    }
</script>