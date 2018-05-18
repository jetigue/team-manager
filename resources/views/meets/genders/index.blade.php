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
    <div class="card table-card" id="genderCard">
        <div class="card-content py-0">
            <div class="content">
                <div class="columns table-header">
                    <div class="column is-1 p-2 pl-3">
                        <strong>id</strong>
                    </div>
                    <div class="column is-9 p-2">
                        <strong>Gender</strong>
                    </div>
                    <div class="column">
                    </div>
                </div>

                @foreach($genders as $gender)
                    <gender :attributes="{{$gender}}" inline-template>
                        <div v-if="editing" class="columns table-row">
                            <div class="column is-1 p-2">
                                {{$gender->id}}
                            </div>
                            <div class="column">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" class="input" name="name" id="name" v-model="name" autofocus>
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
                                {{$gender->id}}
                            </div>
                            <div class="column is-9 py-2" v-text="name"></div>

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
                    </gender>
                @endforeach
            </div>
        </div>
    </div>
@endsection

