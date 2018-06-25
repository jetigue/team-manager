@extends('layouts.user')

@section('title')
    Track Meets
@endsection

@section('button')

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create New Track Meet">
        <add-new-track-meet></add-new-track-meet>
        {{--@include('meets.track.meets.form')--}}
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true">
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create New Track Meet
    </button>

@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-5">
                <strong>Meet Name</strong>
            </div>
            <div class="column is-3">
                <strong>Date</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <track-meets :data="{{ $meets }}"></track-meets>
    </div>

    {{--<div class="card table-card" id="trackMeetCard">--}}
        {{--<div class="card-content py-0">--}}
            {{--<div class="content">--}}
                {{--<div class="columns table-header">--}}
                    {{--<div class="column is-1 p-2 pl-3">--}}
                        {{--<strong>id</strong>--}}
                    {{--</div>--}}
                    {{--<div class="column is-5 p-2">--}}
                        {{--<strong>Track Meet</strong>--}}
                    {{--</div>--}}
                    {{--<div class="column is-3 p-2">--}}
                        {{--<strong>Date</strong>--}}
                    {{--</div>--}}
                    {{--<div class="column">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@foreach($meets as $meet)--}}
                    {{--<track-meet :attributes="{{$meet}}" inline-template>--}}
                        {{--<div class="my-2 p-0">--}}
                        {{--<div v-if="editing" class="columns table-row">--}}
                            {{--<div class="column is-1 p-2 pl-3">--}}
                                {{--{{$meet->id}}--}}
                            {{--</div>--}}

                            {{--<div class="column is-8">--}}
                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="track_meet_name_id">Name</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<div class="select is-fullwidth">--}}
                                                    {{--<select class="is-expanded" name="track_meet_name_id"--}}
                                                            {{--v-model="track_meet_name_id" required>--}}
                                                        {{--<option value="{{old('track_meet_name_id', $meet->track_meet_name_id)}}">{{ $meet->meetName->meet_name }} </option>--}}
                                                        {{--@foreach ($names as $name)--}}
                                                            {{--<option--}}
                                                                    {{--value="{{$name->id}}" {{old('track_meet_name_id') == $name->id ? 'selected' :''}}>{{$name->meet_name}}--}}
                                                            {{--</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="meet_date">Date</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<input class="input" type="date" class="is-expanded"--}}
                                                       {{--name="meet_date" v-model="meet_date" required>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="host_id">Host</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<div class="select is-fullwidth">--}}
                                                    {{--<select class="is-expanded" name="host_id" v-model="host_id"--}}
                                                            {{--required>--}}
                                                        {{--<option value="{{old('host_id', $meet->host_id)}}">{{ $meet->host->name }} </option>--}}
                                                        {{--@foreach ($hosts as $host)--}}
                                                            {{--<option--}}
                                                                    {{--value="{{$host->id}}" {{old('host_id') == $host->id ? 'selected' :''}}>{{$host->name}}--}}
                                                            {{--</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="track_venue_id">Venue</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<div class="select is-fullwidth">--}}
                                                    {{--<select class="is-expanded" name="track_venue_id"--}}
                                                            {{--v-model="track_venue_id" required>--}}
                                                        {{--<option value="{{old('track_venue_id', $meet->track_venue_id)}}">{{ $meet->venue->name }} </option>--}}
                                                        {{--@foreach ($venues as $venue)--}}
                                                            {{--<option--}}
                                                                    {{--value="{{$venue->id}}" {{old('track_venue_id') == $venue->id ? 'selected' :''}}>{{$venue->name}}--}}
                                                            {{--</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="timing_method_id">Timing</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<div class="select is-fullwidth">--}}
                                                    {{--<select class="is-expanded" name="timing_method_id"--}}
                                                            {{--v-model="timing_method_id" required>--}}
                                                        {{--<option value="{{old('timing_method_id', $meet->timing_method_id)}}">{{ $meet->timing->name }} </option>--}}
                                                        {{--@foreach ($timingMethods as $timingMethod)--}}
                                                            {{--<option--}}
                                                                    {{--value="{{$timingMethod->id}}" {{old('timing_method_id') == $timingMethod->id ? 'selected' :''}}>{{$timingMethod->name}}--}}
                                                            {{--</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label is-normal">--}}
                                        {{--<label class="label" for="track_season_id">Season</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field">--}}
                                            {{--<div class="control">--}}
                                                {{--<div class="select is-fullwidth">--}}
                                                    {{--<select class="is-expanded" name="track_season_id"--}}
                                                            {{--v-model="track_season_id" required>--}}
                                                        {{--<option value="{{old('track_season_id', $meet->track_season_id)}}">{{ $meet->season->name }} </option>--}}
                                                        {{--@foreach ($seasons as $season)--}}
                                                            {{--<option--}}
                                                                    {{--value="{{$season->id}}" {{old('timing_method_id') == $season->id ? 'selected' :''}}>{{$season->name}}--}}
                                                            {{--</option>--}}
                                                        {{--@endforeach--}}
                                                    {{--</select>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="field is-horizontal">--}}
                                    {{--<div class="field-label"><!--left empty for spacing--></div>--}}
                                    {{--<div class="field-body">--}}
                                        {{--<div class="field is-grouped">--}}
                                            {{--<div class="control">--}}
                                                {{--<button class="button is-success is-small is-rounded" @click="update">--}}
                                                    {{--Update--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                            {{--<div class="control">--}}
                                                {{--<button class="button is-light is-small is-rounded"--}}
                                                        {{--@click="editing=false">--}}
                                                    {{--Cancel--}}
                                                {{--</button>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div v-else class="columns table-row">--}}
                            {{--<div class="column is-1 py-2 pl-3">--}}
                                {{--{{$meet->id}}--}}
                            {{--</div>--}}
                            {{--<div class="column is-5 py-2" v-text="meet_name"></div>--}}
                            {{--<div class="column is-5 py-2" v-text="meet_name.meet_name">{{$meet->meetName->meet_name}}</div>--}}
                            {{--<div class="column is-3 py-2" v-text="meet_date"></div>--}}

                            {{--<div class="column p-0 button-cell">--}}
                                {{--<div class="field">--}}

                                    {{--<div v-if="showDetails" class="pm-0 tooltip">--}}
                                        {{--<a class="button is-text" @click="showDetails=false">--}}
                                                    {{--<span class="icon is-small" style="color:#363636">--}}
                                                        {{--<i class="fas fa-minus"></i>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<span class="tooltiptext">Hide Meet Details</span>--}}
                                    {{--</div>--}}

                                    {{--<div v-else class="pm-0 tooltip">--}}
                                        {{--<a class="button is-text" @click="showDetails=true">--}}
                                                    {{--<span class="icon is-small" style="color:#363636">--}}
                                                        {{--<i class="fas fa-plus"></i>--}}
                                                    {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<span class="tooltiptext">Show Meet Details</span>--}}
                                    {{--</div>--}}

                                    {{--<div class="pm-0 tooltip">--}}
                                        {{--<a class="button is-text" href="{{ $meet->path() }}">--}}
                                                {{--<span class="icon is-small" style="color:#73000a;">--}}
                                                    {{--<i class="fas fa-eye"></i>--}}
                                                {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<span class="tooltiptext">Show Meet Results</span>--}}
                                    {{--</div>--}}

                                    {{--<div class="pm-0 tooltip">--}}
                                        {{--<a class="button is-text" @click="editing=true">--}}
                                                {{--<span class="icon is-small" style="color:blue;">--}}
                                                    {{--<i class="fas fa-pencil-alt"></i>--}}
                                                {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<span class="tooltiptext">Edit Meet Details</span>--}}
                                    {{--</div>--}}

                                    {{--<div class="pm-0 tooltip">--}}
                                        {{--<a class="button is-text tooltip" @click="destroy">--}}
                                                {{--<span class="icon is-small" style="color:red;">--}}
                                                    {{--<i class="far fa-trash-alt"></i>--}}
                                                {{--</span>--}}
                                        {{--</a>--}}
                                        {{--<span class="tooltiptext">Delete Meet</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div v-if="showDetails" class="columns m-p-0">--}}
                            {{--<div class="column is-5 is-offset-1 pt-0 pl-4">--}}
                                {{--<p class="m-0 has-text-primary"><strong>Host: </strong><span v-text="host"></span></p>--}}
                                {{--<p class="m-0 has-text-primary"><strong>Venue: </strong><span v-text="venue"></span></p>--}}
                                {{--<p class="m-0 has-text-primary"><strong>Timing: </strong><span v-text="timing"></span></p>--}}
                                {{--<p class="m-0 has-text-primary"><strong>Season: </strong><span v-text="season"></span></p>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--</div>--}}
                    {{--</track-meet>--}}
                {{--@endforeach--}}
            {{--</div>--}}

@endsection



