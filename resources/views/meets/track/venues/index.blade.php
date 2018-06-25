@extends('layouts.user')

@section('title')
    Track Venues
@endsection

@section('button')

        <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create New Venue">
            <add-new-venue></add-new-venue>
        </create-modal>
        <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true">
            <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create New Venue
        </button>

@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-5">
                <strong>Venue Name</strong>
            </div>
            <div class="column is-2">
                <strong>City</strong>
            </div>
            <div class="column is-1">
                <strong>State</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <track-venues :data="{{ $venues }}"></track-venues>
    </div>
@endsection