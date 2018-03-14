@extends('layouts.user')

@section('title')
    Create a Track Venue
@endsection

@section('content')
    <add-new-venue></add-new-venue>
<div id="venue-form">
{{--<form method="POST" action="/track/venues" id="form" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">--}}
    {{--@csrf--}}
    {{--@include('layouts.errors')--}}

    {{--<div class="form-group">--}}
        {{--<label for="name">Venue Name</label>--}}
        {{--<input type="text" class="form-control" name="name" id="name" value="{{old('name', $venue->name)}}" v-model="form.name">--}}
        {{--<small class="form-text text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label for="city">City</label>--}}
        {{--<input type="text" class="form-control" name="city" id="city" value="{{old('city', $venue->city)}}" v-model="form.city">--}}
        {{--<small id="cityHelp" class="form-text text-danger" v-if="form.errors.has('city')" v-text="form.errors.get('city')"></small>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<label for="state">State</label>--}}
        {{--<input type="text" class="form-control" name="state" id="state" value="{{old('state', $venue->state)}}" v-model="form.state">--}}
        {{--<small id="nameHelp" class="form-text text-danger" v-if="form.errors.has('state')" v-text="form.errors.get('state')"></small>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--<button type="submit" class="btn btn-primary" :disabled="form.errors.any()">Add Venue</button>--}}
    {{--</div>--}}

{{--</form>--}}
</div>
@endsection