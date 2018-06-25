<template>
    <div>
        <div v-for="(season, index) in items" :key="season.id">
            <track-season :data="season" @deleted="remove(index)"></track-season>
        </div>
    </div>
</template>

<script>
    import TrackSeason from './TrackSeason';

    export default {
        props: ['data'],

        components: { TrackSeason },

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
                    title: 'Season Deleted'
                })
            }
        }
    }
</script>
