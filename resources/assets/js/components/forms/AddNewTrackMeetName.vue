<template>
    <form action="/track/meet/names" method="POST" id="newTrackMeetName" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="meet_name">Meet Name</label>
            <div class="control">
                <input type="text" class="input" name="meet_name" id="meet_name" v-model="form.meet_name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('meet_name')"
                      v-text="form.errors.get('meet_name')"></span>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Add Venue</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    meet_name: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/track/meet/names')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Meet Name Added Successfully!',
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