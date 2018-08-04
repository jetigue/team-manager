<template>
    <form action="/api/general-properties/distances" method="POST" id="newDistance" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="name">Distance Name</label>
            <div class="control">
                <input type="text" class="input" name="name" id="name" v-model="form.name">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('form.name')"
                      v-text="form.errors.get('name')"></span>
            </div>
        </div>

        <div class="field">
            <label class="label" for="name">Distance in Meters</label>
            <div class="control">
                <input type="number"
                       class="input"
                       name="meters"
                       id="meters"
                       min= 400
                       max= 42195 v-model="form.meters">
                <span id="metersHelp" class="help is-danger" v-if="form.errors.has('form.meters')"
                      v-text="form.errors.get('meters')"></span>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Distance</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                    meters: ''
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                .post('/api/general-properties/distances')

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
                            title: 'New Distance Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            },
        }
    }
</script>