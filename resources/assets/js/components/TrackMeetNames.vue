<template>
    <div>
        <div v-for="(name, index) in items" :key="name.id">
            <track-meet-name :data="name" @deleted="remove(index)"></track-meet-name>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Meet Name">
            <new-track-meet-name @created="add"></new-track-meet-name>
        </create-modal>
    </div>
</template>

<script>
    import TrackMeetName from './TrackMeetName';
    import NewTrackMeetName from './forms/NewTrackMeetName';
    import CreateModal from './modals/CreateModal'


    export default {
        props: ['data'],

        components: { TrackMeetName, CreateModal, NewTrackMeetName },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(name) {
                this.items.push(name);
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
                    title: 'Meet Name Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>