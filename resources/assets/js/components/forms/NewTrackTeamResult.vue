<template>
    <form :action="endpoint" method="POST" id="newTrackTeamResult" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label">Gender</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="gender_id" v-model="form.gender_id" required>
                        <option
                                v-for="gender in genders"
                                :value="gender.id">{{gender.name}}
                        </option>
                    </select>
                    <span id="genderHelp" class="help is-danger" v-if="form.errors.has('gender_id')"
                          v-text="form.errors.get('gender_id')"></span>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Division</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select name="division_id" v-model="form.division_id" required>
                        <option
                                v-for="division in divisions"
                                :value="division.id">{{division.name}}
                        </option>
                    </select>
                    <span id="divisionHelp" class="help is-danger" v-if="form.errors.has('division_id')"
                          v-text="form.errors.get('division_id')"></span>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">Place</label>
            <div class="control">
                <input type="number"
                       class="input"
                       name="place"
                       id="place"
                       min="1"
                       v-model="form.place">
                <span id="nameHelp" class="help is-danger" v-if="form.errors.has('place')"
                      v-text="form.errors.get('place')"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Number of Teams</label>
            <div class="control">
                <input type="number"
                       class="input"
                       name="number_teams"
                       id="number_teams"
                       min="1"
                       v-model="form.number_teams">
                <span id="numberTeamsHelp" class="help is-danger" v-if="form.errors.has('number_teams')"
                      v-text="form.errors.get('number_teams')"></span>
            </div>
        </div>
        <div class="field">
            <label class="label">Points</label>
            <div class="control">
                <input type="number"
                       class="input"
                       name="points"
                       id="points"
                       min="1"
                       v-model="form.points">
                <span id="pointsHelp" class="help is-danger" v-if="form.errors.has('points')"
                      v-text="form.errors.get('points')"></span>
            </div>
        </div>
        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Create Meet Name</button>
        </div>

    </form>
</template>

<script>
    export default {
        props: ['endpoint'],

        data() {
            return {
                form: new Form({
                    gender_id: '',
                    division_id: '',
                    place: '',
                    number_teams: '',
                    points: ''
                }),

                genders: [],
                divisions: [],
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post(this.endpoint)

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
                            title: 'Team Results Created'
                        });

                        this.$emit('created', data)

                    })

                    .catch(errors => console.log(errors));
                }
            },

            mounted() {
                function getGenderNames() {
                    return axios.get('/meet_properties/genders')
                }

                function getDivisionNames() {
                    return axios.get('/meet_properties/divisions')
                }

                axios.all([
                    getGenderNames(),
                    getDivisionNames()
                ])
                    .then(axios.spread((
                        gendersResponse,
                        divisionsResponse
                    ) => {
                        console.log(gendersResponse);
                        this.genders = gendersResponse.data;
                        this.divisions = divisionsResponse.data;
                    }))
                    .catch(errors => {
                        console.log(errors)
                    });
            }
    }
</script>