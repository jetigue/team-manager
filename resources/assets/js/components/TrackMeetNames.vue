<template>
    <div>
        <div v-for="(name, index) in items" :key="name.id">
            <track-meet-name :data="name" @deleted="remove(index)"></track-meet-name>
        </div>
    </div>
</template>

<script>
    import TrackMeetName from './TrackMeetName';

    export default {
        props: ['data'],

        components: { TrackMeetName },

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
                    title: 'Meet Name Deleted'
                })
            }
        }
    }
</script>