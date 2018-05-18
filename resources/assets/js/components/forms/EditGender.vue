<template>

</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    name: '',
                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .patch('/meets/genders/$id')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Gender Updated Successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        // flash('Venue Added Successfully');
                        Event.$emit('formSubmitted');
                    })

                    .catch(errors => console.log(errors));

            },
        }
    }
</script>