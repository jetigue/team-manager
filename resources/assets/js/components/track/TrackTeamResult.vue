<template>
    <div v-if="editing" class="columns table-row m-0 px-4">
        <div class="column is-9 is-offset-1">
            <form :action="endpoint" method="POST" id="editTrackTeamResult" class="table-form"
                  @submit.prevent="update" @keydown="form.errors.clear($event.target.name)">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Gender:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="gender_id" v-model="form.gender_id" required>
                                        <option
                                                v-for="gender in genders"
                                                :value="gender.id">{{gender.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Division Name:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control is-expanded">
                                <div class="select is-fullwidth">
                                    <select name="division_id" v-model="form.division_id" required>
                                        <option
                                                v-for="division in divisions"
                                                :value="division.id">{{division.name}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Place:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input is-expanded" type="number"
                                       name="place" min="1" v-model="form.place">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label"># of Teams:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input is-expanded" type="number"
                                       name="number_teams" min="2" v-model="form.number_teams">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Points:</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input class="input is-expanded" type="number"
                                       name="points" min="0" v-model="form.points">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field is-horizontal">
                    <div class="field-label"></div>
                    <div class="field-body">
                        <div class="field is-grouped">
                            <div class="control">
                                <update-button :disabled="form.errors.any()"></update-button>
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

<div v-else>
    <div class="columns table-row m-0 px-4">
        <div class="column is-2" v-text="gender"></div>
        <div class="column is-2" v-text="division"></div>
        <div class="column is-2"> {{ place }}/{{ number_teams}}</div>
        <div class="column is-2" v-text="points"></div>
        <div class="column button-cell is-2 is-offset-2">
            <div class="field is-grouped">
                <edit-button @clicked="getNames"></edit-button>
                <delete-button @clicked="destroy"></delete-button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        props: ['data', 'endpoint'],

        data() {
            return {
                id: this.data.id,
                gender: this.data.gender.name,
                division: this.data.division.name,
                place: this.data.place,
                number_teams: this.data.number_teams,
                points: this.data.points,

                form: new Form({
                    gender_id: this.data.gender_id,
                    division_id: this.data.division_id,
                    place: this.data.place,
                    number_teams: this.data.number_teams,
                    points: this.data.points
                }),

                genders: [],
                divisions: [],

                editing: false,
                showDetails: false,

            };
        },

        methods: {
            update() {
                this.form
                    .patch(this.endpoint + '/results/' + this.data.id)
                    .then(() => {
                        this.gender_id = this.form.gender_id;
                        this.division_id = this.form.gender_id;
                        this.place = this.form.place;
                        this.number_teams = this.form.number_teams;
                        this.points = this.form.points;
                        this.gender = this.genders.find(gender => gender.id === this.form.gender_id).name;
                        this.division = this.divisions.find(division => division.id === this.form.division_id).name;

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
                axios.delete('/track/team/results/' + this.data.id);

                this.$emit('deleted', this.data.id);
            },

            resetForm() {
                location.reload();
            },

            getNames() {
                this.editing = true;

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
                        this.genders = gendersResponse.data;
                        this.divisions = divisionsResponse.data;
                    }));
            }
        }
    }
</script>