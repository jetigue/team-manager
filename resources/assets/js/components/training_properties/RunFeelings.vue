<template>
    <div>
        <div v-for="(feeling, index) in items" :key="feeling.id">
            <run-feeling :data="feeling" @deleted="remove(index)" @updated="add"></run-feeling>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Run Feeling">
            <new-run-feeling @created="add"></new-run-feeling>
        </create-modal>
    </div>
</template>

<script>
    import RunFeeling from './RunFeeling';
    import NewRunFeeling from '../forms/NewRunFeeling';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { RunFeeling, CreateModal, NewRunFeeling },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(feeling) {
                this.items.push(feeling);
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
                    title: 'Run Feeling Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
