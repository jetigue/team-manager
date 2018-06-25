@extends('layouts.user')

@section('title')
    Track Meet Names
@endsection

@section('button')
    {{--<button-create label="Add Meet Name" href="{{url('/track/meet/names/create')}}"></button-create>--}}

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create New Venue" >
        <add-new-track-meet-name></add-new-track-meet-name>
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Meet Name
    </button>
@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-9">
                <strong>Meet Name</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <track-meet-names :data="{{ $names }}"></track-meet-names>
    </div>
@endsection