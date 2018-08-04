@extends('layouts.user')

@section('title')
    Cross Country Venues
@endsection

@section('content')
    <div class="box table-box p-0" id="crossCountryVenueBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1">
                <strong>id</strong>
            </div>
            <div class="column is-5">
                <strong>Venue Name</strong>
            </div>
            <div class="column is-2">
                <strong>City</strong>
            </div>
            <div class="column is-1">
                <strong>State</strong>
            </div>
            <div class="column is-2 is-offset-1 create-button-container">
                <create-button>Create Venue</create-button>
            </div>
        </div>

        <cross-country-venues :data="{{ $venues }}"></cross-country-venues>
    </div>
@endsection