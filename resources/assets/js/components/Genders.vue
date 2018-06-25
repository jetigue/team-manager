<template>
    <div>
        <div v-for="(gender, index) in items" :key="gender.id">
            <gender :data="gender" @deleted="remove(index)"></gender>
        </div>
    </div>
</template>

<script>
    import Gender from './Gender';

    export default {
        props: ['data'],

        components: { Gender },

        data() {
            return {
                items: this.data
            }
        },

        methods: {
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
            }
        }
    }
</script>