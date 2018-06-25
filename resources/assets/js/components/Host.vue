<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Host Name:</label>
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
        <div class="column is-9 py-2" v-text="name"></div>

        <div class="column p-0 button-cell">
            <p class="field">
                <edit-button @clicked="editing=true"></edit-button>
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
            };
        },

        methods: {
            update() {
                axios.patch('/meets/hosts/' + this.data.id, {
                    name: this.name
                });

                this.editing = false;

                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                toast({
                    type: 'success',
                    title: 'Host Updated'
                })
            },

            destroy() {
                axios.delete('/meets/hosts/' + this.data.id);

                this.$emit('deleted', this.data.id);
            }
        }
    }
</script>