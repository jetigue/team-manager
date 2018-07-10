<template>
    <div class="tooltip">
        <a class="button is-text" @click="editRecord">
            <span class="icon is-small" style="color:blue;">
                <i class="fas fa-pencil-alt"></i>
            </span>
        </a>
        <span class="tooltiptext">Edit Details</span>
    </div>

</template>

<script>

    export default {

        data() {
            return {}

        },

        methods: {
            editRecord() {
                this.$emit('clicked');
            }
        }
    };

</script>