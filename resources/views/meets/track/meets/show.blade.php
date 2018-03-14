@extends('layouts.user')

@section('title')
	Track Meet
@endsection

@section('button')
<div>
    <div>
        <b-btn variant="outline-primary" v-b-modal="'teamResultFormModal'">Add Team Results</b-btn>

        <b-modal title="Add Team Results"
                 header-text-variant="primary"
                 hide-footer="true"
                 id="teamResultFormModal"
                 no-close-on-backdrop="true"
                 ok-disabled="true">
            @include('meets.track.results.team.form')
        </b-modal>
    </div>
</div>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
      <h3 class="card-title">{{$meet->meetName->meet_name}}</h3>
      <h5 class="card-subtitle ml-3 text-muted">{{date('F j, Y', strtotime($meet->meet_date))}}</h5>
    <div class="d-flex justify-content-between meet-details">
      <p><span style="font-weight:bold">Host:</span> {{$meet->host->name}}</p>
      <p><span style="font-weight:bold">Venue:</span> {{$meet->venue->name}}</p>
      <p><span style="font-weight:bold">Timing:</span> {{$meet->timing->name}}</p>
      <p><span style="font-weight:bold">Season:</span> {{$meet->season->name}}</p>
    </div>

        @if (count($meet->teamResults) === 0)
        <hr>
          No Team Results Entered

    @else
    <h4>Team Results</h4>
    <table class="table table-hover">
      <thead class="thead-light">
        <tr>
          <th scope="col">Gender</th>
          <th scope="col">Division</th>
          <th scope="col">Place</th>
          <th scope="col">Points</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($meet->teamResults as $teamResult)
        <tr>
          <td>{{$teamResult->gender->name}}</td>
          <td>{{$teamResult->division->name}}</td>
          <td>{{$teamResult->place}}/{{$teamResult->number_teams}}</td>
          <td>{{$teamResult->points}}</td>
          <td>Results</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
</div>
</div>

@endsection

