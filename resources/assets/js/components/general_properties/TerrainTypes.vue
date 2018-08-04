<template>
    <div>
        <div v-for="(terrain, index) in items" :key="terrain.id">
            <terrain-type :data="terrain" @deleted="remove(index)" @updated="add"></terrain-type>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Terrain Type">
            <new-terrain-type @created="add"></new-terrain-type>
        </create-modal>
    </div>
</template>

<script>
    import TerrainType from './TerrainType';
    import NewTerrainType from '../forms/NewTerrainType';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { TerrainType, CreateModal, NewTerrainType },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(terrain) {
                this.items.push(terrain);
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
                    title: 'Terrain Type Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
