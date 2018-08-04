<template>
    <div>
        <div v-for="(name, index) in items" :key="name.id">
            <cross-country-meet-name :data="name" @deleted="remove(index)"></cross-country-meet-name>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Meet Name">
            <new-cross-country-meet-name @created="add"></new-cross-country-meet-name>
        </create-modal>
    </div>
</template>

<script>
    import NewCrossCountryMeetName from '../forms/NewCrossCountryMeetName';
    import CreateModal from '../modals/CreateModal'
    import CrossCountryMeetName from "./CrossCountryMeetName";


    export default {
        props: ['data'],

        components: {CrossCountryMeetName, CreateModal, NewCrossCountryMeetName },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(name) {
                this.items.push(name);
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
                    title: 'Meet Name Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>