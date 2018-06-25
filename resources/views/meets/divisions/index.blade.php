@extends('layouts.user')

@section('title')
    Divisions
@endsection

@section('content')
    <div class="box table-box p-0" id="divisionCard">
        <div class="columns table-header m-0 px-4">
            <div class="column is-1">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Division Name</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Division</create-button>
            </div>
        </div>

        <divisions :data="{{ $divisions }}"></divisions>
    </div>
@endsection
