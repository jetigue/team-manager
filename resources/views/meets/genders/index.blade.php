@extends('layouts.user')

@section('title')
    Genders
@endsection

@section('button')
    {{--<button-create @click="$emit('showFormModal=true')">Create Gender</button-create>--}}
    <create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Create Gender">
        <add-new-gender></add-new-gender>
    </create-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal=true">
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Gender
    </button>

@endsection

@section('content')
    <div class="box table-box p-0" id="genderBox">
        <div class="table-header columns m-0 px-4">
            <div class="column is-1 ">
                <strong>id</strong>
            </div>
            <div class="column is-9">
                <strong>Gender Name</strong>
            </div>
            <div class="column">
            </div>
        </div>

        <genders :data="{{ $genders }}"></genders>
    </div>

@endsection