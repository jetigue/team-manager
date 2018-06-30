<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column is-9">
            <form action="/track/meets" method="POST" id="editTrackMeet" @submit.prevent="update"
                  @keydown="form.errors.clear($event.target.name)">

                <!--<select-track-meet-name></select-track-meet-name>-->

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Meet Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="track_meet_name_id" v-model="nameSelected" :value="nameSelected">
                                        <option
                                            v-for="meetName in meetNames"
                                                :value="meetName.id">{{meetName.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Date</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input is-expanded" type="date"
                                       name="meet_date" v-model="meet_date" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Host Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="host_id" v-model="hostSelected" :value="hostSelected">
                                        <option v-for="host in hosts"
                                                :value="host.id">{{host.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Venue Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="track_venue_id" v-model="venueSelected" :value="venueSelected">
                                        <option v-for="venue in venues"
                                                :value="venue.id">{{venue.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Timing Method:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="timing_method_id" v-model="timingSelected" :value="timingSelected">
                                        <option v-for="timing in timings"
                                                :value="timing.id">{{timing.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Track Season:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="timing_method_id" v-model="seasonSelected" :value="seasonSelected">
                                        <option v-for="season in seasons"
                                                :value="season.id">{{season.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <update-button @clicked="update" :disabled="form.errors.any()"></update-button>
                            </div>
                            <div class="control">
                                <cancel-button @clicked="resetForm"></cancel-button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div v-else class="columns table-row m-0 px-4">
        <div v-text="id" class="column is-1"></div>
        <div class="column is-5" v-text="name"></div>
        <div class="column is-3" v-text="meet_date"></div>

        <div class="column button-cell">
            <!--<div class="field">-->

            <!--<div v-if="showDetails" class="pm-0 tooltip">-->
            <!--<a class="button is-text" @click="showDetails=false">-->
            <!--<span class="icon is-small" style="color:#363636">-->
            <!--<i class="fas fa-minus"></i>-->
            <!--</span>-->
            <!--</a>-->
            <!--<span class="tooltiptext">Hide Meet Details</span>-->
            <!--</div>-->

            <!--<div v-else class="pm-0 tooltip">-->
            <!--<a class="button is-text" @click="showDetails=true">-->
            <!--<span class="icon is-small" style="color:#363636">-->
            <!--<i class="fas fa-plus"></i>-->
            <!--</span>-->
            <!--</a>-->
            <!--<span class="tooltiptext">Show Meet Details</span>-->
            <!--</div>-->

            <!--<div class="pm-0 tooltip">-->
            <!--<a class="button is-text" href="{{ $meet->path() }}">-->
            <!--<span class="icon is-small" style="color:#73000a;">-->
            <!--<i class="fas fa-eye"></i>-->
            <!--</span>-->
            <!--</a>-->
            <!--<span class="tooltiptext">Show Meet Results</span>-->
            <!--</div>-->
            <edit-button @clicked="getNames"></edit-button>
            <delete-button @clicked="destroy"></delete-button>
        </div>
    </div>
    <!--<div v-if="showDetails" class="columns m-p-0">-->
    <!--<div class="column is-5 is-offset-1 pt-0 pl-4">-->
    <!--<p class="m-0 has-text-primary"><strong>Host: </strong><span v-text="host"></span></p>-->
    <!--<p class="m-0 has-text-primary"><strong>Venue: </strong><span v-text="venue"></span></p>-->
    <!--<p class="m-0 has-text-primary"><strong>Timing: </strong><span v-text="timing"></span></p>-->
    <!--<p class="m-0 has-text-primary"><strong>Season: </strong><span v-text="season"></span></p>-->
    <!--</div>-->
    <!--</div>-->
</template>

<script>
    import EditButton from './buttons/EditButton';
    import DeleteButton from './buttons/DeleteButton';
    import SelectTrackMeetName from "./forms/selects/SelectTrackMeetName";

    export default {
        props: ['data'],

        components: {
            'select-track-meet-name': SelectTrackMeetName,
            'edit-button': EditButton,
            'delete-button': DeleteButton,
        },

        data() {
            return {
                editing: false,

                id: this.data.id,
                name: this.data.name.name,
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

                showDetails: false,

                form: new Form({
                    name_id: this.data.name.id,
                    name: this.data.name,
                    host: this.data.host,
                    venue: this.data.venue
                }),

                nameSelected: this.data.name.id,
                hostSelected: this.data.host.id,
                venueSelected: this.data.venue.id,
                timingSelected: this.data.timing.id,
                seasonSelected: this.data.season.id,

                meetNames: [],
                hosts: [],
                venues: [],
                timings: [],
                seasons: []
            };
        },

        methods: {
            update() {
                this.form
                    .patch('/track/meets/' + this.data.id)
                    .then(data => {
                        this.name = this.form.name;
                        this.editing = false;

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'Track Meet Updated'
                        })
                    })
                    .catch(errors => {
                        console.log(errors);
                    });
            },

            destroy() {
                axios.delete('/track/meets/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                // this.form = {
                //     name: this.data.name
                // };

                location.reload();
            },

            getNames() {
                this.editing= true;

                function getMeetNames() {
                    return axios.get('/track/meet/names')
                }

                function getHostNames() {
                    return axios.get('/meets/hosts')
                }

                function getVenueNames() {
                    return axios.get('/track/venues')
                }

                function getTimingMethods() {
                    return axios.get('/meets/timing')
                }

                function getTrackSeasons() {
                    return axios.get('/track/seasons')
                }

                axios.all([
                    getMeetNames(),
                    getHostNames(),
                    getVenueNames(),
                    getTimingMethods(),
                    getTrackSeasons()
                ])
                    .then(axios.spread((
                        namesResponse,
                        hostsResponse,
                        venuesResponse,
                        TimingsResponse,
                        SeasonsResponse
                    ) => {
                        this.meetNames = namesResponse.data;
                        this.hosts = hostsResponse.data;
                        this.venues = venuesResponse.data;
                        this.timings = TimingsResponse.data;
                        this.seasons = SeasonsResponse.data;
                    }));

            }
        },
    }
</script>