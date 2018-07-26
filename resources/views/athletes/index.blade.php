@extends('layouts.user')

@section('title')
    Athletes
@endsection

@section('content')
    <div class="box table-box p-0" id="athleteBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-3 ">
                <strong>Name</strong>
            </div>
            <div class="column is-2">
                <strong>Sex</strong>
            </div>
            <div class="column is-2">
                <strong>Class of</strong>
            </div>
            <div class="column is-2 ">
                <strong>Active?</strong>
            </div>
            <div class="column is-2 is-offset-1 create-button-container">
                <create-button>Create New Athlete</create-button>
            </div>
        </div>
        <athletes :data="{{ $athletes }}"></athletes>
    </div>
@endsection