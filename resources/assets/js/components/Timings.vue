<template>
    <div>
        <div v-for="(timing, index) in items" :key="timing.id">
            <timing :data="timing" @deleted="remove(index)"></timing>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Timing Method">
            <new-timing-method @created="add"></new-timing-method>
        </create-modal>
    </div>
</template>

<script>
    import Timing from './Timing';
    import NewTimingMethod from './forms/NewTimingMethod';
    import CreateModal from './modals/CreateModal'


    export default {
        props: ['data'],

        components: { Timing, CreateModal, NewTimingMethod },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(timing) {
                this.items.push(timing);
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
                    title: 'Timing Method Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>