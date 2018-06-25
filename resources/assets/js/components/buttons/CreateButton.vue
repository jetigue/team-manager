<template>
    <button type="button" class="button is-primary is-rounded is-small m-0" @click="showModal">
        <span class="fa fa-plus mr-4" aria-hidden="true"></span><slot></slot>
    </button>
</template>

<script>

    export default {

        data() {
            return {
            }
        },

        methods: {
            showModal() {
                Event.$emit('clicked');
            },
        }
    };

</script>