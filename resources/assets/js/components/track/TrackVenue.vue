<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column">
            <form action="/api/track/venues/id" method="POST" id="editTrackVenue" @submit.prevent="update"
                  @keydown="form.errors.clear($event.target.name)">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Venue Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="text" class="input" name="name" id="name" v-model="form.name" autofocus>
                                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                                      v-text="form.errors.get('name')"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">City:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="text" class="input" name="city" id="city" v-model="form.city" autofocus>
                                <span id="cityHelp" class="help is-danger" v-if="form.errors.has('city')"
                                      v-text="form.errors.get('city')"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">State:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="state" v-model="form.state" :value="form.state">
                                        <option v-for="item in items"
                                                :value="item.abbreviation">{{item.name}}
                                        </option>
                                    </select>
                                    <span id="stateHelp" class="help is-danger" v-if="form.errors.has('state')"
                                          v-text="form.errors.get('state')"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <update-button :disabled="form.errors.any()"></update-button>
                            </div>
                            <div class="control">
                                <cancel-button @clicked="resetForm"></cancel-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div v-else class="columns table-row m-0 px-4">
        <div class="column is-1" v-text="id"></div>
        <div class="column" v-text="name"></div>
        <div class="column is-2" v-text="city"></div>
        <div class="column is-1" v-text="state"></div>

        <div class="column is-2 is-offset-1 p-0 button-cell">
            <p class="field">
                <edit-button @clicked="getStates"></edit-button>
                <delete-button @clicked="destroy"></delete-button>
            </p>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['data'],

        data() {
            return {
                editing: false,

                id: this.data.id,
                name: this.data.name,
                city: this.data.city,
                state: this.data.state,

                form: new Form({
                    name: this.data.name,
                    city: this.data.city,
                    state: this.data.state
                }),

                items: [],
            }
        },

        methods: {
            update() {
                this.form
                    .patch('/api/track/venues/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.city = this.form.city;
                        this.state = this.form.state;

                        this.editing = false;

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Track Venue Updated'
                        })
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },


            destroy() {
                axios.delete('/api/track/venues/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            getStates() {

                this.editing = true;

                axios.get('/storage/json/States.json')
                    .then(response => {
                        this.items = response.data;
                    })
                    .catch(errors => {
                        console.log(errors)
                    });
            },

            resetForm() {
                // this.form = {
                //     name: this.data.name
                // };
                //
                this.editing = false;

                location.reload();
            }
        }
    }
</script>