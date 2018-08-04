<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column">
            <form action="/api/meet-properties/timing" method="POST" id="editTimingMethod" @submit.prevent="update"
                  @keydown="form.errors.clear($event.target.name)">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Method Name:</label>
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
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <update-button @clicked="update" :disabled="form.errors.any()"></update-button>
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

        <div class="column is-2 button-cell">
            <edit-button @clicked="editing=true"></edit-button>
            <delete-button @clicked="destroy"></delete-button>
        </div>
    </div>
</template>

<script>
    import EditButton from '../buttons/EditButton';
    import DeleteButton from '../buttons/DeleteButton';

    export default {
        props: ['data'],

        components: {
            'edit-button': EditButton,
            'delete-button': DeleteButton
        },

        data() {
            return {
                editing: false,

                id: this.data.id,
                name: this.data.name,
                form: new Form({
                    name: this.data.name,
                })
            };
        },

        methods: {
            update() {
                this.form
                    .patch('/api/meet-properties/timing/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.editing = false;

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Timing Method Updated'
                        })
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/api/meet-properties/timing/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                this.form = {
                    name: this.data.name
                };

                location.reload();
            }
        }
    }
</script>