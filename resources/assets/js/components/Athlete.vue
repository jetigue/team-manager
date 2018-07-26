<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div class="column is-9 is-offset-1">
            <form :action="'/athletes/' + this.id" method="POST" id="editAthlete" @submit.prevent="update"
                  @keydown="form.errors.clear($event.target.name)">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">First Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="text" class="input" name="first_name" id="first_name"
                                       v-model="form.first_name" autofocus>
                                <span id="firstNameHelp" class="help is-danger" v-if="form.errors.has('first_name')"
                                      v-text="form.errors.get('first_name')"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Last Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="text" class="input" name="last_name" id="last_name"
                                       v-model="form.last_name" autofocus>
                                <span id="lastNameHelp" class="help is-danger" v-if="form.errors.has('last_name')"
                                      v-text="form.errors.get('last_name')"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Sex:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="sex" v-model="form.sex" required>
                                        <option value="f">Female</option>
                                        <option value="m">Male</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Date of Birth:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="date"
                                       class="input"
                                       name="dob"
                                       id="dob"
                                       v-model="form.dob" required>
                                <span id="dobHelp" class="help is-danger" v-if="form.errors.has('dob')"
                                      v-text="form.errors.get('dob')"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Graduation Year:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input type="number"
                                       class="input"
                                       name="grad_year"
                                       id="grad_year"
                                       min="2009"
                                       max="2025"
                                       v-model="form.grad_year" required>
                                <span id="gradYearHelp" class="help is-danger" v-if="form.errors.has('grad_year')"
                                      v-text="form.errors.get('grad_year')"></span>
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

    <div v-else class="columns table-row  m-0 px-4" :class="{inactiveAthlete : isInactive}">
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

                form: new Form({
                    first_name: this.data.first_name,
                    last_name: this.data.last_name,
                    sex: this.data.sex,
                    dob: this.data.dob,
                    grad_year: this.data.grad_year,
                }),
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
                this.form
                    .patch('/athletes/' + this.data.id)
                    .then(() => {
                        this.first_name = this.form.first_name;
                        this.last_name = this.form.last_name;
                        this.sex = this.form.sex;
                        this.grad_year = this.form.grad_year;
                        this.dob = this.form.dob;
                        this.name = this.form.last_name + ", " + this.form.first_name;

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
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/athletes/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                location.reload();
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
            }
        }
    }
</script>
