<template>

    <form action="/track/meets" method="POST" id="newTrackMeetForm" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">

        <div class="field">
            <label class="label" for="track_meet_name_id">Meet Name</label>
            <div class="control">
                <div class="select is-fullwidth">
                    <select class="is-expanded" name="track_meet_name_id" v-model="form.track_meet_name_id" required>
                        <option value="">Choose one...</option>
                        @foreach ($names as $name)
                        <option v-for="(key, name) in names" v-bind:value="key">
                            {{ status }}
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <!--<div class="field">-->
            <!--<label class="label" for="place">Meet Date</label>-->
            <!--<div class="control">-->
                <!--<input class="input" type="date" class="is-expanded" name="meet_date" value="{{old('meet_date')}}" required>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="field">-->
            <!--<label class="label" for="host">Host</label>-->
            <!--<div class="select is-fullwidth">-->
                <!--<select class="" name="host_id" required>-->
                    <!--<option value="">Choose one...</option>-->
                    <!--@foreach ($hosts as $host)-->
                    <!--<option value="{{$host->id}}" {{old('host_id') == $host->id ? 'selected' :''}}>{{$host->name}}</option>-->
                    <!--@endforeach-->
                <!--</select>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="field">-->
            <!--<label class="label" for="venue">Venue</label>-->
            <!--<div class="select is-fullwidth">-->
                <!--<select class="" name="track_venue_id" required>-->
                    <!--<option value="">Choose one...</option>-->
                    <!--@foreach ($venues as $venue)-->
                    <!--<option-->
                            <!--value="{{$venue->id}}" {{old('track_venue_id') == $venue->id ? 'selected' :''}}>{{$venue->name}}-->
                    <!--</option>-->
                    <!--@endforeach-->
                <!--</select>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="field">-->
            <!--<label class="label" for="timingMethod">Timing</label>-->
            <!--<div class="select is-fullwidth">-->
                <!--<select class="" name="timing_method_id" required>-->
                    <!--<option value="">Choose one...</option>-->
                    <!--@foreach ($timingMethods as $timingMethod)-->
                    <!--<option-->
                            <!--value="{{$timingMethod->id}}" {{old('timing_method_id') == $timingMethod->id ? 'selected' :''}}>{{$timingMethod->name}}</option>-->
                    <!--@endforeach-->
                <!--</select>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="field">-->
            <!--<label class="label" for="timingMethod">Season</label>-->
            <!--<div class="select is-fullwidth">-->
                <!--<select class="" name="track_season_id" required>-->
                    <!--<option value="">Choose one...</option>-->
                    <!--@foreach ($seasons as $season)-->
                    <!--<option-->
                            <!--value="{{$season->id}}" {{old('track_season_id') == $season->id ? 'selected' :''}}>{{$season->name}}</option>-->
                    <!--@endforeach-->
                <!--</select>-->
            <!--</div>-->
        <!--</div>-->

        <div class="control" style="margin-top:25px;">
            <button class="button is-success is-pulled-right" :disabled="form.errors.any()">Add Venue</button>
        </div>

    </form>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    track_meet_name_id: ''

                })
            };
        },

        methods: {
            onSubmit() {
                this.form
                    .post('/track/meets')

                    .then(response => {
                        Vue.swal({
                            position: 'top',
                            type: 'success',
                            title: 'Meet Added Successfully!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        // flash('Venue Added Successfully');
                        Event.$emit('formSubmitted');
                    })

                    .catch(errors => console.log(errors));

            },
        }
    }
</script>