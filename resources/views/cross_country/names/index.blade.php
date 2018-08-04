@extends('layouts.user')

@section('title')
    Cross Country Meet Names
@endsection

@section('content')
    <div class="box table-box p-0" id="trackMeetNameBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Meet Name</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Meet Name</create-button>
            </div>
        </div>

        <cross-country-meet-names :data="{{ $names }}"></cross-country-meet-names>
    </div>
@endsection