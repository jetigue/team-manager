<template>
    <div>
        <div v-for="(season, index) in items" :key="season.id">
            <season :data="season" @deleted="remove(index)" @updated="add"></season>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Season">
            <new-season @created="add"></new-season>
        </create-modal>
    </div>
</template>

<script>
    import Season from './Season';
    import NewSeason from '../forms/NewSeason';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { Season, CreateModal, NewSeason },

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
                    title: 'Season Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
