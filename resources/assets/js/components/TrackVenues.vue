<template>
    <div>
        <div v-for="(venue, index) in items" :key="venue.id">
            <track-venue :data="venue" @deleted="remove(index)"></track-venue>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Venue">
            <new-track-venue @created="add"></new-track-venue>
        </create-modal>
    </div>
</template>

<script>
    import TrackVenue from './TrackVenue';
    import NewTrackVenue from './forms/NewTrackVenue';
    import CreateModal from './modals/CreateModal'

    export default {
        props: ['data'],

        components: { TrackVenue, CreateModal, NewTrackVenue },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(venue) {
                this.items.push(venue);
            },

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
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>