<template>
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head ">
                <p class="modal-card-title is-marginless">{{ title }}</p>
                <button class="delete" aria-label="close" @click="$emit('close')"></button>
            </header>
            <section class="modal-card-body" id="editForm">
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

        props: ['title'],

        data() {
            return {
                showEditModal: false
            }
        },

        methods: {
            close: function () {
                this.$emit('close');
            },

            open: function () {
                this.$emit('open');
            },

        },

        created() {
            Event.$on('formSubmitted', () => this.close());
            Event.$on('openEditModal', () => this.open());

        }
    }
</script>