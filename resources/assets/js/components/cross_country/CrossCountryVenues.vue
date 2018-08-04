<template>
    <div>
        <div v-for="(venue, index) in items" :key="venue.id">
            <cross-country-venue :data="venue" @deleted="remove(index)"></cross-country-venue>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Cross Country Venue">
            <new-cross-country-venue @created="add"></new-cross-country-venue>
        </create-modal>
    </div>
</template>

<script>
    import CrossCountryVenue from './CrossCountryVenue';
    import NewCrossCountryVenue from '../forms/NewCrossCountryVenue';
    import CreateModal from '../modals/CreateModal'

    export default {
        props: ['data'],

        components: { CrossCountryVenue, CreateModal, NewCrossCountryVenue },

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
                    title: 'Cross Country Venue Deleted'
                })
            }
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>