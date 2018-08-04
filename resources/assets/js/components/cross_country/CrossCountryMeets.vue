<template>
    <div>
        <div v-for="(meet, index) in items" :key="meet.id">
            <cross-country-meet :data="meet" @deleted="remove(index)"></cross-country-meet>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Meet">
            <new-cross-country-meet @created="add"></new-cross-country-meet>
        </create-modal>
    </div>
</template>

<script>
    import CrossCountryMeet from './CrossCountryMeet';
    import CreateModal from '../modals/CreateModal'
    import NewCrossCountryMeet from '../forms/NewCrossCountryMeet';

    export default {
        props: ['data'],

        components: { CrossCountryMeet, CreateModal, NewCrossCountryMeet },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(meet) {
                this.items.push(meet);
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
                    title: 'Cross Country Meet Deleted'
                })
            }
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>