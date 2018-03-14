@extends('layouts.user')

@section('title')
    Track Seasons
@endsection

@section('button')

    <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create Track Season" >
        <add-new-track-season></add-new-track-season>
    </form-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Track Season
    </button>
@endsection

@section('content')

    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Season Name</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($seasons as $season)
            <tr>
                <td>
                    <a href="{{ $season->path() }}">{{$season->name}}</a>
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