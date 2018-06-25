@extends('layouts.user')

@section('title')
    Track Seasons
@endsection

@section('button')

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Track Season" >
        <add-new-track-season></add-new-track-season>
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Track Season
    </button>
@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-9">
                <strong>Season Name</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <track-seasons :data="{{ $seasons }}"></track-seasons>
    </div>
@endsection