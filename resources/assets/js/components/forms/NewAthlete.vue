<template>
    <form action="/athletes" method="POST" id="newAthlete" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label">First Name:</label>
            <div class="control">
                <input type="text" class="input" name="first_name" id="first_name" v-model="form.first_name" required>
                <span id="firstNameHelp" class="help is-danger" v-if="form.errors.has('first_name')"
                      v-text="form.errors.get('first_name')"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Last Name:</label>
            <div class="control">
                <input type="text" class="input" name="last_name" id="last_name" v-model="form.last_name" required>
                <span id="lastNameHelp" class="help is-danger" v-if="form.errors.has('last_name')"
                      v-text="form.errors.get('last_name')"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Sex:</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="sex" v-model="form.sex" required>
                        <option disabled value="">Choose one...</option>
                        <option value="f">Female</option>
                        <option value="m">Male</option>
                    </select>
                    <span id="hostHelp" class="help is-danger" v-if="form.errors.has('sex')"
                          v-text="form.errors.get('sex')"></span>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Date of Birth</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <input class="input" type="date"
                           name="dob" v-model="form.dob">
                    <span id="dateHelp" class="help is-danger" v-if="form.errors.has('dob')"
                          v-text="form.errors.get('dob')"></span>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Graduation Year:</label>
            <div class="control">
                <input type="number"
                       class="input"
                       name="grad_year"
                       id="grad_year"
                       min="2009"
                       max="2025"
                       v-model="form.grad_year" required>
                <span id="gradYearHelp" class="help is-danger" v-if="form.errors.has('grad_year')"
                      v-text="form.errors.get('grad_year')"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Status:</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="status" v-model="form.status" required>
                        <option disabled value="">Choose one...</option>
                        <option value="a">Active</option>
                        <option value="i">Inactive</option>
                    </select>
                    <span id="statusHelp" class="help is-danger" v-if="form.errors.has('status')"
                          v-text="form.errors.get('status')"></span>
                </div>
            </div>
        </div>
        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Athlete</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    first_name: '',
                    last_name: '',
                    sex: '',
                    dob: '',
                    grad_year: '',
                    status: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                .post('/athletes')

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
                            title: 'Athlete Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            },
        }
    }
</script>