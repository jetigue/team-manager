<template>
    <form action="/api/track/meets" method="POST" id="newTrackMeet" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label">Meet Name</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="track_meet_name_id" v-model="form.track_meet_name_id" required>
                        <option
                                v-for="meetName in meetNames"
                                :value="meetName.id">{{meetName.name}}
                        </option>
                    </select>
                    <span id="nameHelp" class="help is-danger" v-if="form.errors.has('track_meet_name_id')"
                          v-text="form.errors.get('track_meet_name_id')"></span>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Date</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <input class="input" type="date"
                           name="meet_date" v-model="form.meet_date" required>
                    <span id="dateHelp" class="help is-danger" v-if="form.errors.has('meet_date')"
                          v-text="form.errors.get('meet_date')"></span>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Meet Host</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="host_id" v-model="form.host_id" required>
                        <option
                                v-for="host in hosts"
                                :value="host.id">{{host.name}}
                        </option>
                    </select>
                    <span id="hostHelp" class="help is-danger" v-if="form.errors.has('host_id')"
                          v-text="form.errors.get('host_id')"></span>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Meet Venue</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="track_venue_id" v-model="form.track_venue_id" required>
                        <option
                                v-for="venue in venues"
                                :value="venue.id">{{venue.name}}
                        </option>
                    </select>
                    <span id="venueHelp" class="help is-danger" v-if="form.errors.has('track_venue_id')"
                          v-text="form.errors.get('track_venue_id')"></span>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Timing Method</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="timing_method_id" v-model="form.timing_method_id" required>
                        <option
                                v-for="timing in timings"
                                :value="timing.id">{{timing.name}}
                        </option>
                    </select>
                    <span id="timingHelp" class="help is-danger" v-if="form.errors.has('timing_method_id')"
                          v-text="form.errors.get('timing_method_id')"></span>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">Track Season</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="track_season_id" v-model="form.track_season_id" required>
                        <option
                                v-for="season in seasons"
                                :value="season.id">{{season.name}}
                        </option>
                    </select>
                    <span id="seasonHelp" class="help is-danger" v-if="form.errors.has('track_season_id')"
                          v-text="form.errors.get('track_season_id')"></span>
                </div>
            </div>
        </div>

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Track Meet</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    track_meet_name_id: '',
                    host_id: '',
                    meet_date: '',
                    track_venue_id: '',
                    track_season_id: '',
                    timing_method_id: ''
                }),

                meetNames: [],
                hosts: [],
                venues: [],
                timings: [],
                seasons: []
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/api/track/meets', {

                    })

                    .then(data => {

                        Event.$emit('formSubmitted');

                        const toast = swal.mixin({
                            toast: true,
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        toast({
                            type: 'success',
                            title: 'New Track Meet Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            }
        },

        created() {
            function getMeetNames() {
                return axios.get('/api/track/meet/names')
            }

            function getHostNames() {
                return axios.get('/api/meet_properties/hosts')
            }

            function getVenueNames() {
                return axios.get('/api/track/venues')
            }

            function getTimingMethods() {
                return axios.get('/api/meet_properties/timing')
            }

            function getTrackSeasons() {
                return axios.get('/api/track/seasons')
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
                }))
                .catch(errors => {
                    console.log(errors)
                });
        }
    }
</script>