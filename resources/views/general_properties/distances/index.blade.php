@extends('layouts.user')

@section('title')
    Distances
@endsection

@section('content')
    <div class="box table-box p-0" id="trackMeetNameBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Distance Name</strong>
            </div>
            <div class="column">
                <strong>Meters</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Distance</create-button>
            </div>
        </div>

        <distances :data="{{ $distances }}"></distances>
    </div>
@endsection