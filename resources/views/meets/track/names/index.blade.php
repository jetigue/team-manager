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
    <div class="card table-card" id="trackMeetNameCard">
        <div class="card-content py-0">
            <div class="content">
                <div class="columns table-header">
                    <div class="column is-1 p-2 pl-3">
                        <strong>id</strong>
                    </div>
                    <div class="column is-9 p-2">
                        <strong>Meet Names</strong>
                    </div>
                    <div class="column">
                    </div>
                </div>

                @foreach($names as $name)
                    <track-meet-name :attributes="{{$name}}" inline-template>
                        <div v-if="editing" class="columns table-row">
                            <div class="column is-1 p-2">
                                {{$name->id}}
                            </div>
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" name="meet_name" id="meet_name" v-model="meet_name" autofocus>
                                        {{--<span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"--}}
                                        {{--v-text="form.errors.get('name')"></span>--}}
                                    </div>
                                </div>
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

                        <div v-else class="columns table-row">
                            <div class="column is-1 py-2 pl-3">
                                {{$name->id}}
                            </div>
                            <div class="column is-9 py-2" v-text="meet_name"></div>

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
                    </track-meet-name>
                @endforeach
            </div>
        </div>
    </div>
@endsection