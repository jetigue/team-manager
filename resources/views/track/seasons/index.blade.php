@extends('layouts.user')

@section('title')
    Track Seasons
@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Season Name</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Track Season</create-button>
            </div>
        </div>

        <track-seasons :data="{{ $seasons }}"></track-seasons>
    </div>
@endsection