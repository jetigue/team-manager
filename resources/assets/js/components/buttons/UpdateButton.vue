<template>
    <button class="button is-success is-small is-rounded" @click="updateRecord">Update</button>
</template>

<script>

    export default {

        data() {
            return {}

        },
        methods: {
            updateRecord() {
                this.$emit('clicked');
            }
        }
    };

</script>