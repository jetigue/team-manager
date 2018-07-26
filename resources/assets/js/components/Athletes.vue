<template>
    <div>
        <div v-for="(athlete, index) in items" :key="athlete.id">
            <athlete :data="athlete" @deleted="remove(index)"></athlete>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create New Athlete">
            <new-athlete @created="add"></new-athlete>
        </create-modal>
    </div>
</template>

<script>
    import Athlete from './Athlete';
    import CreateModal from './modals/CreateModal';
    import NewAthlete from './forms/NewAthlete';

    export default {
        props: ['data'],

        components: { Athlete, CreateModal, NewAthlete },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(athlete) {
                this.items.push(athlete);
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
                    title: 'Athlete Deleted'
                })
            }
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
