<template>
    <div>
        <div v-for="(meet, index) in items" :key="meet.id">
            <track-meet :data="meet" @deleted="remove(index)"></track-meet>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Meet">
            <new-track-meet @created="add"></new-track-meet>
        </create-modal>
    </div>
</template>

<script>
    import TrackMeet from './TrackMeet';
    import CreateModal from './modals/CreateModal'
    import NewTrackMeet from './forms/NewTrackMeet';

    export default {
        props: ['data'],

        components: { TrackMeet, CreateModal, NewTrackMeet },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(meet) {
                this.items.push(meet);
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
                    title: 'Track Meet Deleted'
                })
            }
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);

            // axios.get('/track/meet/names')
            //     .then((response) => {
            //         this.items = response.data
            //     });
        }
    }
</script>