<template>
    <div>
        <a class="button is-link is-small is-rounded is-outlined" @click="showEditModal=true">Edit</a>
    </div>
</template>

<script>

    export default {

        data() {
            return {
                showEditModal: false
            }
        },
    };

</script>