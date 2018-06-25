<template>
    <div>
        <div v-for="(meet, index) in items" :key="meet.id">
            <track-meet :data="meet" @deleted="remove(index)"></track-meet>
        </div>
    </div>
</template>

<script>
    import TrackMeet from './TrackMeet';

    export default {
        props: ['data'],

        components: { TrackMeet },

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
                    title: 'Track Meet Deleted'
                })

                // flash('Track meet deleted!');
            }
        }
    }
</script>