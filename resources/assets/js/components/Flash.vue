<template>
    <article class="message flash-message" :class="'is-'+level" v-show="show">
        <div class="message-body" >
            <strong>{{ body }}</strong>
        </div>
    </article>

</template>

<script>
    export default {
        props: ['message'],

        data() {
            return {
                body: '',
                level: 'success',
                show: false
            }
        },

        created() {
            if (this.message) {
                this.flash(this.message);
            }

            window.events.$on(
                'flash', data => this.flash(data)
            );
        },

        methods: {

            flash(data) {
                this.body = data.message;
                this.level = data.level;
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