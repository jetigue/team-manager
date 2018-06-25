<template>
    <div>
        <div v-if="editing" class="columns">
            <!--<div :id="'athlete-' +id" class="column is-1"></div>-->
            <div class="column">
                <div class="field">
                    <div class="control">
                        <input type="text" class="input" name="first_name" id="first_name" v-model="first_name"
                               autofocus>
                        <!--<span id="nameHelp" class="help is-danger" v-if="form.errors.has('first_name')"-->
                        <!--v-text="form.errors.get('first_name')"></span>-->
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-success is-small is-rounded" @click="update">Update</button>
                    </div>
                    <div class="control">
                        <button class="button is-light is-small is-rounded" @click="editing=false">
                            Cancel
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div v-else class="table-row content columns m-0 px-4" :class="{inactiveAthlete : isInactive}">
            <div v-text="name" class="column is-3"></div>
            <div v-text="gender" class="column is-2"></div>
            <div v-text="grad_year" class="column is-2 "></div>
            <div class="column is-2 p-0">
                <a v-if="active" class="button is-medium is-text" @click="inactivate">
                                    <span class="icon is-medium" style="color:green;">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                </a>
                <a v-else class="button is-medium is-text" @click="activate">
                                    <span class="icon is-medium" style="color:gray;">
                                        <i class="far fa-square"></i>
                                    </span>
                </a>
            </div>
            <div class="column has p-0 button-cell">
                <p class="field">
                    <edit-button @clicked="editing=true"></edit-button>
                    <delete-button @clicked="destroy"></delete-button>
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,
                active: this.data.status === 'a',

                id: this.data.id,
                first_name: this.data.first_name,
                name: this.data.last_name + ", " + this.data.first_name,
                user_id: this.data.user_id,
                sex: this.data.sex,
                dob: this.data.dob,
                grad_year: this.data.grad_year,
                status: this.data.status,

            };
        },

        methods: {

            activate() {
                axios.patch('/athletes/' + this.data.id, {
                    status: this.status = 'a'
                });

                this.active = true;

            },

            inactivate() {
                axios.patch('/athletes/' + this.data.id, {
                    status: this.status = 'i'
                });

                this.active = false;

            },

            update() {
                axios.patch('/athletes/' + this.data.id, {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    sex: this.sex,
                    dob: this.dob,
                    grad_year: this.grad_year,
                    status: this.status,
                    user_id: this.user_id
                });

                this.editing = false;

                const toast = swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                toast({
                    type: 'success',
                    title: 'Athlete Updated'
                })

            },

            destroy() {
                axios.delete('/athletes/' + this.data.id);

                this.$emit('deleted', this.data.id);
            }
        },

        computed: {
            age: function () {

                return moment().diff(this.data.dob, 'years');
            },

            gender: function () {
                if (this.sex === 'm') {
                    return "Male";
                }

                return "Female";
            },

            isInactive: function () {
                if (this.status === 'i') {
                    return true;
                }
            },

            //
            // standing: function () {
            //     if (this.status === 'a') {
            //         return this.status = "Active";
            //     }
            //
            //     return "Inactive";
            // },
        }
    }
</script>
