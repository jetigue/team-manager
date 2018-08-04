<template>
    <div>
        <div v-for="(gender, index) in items" :key="gender.id">
            <gender :data="gender" @deleted="remove(index)"></gender>
        </div>
        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Gender">
            <new-gender @created="add"></new-gender>
        </create-modal>
    </div>
</template>

<script>
    import Gender from './Gender';
    import NewGender from '../forms/NewGender';
    import CreateModal from '../modals/CreateModal'


    export default {
        props: ['data'],

        components: { Gender, CreateModal, NewGender },

        data() {
            return {
                items: this.data,
                showCreateModal: false,
            }
        },

        methods: {

            add(gender) {
                this.items.push(gender);
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
                    title: 'Gender Deleted'
                })
            },
        },

        created() {
            Event.$on('clicked', () => this.showCreateModal=true);
        }
    }
</script>