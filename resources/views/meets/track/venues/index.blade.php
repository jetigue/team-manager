@extends('layouts.user')

@section('title')
    Track Venues
@endsection

@section('button')
    {{--<a class="btn btn-outline-primary" href="{{url('track/venues/create')}}" role="button">Create Track Venue</a>--}}

        <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create New Venue">
            <add-new-venue></add-new-venue>
        </form-modal>
        <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true">
            <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create New Venue
        </button>
        {{--<button-create>Create New Venue</button-create>--}}

@endsection

@section('content')


    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Venue</th>
            <th scope="col">City</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($venues as $venue)
            <tr>
                <td>
                    <a href="{{ $venue->path() }}">{{$venue->name}}</a>
                </td>
                <td>{{$venue->city}}, {{$venue->state}}</td>
                <td>
                    <div style="color:Red; opacity:.5; font-size:1.25em">
                        <span class="far fa-trash-alt"></span>
                    </div>
                </td>

                <td>
                    <div style="color:Blue; opacity:.5; font-size:1.25em">
                        <span class="fas fa-pencil-alt"></span>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection

@section('form-modal')
    @include('modals.new-venue')
@endsection