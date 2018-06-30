@extends('layouts.user')

@section('title')
    Meet Hosts
@endsection

@section('content')
    <div class="box table-box p-0" id="hostCard">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Host Name</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Meet Host</create-button>
            </div>
        </div>

        <hosts :data="{{ $hosts }}"></hosts>
    </div>
@endsection