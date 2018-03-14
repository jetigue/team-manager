<template>
    <form action="/meets/timing" method="POST" id="newTiming" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Timing Method</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Add Timing Method</button>
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
                    .post('/meets/timing')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Timing Method Added Successfully!',
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