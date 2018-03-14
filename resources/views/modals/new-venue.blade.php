
<div id="newVenue"><add-new-venue></add-new-venue></div>
{{--<div class="modal fade" id="venueModal" tabindex="-1" role="dialog" aria-labelledby="newVenueTitle" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<h5 class="modal-title" id="newVenueLongTitle">Add A New Venue</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">x</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div id="newVenue"><add-new-venue></add-new-venue></div>--}}

                {{--<div id="newVenue">--}}
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

                        {{--<div class="d-flex justify-content-end pt-2">--}}
                            {{--<button type="submit" class="btn btn-success" :disabled="form.errors.any()">Add New Venue</button>--}}
                        {{--</div>--}}

                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal-footer d-flex justify-content-start">--}}
                {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}