@extends('layouts.user')

@section('title')
    Run Feelings
@endsection

@section('content')
    <div class="box table-box p-0">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-2">
                <strong>Name</strong>
            </div>
            <div class="column">
                <strong>Description</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Run Feeling</create-button>
            </div>
        </div>

        <run-feelings :data="{{ $feelings }}"></run-feelings>
    </div>
@endsection