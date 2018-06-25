<template>
    <!--<div v-if="editing" class="columns table-row">-->
    <!--<div :id="'meet-' +id" class="column is-1"></div>-->
    <div>
        <div class="columns table-row m-0 px-4">
            <div v-text="id" class="column is-1"></div>
            <div class="column is-5" v-text="meet_name"></div>
            <div class="column is-3" v-text="meet_date"></div>

            <div class="column button-cell">
                <div class="field">

                    <div v-if="showDetails" class="pm-0 tooltip">
                        <a class="button is-text" @click="showDetails=false">
                                                    <span class="icon is-small" style="color:#363636">
                                                        <i class="fas fa-minus"></i>
                                                    </span>
                        </a>
                        <span class="tooltiptext">Hide Meet Details</span>
                    </div>

                    <div v-else class="pm-0 tooltip">
                        <a class="button is-text" @click="showDetails=true">
                                                    <span class="icon is-small" style="color:#363636">
                                                        <i class="fas fa-plus"></i>
                                                    </span>
                        </a>
                        <span class="tooltiptext">Show Meet Details</span>
                    </div>

                    <!--<div class="pm-0 tooltip">-->
                    <!--<a class="button is-text" href="{{ $meet->path() }}">-->
                    <!--<span class="icon is-small" style="color:#73000a;">-->
                    <!--<i class="fas fa-eye"></i>-->
                    <!--</span>-->
                    <!--</a>-->
                    <!--<span class="tooltiptext">Show Meet Results</span>-->
                    <!--</div>-->

                    <div class="pm-0 tooltip">
                        <edit-button @clicked="editing=true"></edit-button>
                        <span class="tooltiptext">Edit Meet Details</span>
                    </div>

                    <div class="pm-0 tooltip">
                        <delete-button @clicked="destroy"></delete-button>
                        <span class="tooltiptext">Delete Meet</span>
                    </div>
                </div>
            </div>
        </div>


        <div v-if="showDetails" class="columns m-p-0">
            <div class="column is-5 is-offset-1 pt-0 pl-4">
                <p class="m-0 has-text-primary"><strong>Host: </strong><span v-text="host"></span></p>
                <p class="m-0 has-text-primary"><strong>Venue: </strong><span v-text="venue"></span></p>
                <p class="m-0 has-text-primary"><strong>Timing: </strong><span v-text="timing"></span></p>
                <p class="m-0 has-text-primary"><strong>Season: </strong><span v-text="season"></span></p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                editing: false,

                id: this.data.id,
                meet_name: this.data.meet_name.meet_name,
                track_meet_name_id: this.data.track_meet_name_id,
                meet_date: this.data.meet_date,
                host_id: this.data.host_id,
                track_venue_id: this.data.track_venue_id,
                timing_method_id: this.data.timing_method_id,
                track_season_id: this.data.track_season_id,

                host: this.data.host.name,
                venue: this.data.venue.name,
                timing: this.data.timing.name,
                season: this.data.season.name,

                showDetails: false

            };
        },

        methods: {
            update() {
                axios.patch('/track/meets/' + this.data.id, {
                    track_meet_name_id: this.track_meet_name_id,
                    meet_date: this.meet_date,
                    host_id: this.host_id,
                    track_venue_id: this.track_venue_id,
                    timing_method_id: this.timing_method_id,
                    track_season_id: this.track_season_id,
                });

                this.editing = false;

                const toast = swal.mixin({
                    toast: true,
                    position: 'bottom-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                toast({
                    type: 'success',
                    title: 'Track Meet Updated'
                })

            },

            destroy() {
                axios.delete('/track/meets/' + this.data.id);

                this.$emit('deleted', this.data.id);
            }
        }
    }
</script>