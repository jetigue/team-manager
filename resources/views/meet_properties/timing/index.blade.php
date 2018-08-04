@extends('layouts.user')

@section('title')
    Timing Methods
@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column">
                <strong>Timing Method Name</strong>
            </div>
            <div class="column is-2 create-button-container">
                <create-button>Create Timing Method</create-button>
            </div>
        </div>

        <timings :data="{{ $timings }}"></timings>
    </div>
@endsection