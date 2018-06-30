<template>
    <div>
        <div v-for="(division, index) in items" :key="division.id">
            <division :data="division" @deleted="remove(index)" @updated="add"></division>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Meet Division">
            <new-division @created="add"></new-division>
        </create-modal>
    </div>
</template>

<script>
    import Division from './Division';
    import NewDivision from './forms/NewDivision';
    import CreateModal from './modals/CreateModal'


    export default {
        props: ['data'],

        components: { Division, CreateModal, NewDivision },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(division) {
                this.items.push(division);
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
                    title: 'Division Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);

            // Event.$on('updated', () => this.items.push(division));
        }
    }
</script>
