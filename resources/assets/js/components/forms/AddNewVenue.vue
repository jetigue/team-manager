<template>
    <form action="/track/venues" method="POST" id="newVenueForm" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Venue Name</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="city">City</label>
            <div class="control">
                <input type="text" class="input" name="city" id="city" v-model="form.city">
                <span id="cityHelp" class="help is-danger" v-if="form.errors.has('city')"
                      v-text="form.errors.get('city')"></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="state">State</label>
            <div class="control">
                <input type="text" class="input" name="state" id="state" v-model="form.state">
                <span id="stateHelp" class="help is-danger" v-if="form.errors.has('state')"
                      v-text="form.errors.get('state')"></span>
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
                    name: '',
                    city: '',
                    state: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/track/venues')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Venue Added Successfully!',
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