<form method="POST" action="/track/meets/{{$meet->id}}/results">
    @csrf
    @include('layouts.errors')

    <div class="field">
        <label class="label" for="gender_id">Gender</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select class="is-expanded" name="gender_id" required>
                    <option value="">Choose one...</option>
                        @foreach ($genders as $gender)
                    <option
                        value="{{$gender->id}}" {{old('gender_id') == $gender->id ? 'selected' :''}}>{{$gender->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label" for="division_id">Division</label>
        <div class="control">
            <div class="select is-fullwidth">
                <select class="is-expanded" name="division_id" required>
                    <option value="">Choose one...</option>
                        @foreach ($divisions as $division)
                    <option
                        value="{{$gender->id}}" {{old('division_id') == $division->id ? 'selected' :''}}>{{$division->name}}</option>
                        @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="field">
        <label class="label" for="place">Place</label>
        <div class="control">
            <input class="input" type="number" name="place" min="1">
        </div>
    </div>

    <div class="field">
        <label class="label" for="number_teams">Number of Teams</label>
        <div class="control">
            <input class="input" type="number" name="number_teams" min="2">
        </div>
    </div>

    <div class="field">
        <label class="label" for="points">Points</label>
        <div class="control">
            <input class="input" type="number" name="points" min="0">
        </div>
    </div>

    <div class="control" style="margin-top:25px;">
        <button class="button is-success is-pulled-right">Add Team Result</button>
    </div>

</form>