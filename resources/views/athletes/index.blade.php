@extends('layouts.user')

@section('title')
    Athletes
@endsection

@section('button')

    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Athlete">
        <!-- <add-new-meet-host></add-new-meet-host> -->
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true">
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Athlete
    </button>
@endsection

@section('content')
    <div class="box table-box p-0" id="athleteCard">
        <div class="table-header">
            <div class="columns m-0 px-4">
                <div class="column is-3 ">
                    <strong>Name</strong>
                </div>
                <div class="column is-2 ">
                    <strong>Sex</strong>
                </div>
                <div class="column is-2 ">
                    <strong>Year</strong>
                </div>
                <div class="column is-2 ">
                    <strong>Active?</strong>
                </div>
            </div>
        </div>

        <athletes :data="{{ $athletes }}"></athletes>
    </div>
@endsection