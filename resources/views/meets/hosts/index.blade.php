@extends('layouts.user')

@section('title')
    Meet Hosts
@endsection

@section('button')

    <form-modal v-if="showFormModal" @close="showFormModal=false" id="formModal" title="Create Meet Host" >
        <add-new-meet-host></add-new-meet-host>
    </form-modal>
    <button type="button" class="button is-primary is-outlined is-rounded" @click="showFormModal = true" >
        <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Create Meet Host
    </button>
@endsection

@section('content')

    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="col">Meet Host</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($hosts as $host)
            <tr>
                <td>
                    <a href="{{ $host->path() }}">{{$host->name}}</a>
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