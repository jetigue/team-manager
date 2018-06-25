<template>
    <div>
        <div v-for="(timing, index) in items" :key="timing.id">
            <timing :data="timing" @deleted="remove(index)"></timing>
        </div>
    </div>
</template>

<script>
    import Timing from './Timing';

    export default {
        props: ['data'],

        components: { Timing },

        data() {
            return {
                items: this.data
            }
        },

        methods: {
            remove(index) {
                this.items.splice(index, 1);

                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                toast({
                    type: 'success',
                    title: 'Timing Method Deleted'
                })
            }
        }
    }
</script>