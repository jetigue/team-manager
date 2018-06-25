<template>
    <button class="button is-light is-small is-rounded" @click="cancel">Cancel</button>
</template>

<script>

    export default {

        data() {
            return {}

        },

        methods: {
            cancel() {
                this.$emit('clicked');
            }
        }
    };

</script>