@extends('layouts.user')

@section('title')
	Track Meet
@endsection

@section('button')

<create-modal v-if="showCreateModal" @close="showCreateModal=false" id="createModal" title="Add Team Results">
   {{--<add-new-track-meet></add-new-track-meet>--}}
    @include('meets.track.results.team.form')
</create-modal>
<button type="button" class="button is-primary is-outlined is-rounded" @click="showCreateModal = true">
    <span class="fa fa-plus" aria-hidden="true"></span> &nbsp Add Team Results
</button>

@endsection

@section('content')
<div class="card">
  <div class="card-content">
      <p class="title is-3">{{$meet->meetName->meet_name}}</p>
      <p class="subtitle is-5 ml-3">{{date('F j, Y', strtotime($meet->meet_date))}}</hp>
    <div class="meet-details px-3 mt-3 mb-4">
      <p class="m-p-0"><span style="font-weight:bold">Host:</span> {{$meet->host->name}}</p>
      <p class="m-p-0"><span style="font-weight:bold">Venue:</span> {{$meet->venue->name}}</p>
      <p class="m-p-0"><span style="font-weight:bold">Timing:</span> {{$meet->timing->name}}</p>
      <p class="m-p-0"><span style="font-weight:bold">Season:</span> {{$meet->season->name}}</p>
    </div>

        @if (count($meet->teamResults) === 0)
        <hr>
        <p><strong>No Team Results Entered</strong></p>

    @else
    <div class="card table-card">
      <div class="card-content">
        <div class="columns table-header my-0">
            <div class="column is-2 p-2 pl-3">
                <strong>Gender</strong>
            </div>
            <div class="column is-2 p-2">
                <strong>Division</strong>
            </div>
            <div class="column is-2 p-2">
                <strong>Place</strong>
            </div>
            <div class="column is-2 p-2">
                <strong>Points</strong>
            </div>
            <div class="column"></div>
        </div>

          @foreach($meet -> teamResults as $teamResult)
            <track-team-result :attributes="{{$teamResult}}" inline-template>
              <div v-if="editing" class="columns table-row">
                <div class="column">
                    <div class="field">
                        <div class="control">
                            <input type="text" class="input" name="name" id="name" v-model="name" autofocus>
<!--                             <span id="nameHelp" class="help is-danger" v-if="form.errors.has('name')"
                            v-text="form.errors.get('name')"></span> -->
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

                        <div v-else class="m-p-0">
                            <div class="table-row">
                                <div class="columns m-p-0">
                                    <div class="column is-2 py-2">{{$teamResult->gender->name}}</div>
                                    <div class="column is-2 py-2">{{$teamResult->division->name}}</div>
                                    <div class="column is-2 py-2">{{$teamResult->place}}/{{$teamResult->number_teams}}</div>
                                    <div class="column is-2 py-2">{{$teamResult->points}}</div>

                                    <div class="column p-0 button-cell">
                                        <div class="field">

                                        <div class="pm-0 tooltip">
                                            <a  class="button is-text" href="{{ $teamResult->path() }}">
                                                <span class="icon is-small" style="color:#73000a;">
                                                    <i class="fas fa-eye" ></i>
                                                </span>
                                            </a>
                                            <span class="tooltiptext">Show Results</span>
                                        </div>

                                        <div class="pm-0 tooltip">
                                            <a class="button is-text" @click="editing=true">
                                                <span class="icon is-small" style="color:blue;">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </span>
                                            </a>
                                            <span class="tooltiptext">Edit Result Details</span>
                                        </div>

                                        <div class="pm-0 tooltip">
                                            <a class="button is-text tooltip" @click="destroy">
                                                <span class="icon is-small" style="color:red;">
                                                    <i class="far fa-trash-alt"></i>
                                                </span>
                                            </a>
                                            <span class="tooltiptext">Delete Result</span>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </track-team-result>
                @endforeach
            </div>
    </div>
                @endif
</div>
</div>
@endsection