<template>
    <form action="/cross-country/meets" method="POST" id="newCrossCountryMeet" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label">Meet Name</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="track_meet_name_id" v-model="form.cross_country_meet_name_id" required>
                        <option
                                v-for="meetName in meetNames"
                                :value="meetName.id">{{meetName.name}}
                        </option>
                    </select>
                    <span id="nameHelp" class="help is-danger" v-if="form.errors.has('cross_country_meet_name_id')"
                          v-text="form.errors.get('cross_country_meet_name_id')"></span>
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
                    <select name="cross_country_venue_id" v-model="form.cross_country_venue_id" required>
                        <option
                                v-for="venue in venues"
                                :value="venue.id">{{venue.name}}
                        </option>
                    </select>
                    <span id="venueHelp" class="help is-danger" v-if="form.errors.has('cross_country_venue_id')"
                          v-text="form.errors.get('cross_country_venue_id')"></span>
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

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Cross Country Meet</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    cross_country_meet_name_id: '',
                    host_id: '',
                    meet_date: '',
                    cross_country_venue_id: '',
                    timing_method_id: ''
                }),

                meetNames: [],
                hosts: [],
                venues: [],
                timings: []
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/cross-country/meets', {

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
                            title: 'New Cross Country Meet Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
            }
        },

        created() {
            function getMeetNames() {
                return axios.get('/api/cross-country/meet/names')
            }

            function getHostNames() {
                return axios.get('/api/meet-properties/hosts')
            }

            function getVenueNames() {
                return axios.get('/api/cross-country/venues')
            }

            function getTimingMethods() {
                return axios.get('/api/meet-properties/timing-methods')
            }

            axios.all([
                getMeetNames(),
                getHostNames(),
                getVenueNames(),
                getTimingMethods()
            ])
                .then(axios.spread((
                    namesResponse,
                    hostsResponse,
                    venuesResponse,
                    TimingsResponse
                ) => {
                    this.meetNames = namesResponse.data;
                    this.hosts = hostsResponse.data;
                    this.venues = venuesResponse.data;
                    this.timings = TimingsResponse.data;
                }))
                .catch(errors => {
                    console.log(errors)
                });
        }
    }
</script>