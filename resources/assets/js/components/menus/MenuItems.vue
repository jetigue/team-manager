<template>
    <ul class="menu-list">
        <slot></slot>
    </ul>
</template>

<script>
    export default {
        name: "MenuItems",

        data() {
            return {
                menuItems: [],
                isHidden: false
            };

        },

        methods: {
            // toggleMenu() {
            //     this.isExpanded = true;
            // }
        },

        created() {
            this.menuItems = this.$children;
        }
    }


</script>

<style scoped>

</style>