<template>
    <div>
        <div v-for="(host, index) in items" :key="host.id">
            <host :data="host" @deleted="remove(index)"></host>
        </div>
    </div>
</template>

<script>
    import Host from './Host';

    export default {
        props: ['data'],

        components: { Host },

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
                    title: 'Meet Host Deleted'
                })
            }
        }
    }
</script>