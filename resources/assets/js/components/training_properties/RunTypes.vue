<template>
    <div>
        <div v-for="(type, index) in items" :key="type.id">
            <run-type :data="type" @deleted="remove(index)" @updated="add"></run-type>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Run Type">
            <new-run-type @created="add"></new-run-type>
        </create-modal>
    </div>
</template>

<script>
    import RunType from './RunType';
    import NewRunType from '../forms/NewRunType';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { RunType, CreateModal, NewRunType },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(type) {
                this.items.push(type);
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
                    title: 'Run Type Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
