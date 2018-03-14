@extends('layouts.user')

@section('title')
    Timing Methods
@endsection

@section('button')

    <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create Timing Method" >
        <add-new-timing-method></add-new-timing-method>
    </form-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Timing Method
    </button>
@endsection

@section('content')

    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Timing Method</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($timings as $timing)
            <tr>
                <td>
                    <a href="{{ $timing->path() }}">{{$timing->name}}</a>
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