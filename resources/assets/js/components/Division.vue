<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Division Name:</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input type="text" class="input" name="name" id="name" v-model="name" autofocus>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label"></div>
                <div class="field-body">
                    <div class="field is-grouped">
                        <div class="control">
                            <update-button @clicked="update"></update-button>
                        </div>
                        <div class="control">
                            <cancel-button @clicked="editing=false"></cancel-button>
                        </div>
                    </div>
                </div>

            </div>
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
    import EditButton from './buttons/EditButton';
    import DeleteButton from './buttons/DeleteButton';

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
                name: this.data.name
            };
        },

        methods: {
            update() {
                axios.patch(
                    '/meets/divisions/' + this.data.id, {
                        name: this.name
                    })

                .then(() => {
                    this.editing = false;

                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    toast({
                        type: 'success',
                        title: 'Division Updated'
                    })
                })
                .catch(error => {
                    flash(error.response.data, 'danger');
                    this.editing = true;
                })

            },

            destroy() {
                axios.delete('/meets/divisions/' + this.data.id);

                this.$emit('deleted', this.data.id);
            }
        }
    }
</script>