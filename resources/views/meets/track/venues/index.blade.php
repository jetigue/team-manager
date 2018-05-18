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
    <div class="card table-card" id="trackVenueCard">
        <div class="card-content py-0">
            <div class="content">
                <div class="columns table-header">
                    <div class="column is-1 p-2 pl-3">
                        <strong>id</strong>
                    </div>
                    <div class="column is-9 p-2">
                        <strong>Track Venues</strong>
                    </div>
                    <div class="column">
                    </div>
                </div>

                @foreach($venues as $venue)
                    <track-venue :attributes="{{$venue}}" inline-template>
                        <div v-if="editing" class="columns table-row">
                            <div class="column is-1 p-2 pl-3">
                                {{$venue->id}}
                            </div>
                            <div class="column is-8">

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Name</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input type="text" class="input" name="name" id="name" v-model="name" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">City</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input type="text" class="input" name="city" id="city" v-model="city" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">State</label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control">
                                                <input type="text" class="input" name="state" id="state" v-model="state" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-label"><!--left empty for spacing--></div>
                                    <div class="field-body">
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button class="button is-success is-small is-rounded" @click="update">Update
                                                </button>
                                            </div>
                                            <div class="control">
                                                <button class="button is-light is-small is-rounded" @click="editing=false">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div v-else class="columns table-row">
                            <div class="column is-1 py-2 pl-3">
                                {{$venue->id}}
                            </div>
                            <div class="column is-5 py-2" v-text="name"></div>
                            <div class="column is-3 py-2" v-text="city + ', ' + state"></div>
                            <div class="column p-0 button-cell">
                                <p class="field">
                                    <a class="button is-text" @click="editing=true">
                                    <span class="icon is-small" style="color:blue;">
                                        <i class="fas fa-pencil-alt"></i>
                                    </span>
                                    </a>
                                    <a class="button is-text mx-3" @click="destroy">
                                    <span class="icon is-small" style="color:red;">
                                        <i class="far fa-trash-alt"></i>
                                    </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </track-venue>
                @endforeach
            </div>
        </div>
    </div>
@endsection