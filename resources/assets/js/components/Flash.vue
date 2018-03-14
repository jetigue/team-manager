<template>
    <article class="message flash-message" v-show="show">
        <div class="message-body has-text-white">
            <strong>Success!</strong> {{ body }}
        </div>
    </article>

</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: '',
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on(
                'flash', message => this.flash(message)
            );
        },

        methods: {

            flash(message) {
                this.body = message;
                this.show = true;

                this.hide();
            },

            hide() {
                setTimeout(() => {
                    this.show = false;
                }, 2500);
            },
        }
    };

</script>

<style>
    .flash-message {
        position: fixed;
        right: 25px;
        bottom: 25px;
        background-color: #008000;
        color: #ffffff;
    }
</style>