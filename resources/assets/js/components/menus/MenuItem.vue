<template>
        <li>
            <a :href="url" :class="{ 'is-hidden': isHidden }"><slot></slot></a>
        </li>
</template>

<script>
    export default {
        props:  ['url'],

        data() {
            return {
                isHidden: false,
            }
        },

        methods: {
            toggleClass() {
                this.isHidden = true;
            },

            toggleSubmenu() {
                this.$emit('showSubMenu')
            }
        }
    }
</script>
