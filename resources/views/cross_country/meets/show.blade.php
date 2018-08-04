@extends('layouts.user')

@section('title')
	Cross Country Meet
@endsection

@section('content')
    <h1 class="title is-3">{{$meet->name->name}}</h1>
    <h3 class="subtitle is-5 ml-5">{{date('F j, Y', strtotime($meet->meet_date))}}</h3>

    <div class="meet-details px-5 py-0 mb-8">
        <p class="m-p-0"><span style="font-weight:bold">Host:</span> {{$meet->host->name}}</p>
        <p class="m-p-0"><span style="font-weight:bold">Venue:</span> {{$meet->venue->name}}</p>
        <p class="m-p-0"><span style="font-weight:bold">Timing:</span> {{$meet->timing->name}}</p>
        <p class="m-p-0"><span style="font-weight:bold">Season:</span> {{$meet->season->name}}</p>
    </div>

    <div class="box table-box p-0" id="crossCountryMeetBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-2">
                <strong>Gender</strong>
            </div>
            <div class="column is-2">
                <strong>Division</strong>
            </div>
            <div class="column is-2">
                <strong>Place</strong>
            </div>
            <div class="column is-2">
                <strong>Points</strong>
            </div>
            <div class="column is-2 is-offset-2 create-button-container">
                <create-button>Create Meet Results</create-button>
            </div>
        </div>
        @if (count($meet->teamResults) === 0)
            <hr>
            <p><strong>No Team Results Entered</strong></p>

        @else
        <cross-country-team-results :data="{{ $meet->teamResults->load('gender', 'division') }}"></cross-country-team-results>
    </div>
        @endif

@endsection