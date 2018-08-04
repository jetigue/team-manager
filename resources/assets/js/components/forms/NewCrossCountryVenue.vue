<template>
    <form action="/cross-country/venues" method="POST" id="newCrossCountryVenue" @submit.prevent="onSubmit"
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
            <label class="label" for="name">City</label>
            <div class="control">
                <input type="text" class="input" name="city" id="city" v-model="form.city">
                <span id="cityHelp" class="help is-danger" v-if="form.errors.has('city')"
                      v-text="form.errors.get('city')"></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="name">State</label>
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <select name="state" v-model="form.state">
                        <option v-for="item in items"
                                :value="item.abbreviation">{{item.name}}
                        </option>
                    </select>
                    <span id="stateHelp" class="help is-danger" v-if="form.errors.has('state')"
                          v-text="form.errors.get('state')"></span>
                </div>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Venue</button>
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
                }),

                items: [],

            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/api/cross-country/venues')

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
                            title: 'New Venue Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            }
        },

        created() {
            axios.get('/storage/json/States.json')
                .then(response => {
                    this.items = response.data;
                })
                .catch(errors => {
                    console.log(errors)
                });
        }
    }
</script>