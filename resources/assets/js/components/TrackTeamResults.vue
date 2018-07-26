<template>
    <div>
        <div v-for="(teamResult, index) in items" :key="teamResult.id">
            <track-team-result :endpoint="endpoint" :data="teamResult" @deleted="remove(index)"></track-team-result>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Team Result">
            <new-track-team-result  :endpoint="endpoint" @created="add"></new-track-team-result>
        </create-modal>
    </div>
</template>

<script>
    import TrackTeamResult from './TrackTeamResult';
    import CreateModal from './modals/CreateModal'
    import NewTrackTeamResult from './forms/NewTrackTeamResult';

    export default {
        props: ['data'],

        components: { TrackTeamResult, CreateModal, NewTrackTeamResult },

        data() {
            return {
                items: this.data,
                endpoint: location.pathname,
                showCreateModal: false,
            }
        },

        methods: {

            add(teamResult) {
                this.items.push(teamResult);
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
                    title: 'Team Result Deleted'
                })
            }
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>