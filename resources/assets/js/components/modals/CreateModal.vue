<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title is-marginless">{{ title }}</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body" id="createForm">
                <slot></slot>
            </section>
            <footer class="modal-card-foot">
                <button class="button" @click="$emit('close')">Cancel</button>
            </footer>
        </div>
    </div>
</template>

<script>
    export default {

        props: ['title', 'endpoint'],

        data() {
            return {
                showCreateModal: false
            }
        },

        methods: {
            close: function () {
                this.$emit('close');
            },

        },

        created() {
            Event.$on('formSubmitted', () => this.close());
        }
    }
</script>