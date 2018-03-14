<div class="card">
  <div class="card-header">
    Add Team Result
  </div>
  <div class="card-body">
    <form method="POST" action="/track/meets/{{$meet->id}}/results">
      @csrf

      <div class="form-group">
        <label for="gender">Gender</label>
         <select class="form-control" name="gender_id" required>
            <option value="">Choose one...</option>
            @foreach ($genders as $gender)
              <option value="{{$gender->id}}">{{$gender->name}}</option>
            @endforeach
          </select>
      </div>

      <div class="form-group">
        <label for="division">Division</label>
           <select class="form-control" name="division_id" required>
              <option value="">Choose one...</option>
              @foreach ($divisions as $division)
                <option value="{{$division->id}}">{{$division->name}}</option>
              @endforeach
            </select>
      </div>

      <div class="form-group">
        <label for="place">Place</label>
        <input type="number" class="form-control" name="place" min="1">
      </div>

      <div class="form-group">
        <label for="place">Number of Teams</label>
        <input type="number" class="form-control" name="number_teams" min="2" required>
      </div>

      <div class="form-group">
        <label for="place">Points</label>
        <input type="number" class="form-control" name="points" min="0">
      </div>

    <hr>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Enter Result</button>
      </div>

    </form>
  </div>
</div>