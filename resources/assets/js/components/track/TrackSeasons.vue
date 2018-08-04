<template>
    <div>
        <div v-for="(season, index) in items" :key="season.id">
            <track-season :data="season" @deleted="remove(index)"></track-season>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Season">
            <new-track-season @created="add"></new-track-season>
        </create-modal>
    </div>
</template>

<script>
    import TrackSeason from './TrackSeason';
    import NewTrackSeason from '../forms/NewTrackSeason';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { TrackSeason, CreateModal, NewTrackSeason },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(season) {
                this.items.push(season);
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
                    title: 'Track Season Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
