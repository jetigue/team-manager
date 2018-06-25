@extends('layouts.user')

@section('title')
    Meet Hosts
@endsection

@section('button')

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Meet Host">
        <add-new-meet-host></add-new-meet-host>
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true">
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Host
    </button>
@endsection

@section('content')
    <div class="box table-box p-0" id="hostCard">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-9">
                <strong>Host Name</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <hosts :data="{{ $hosts }}"></hosts>
    </div>
@endsection