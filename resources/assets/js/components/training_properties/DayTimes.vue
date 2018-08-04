<template>
    <div>
        <div v-for="(time, index) in items" :key="time.id">
            <day-time :data="time" @deleted="remove(index)" @updated="add"></day-time>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Day Time">
            <new-day-time @created="add"></new-day-time>
        </create-modal>
    </div>
</template>

<script>
    import DayTime from './DayTime';
    import NewDayTime from '../forms/NewDayTime';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { DayTime, CreateModal, NewDayTime },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(time) {
                this.items.push(time);
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
                    title: 'Day Time Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>
