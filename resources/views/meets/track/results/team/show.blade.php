@extends('layouts.user')

@section('content')

<div class="card">
  <div class="card-body">
    <h3>{{$meet->meetName->meet_name}}</h3>
    <h5>{{date('F j, Y', strtotime($meet->meet_date))}}</h5>
  </div>
</div>


@endsection