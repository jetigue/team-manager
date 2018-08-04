<template>
    <div>
        <div v-for="(effort, index) in items" :key="effort.id">
            <run-effort :data="effort" @deleted="remove(index)" @updated="add"></run-effort>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Run Effort">
            <new-run-effort @created="add"></new-run-effort>
        </create-modal>
    </div>
</template>

<script>
    import RunEffort from './RunEffort';
    import NewRunEffort from '../forms/NewRunEffort';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { RunEffort, CreateModal, NewRunEffort },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(effort) {
                this.items.push(effort);
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
                    title: 'Run Effort Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
