@extends('layouts.user')

@section('title')
    Cross Country Meets
@endsection

@section('content')
    <div class="box table-box p-0" id="crossCountryMeetBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Meet Name</strong>
            </div>
            <div class="column is-2">
                <strong>Date</strong>
            </div>
            <div class="column is-2 is-offset-1 create-button-container">
                <create-button>Create Meet Name</create-button>
            </div>
        </div>

        <cross-country-meets :data="{{ $meets }}"></cross-country-meets>
    </div>


@endsection

