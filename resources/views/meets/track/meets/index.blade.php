@extends('layouts.user')

@section('title')
    Track Meets
@endsection

@section('button')

    <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create New Track Meet">
       {{--<add-new-track-meet></add-new-track-meet>--}}
        @include('meets.track.meets.form')
    </form-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true">
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create New Track Meet
    </button>

@endsection

@section('content')
    <table class="table table-is-hoverable is-narrow-mobile">
        <thead class="thead-light">
        <tr>
            <th>Meet Name</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Host</th>
        </tr>
        </thead>
        <tbody>
        @foreach($meets as $meet)
            <tr>
                <td>
                    <a href="{{ $meet->path() }}">{{$meet->meetName->meet_name}}</a>
                </td>
                <td>{{date('n-j-y', strtotime($meet->meet_date))}}</td>
                <td>{{$meet->venue->name}}</td>
                <td>{{$meet->host->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

{{--@section('form')--}}
{{--<div class="card">--}}
{{--<div class="card-header">--}}
{{--Add Team Result--}}
{{--</div>--}}
{{--<div class="card-body">--}}
{{----}}
{{--<form method="POST" action="/track/meets">--}}
{{--@csrf--}}
{{--@include('layouts.errors')--}}
{{--<div class="form-group">--}}
{{--<label for="track_meet_name_id">Meet Name</label>--}}
{{--<select class="form-control" name="track_meet_name_id" required>--}}
{{--<option value="">Choose one...</option>--}}
{{--@foreach ($names as $name)--}}
{{--<option value="{{$name->id}}">{{$name->meet_name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="place">Meet Date</label>--}}
{{--<input type="date" class="form-control" name="meet_date" required>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="host">Host</label>--}}
{{--<select class="form-control" name="host_id" required>--}}
{{--<option value="">Choose one...</option>--}}
{{--@foreach ($hosts as $host)--}}
{{--<option value="{{$host->id}}">{{$host->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="venue">Venue</label>--}}
{{--<select class="form-control" name="track_venue_id" required>--}}
{{--<option value="">Choose one...</option>--}}
{{--@foreach ($venues as $venue)--}}
{{--<option value="{{$venue->id}}">{{$venue->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="timingMethod">Timing</label>--}}
{{--<select class="form-control" name="timing_method_id" required>--}}
{{--<option value="">Choose one...</option>--}}
{{--@foreach ($timingMethods as $timingMethod)--}}
{{--<option value="{{$timingMethod->id}}">{{$timingMethod->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}

{{--<div class="form-group">--}}
{{--<label for="timingMethod">Season</label>--}}
{{--<select class="form-control" name="track_season_id" required>--}}
{{--<option value="">Choose one...</option>--}}
{{--@foreach ($seasons as $season)--}}
{{--<option value="{{$season->id}}">{{$season->name}}</option>--}}
{{--@endforeach--}}
{{--</select>--}}
{{--</div>--}}
{{--<hr>--}}

{{--<div class="form-group">--}}
{{--<button type="submit" class="btn btn-primary">Add Meet</button>--}}
{{--</div>--}}

{{--</form>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
