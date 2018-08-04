<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column">
            <form action="/api/general-properties/distances/id" method="POST" id="editDistance" @submit.prevent="update"
                  @keydown="form.errors.clear($event.target.name)">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Distance Name:</label>
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
                        <label class="label">Distance in Meters:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="number" class="input" name="meters" id="meters" v-model="form.meters" autofocus>
                                <span id="metersHelp" class="help is-danger" v-if="form.errors.has('meters')"
                                      v-text="form.errors.get('meters')"></span>
                            </p>
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
        <div v-text="id" class="column is-1"></div>
        <div class="column" v-text="name"></div>
        <div class="column" v-text="meters"></div>
        <div class="column is-2 button-cell">
            <edit-button @clicked="editing=true"></edit-button>
            <delete-button @clicked="destroy"></delete-button>
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
                meters: this.data.meters,
                form: new Form({
                    name: this.data.name,
                    meters: this.data.meters
                })
            };
        },

        methods: {
            update() {
                this.form
                    .patch('/api/general-properties/distances/' + this.data.id)

                    .then(data => {
                        this.name = this.form.name;
                        this.meters = this.form.meters;
                        this.editing = false;

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Distance Updated'
                        })
                    })
                    .catch(errors => {
                    console.log(errors);
                });
            },

            destroy() {
                axios.delete('/api/general-properties/distances/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.editing = false;

                location.reload();
            }
        }
    }
</script>