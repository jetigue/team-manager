<template>
    <div>
        <div v-for="(host, index) in items" :key="host.id">
            <host :data="host" @deleted="remove(index)"></host>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Meet Host">
            <new-meet-host @created="add"></new-meet-host>
        </create-modal>
    </div>
</template>

<script>
    import Host from './Host';
    import NewMeetHost from './forms/NewMeetHost';
    import CreateModal from './modals/CreateModal'


    export default {
        props: ['data'],

        components: { Host, CreateModal, NewMeetHost },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(host) {
                this.items.push(host);
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
                    title: 'Host Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>