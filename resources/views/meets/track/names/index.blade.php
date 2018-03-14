@extends('layouts.user')

@section('title')
    Track Meet Names
@endsection

@section('button')
    {{--<button-create label="Add Meet Name" href="{{url('/track/meet/names/create')}}"></button-create>--}}

    <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create New Venue" >
        <add-new-track-meet-name></add-new-track-meet-name>
    </form-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Meet Name
    </button>
@endsection

@section('content')

    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Meet Name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($names as $name)
            <tr>
                <td>
                    <a href="{{ $name->path() }}">{{$name->meet_name}}</a>
                </td>
                <td>
                    <div style="color:Red; opacity:.5; font-size:1em">
                        <span class="far fa-trash-alt"></span>
                    </div>
                </td>

                <td>
                    <div style="color:Blue; opacity:.5; font-size:1em">
                        <span class="fas fa-pencil-alt"></span>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


@endsection