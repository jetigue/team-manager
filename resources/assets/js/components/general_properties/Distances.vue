<template>
    <div>
        <div v-for="(distance, index) in items" :key="distance.id">
            <distance :data="distance" @deleted="remove(index)" @updated="add"></distance>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Distance">
            <new-distance @created="add"></new-distance>
        </create-modal>
    </div>
</template>

<script>
    import Distance from './Distance';
    import NewDistance from '../forms/NewDistance';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { Distance, CreateModal, NewDistance },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(distance) {
                this.items.push(distance);
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
                    title: 'Distance Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
