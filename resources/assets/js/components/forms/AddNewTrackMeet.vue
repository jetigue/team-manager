<template>

    <form action="/track/meets" method="POST" id="newTrackMeetForm" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label">Meet Name</label>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <select v-model="selected" name="track_meet_name_id" required>
                        <option value="">Choose one...</option>
                        @foreach($names as $name)
                        <option value="{{$name->track_meet_name_id}}" </option>
                        @endforeach
                    </select>
                    <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                          v-text="form.errors.get('track_meet_name_id')"></span>
                </div>
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
                    track_meet_name_id: ''

                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/track/meets')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Meet Added Successfully!',
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