@extends('layouts.user')

@section('title')
	Track Team Results
@endsection

@section('content')

	<table class="table table-hover">
	  <thead class="thead-light">
	    <tr>
	      <th scope="col">Meet</th>
	      <th scope="col">Date</th>
	      <th scope="col">Gender</th>
	      <th scope="col">Division</th>
	      <th scope="col">Place</th>
	      <th scope="col">Points</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($results as $result)
	    <tr>
	      <td>
	      	<a href="{{ $result->path() }}">{{$result->trackMeet->meetName->meet_name}}</a>
	      </td>
	      <td>{{date('F j, Y', strtotime($result->trackMeet->meet_date))}}</td>
	      <td>{{$result->gender->name}}</td>
	      <td>{{$result->division->name}}</td>
	      <td>{{$result->place}}/{{$result->number_teams}}</td>
	      <td>{{$result->points}}</td>
	    </tr>
		@endforeach
	  </tbody>
	</table>


@endsection