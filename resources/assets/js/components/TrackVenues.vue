<template>
    <div>
        <div v-for="(venue, index) in items" :key="venue.id">
            <track-venue :data="venue" @deleted="remove(index)"></track-venue>
        </div>
    </div>
</template>

<script>
    import TrackVenue from './TrackVenue';

    export default {
        props: ['data'],

        components: { TrackVenue },

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
                    title: 'Track Venue Deleted'
                })
            }
        }
    }
</script>