@extends('layouts.user')

@section('title')
    Timing Methods
@endsection

@section('button')

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Timing Method" >
        <add-new-timing-method></add-new-timing-method>
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Timing Method
    </button>
@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-9">
                <strong>Timing Method Name</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <timings :data="{{ $timings }}"></timings>
    </div>
@endsection