<template>
    <div class="tooltip">
        <a class="button is-text" @click="deleteRecord">
            <span class="icon is-small" style="color:red;">
                <i class="far fa-trash-alt"></i>
            </span>
        </a>
        <span class="tooltiptext">Delete</span>
    </div>

</template>

<script>

    export default {

        data() {
            return {}
        },

        methods: {
            deleteRecord() {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    animation: false,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    if (result.value) {
                        this.$emit('clicked')
                    }
                })
            }
        }
    };

</script>