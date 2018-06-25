<template>
    <div>
        <div v-for="(athlete, index) in items" :key="athlete.id">
            <athlete :data="athlete" @deleted="remove(index)"></athlete>
        </div>
    </div>
</template>

<script>
    import Athlete from './Athlete';

    export default {
        props: ['data'],

        components: { Athlete },

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
                    title: 'Athlete Deleted'
                })
            }
        }
    }
</script>
