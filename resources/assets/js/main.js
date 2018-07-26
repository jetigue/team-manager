require('./bootstrap');

// window.Event = new Vue();

// Vue.component('add-new-gender', require('./components/forms/AddNewGender'));
// Vue.component('add-new-meet-division', require('./components/forms/AddNewMeetDivision'));
// Vue.component('add-new-meet-host', require('./components/forms/AddNewMeetHost'));
// Vue.component('add-new-timing-method', require('./components/forms/AddNewTimingMethod'));
// Vue.component('add-new-track-meet', require('./components/forms/AddNewTrackMeet'));
// Vue.component('add-new-track-meet-name', require('./components/forms/AddNewTrackMeetName'));
// Vue.component('add-new-track-season', require('./components/forms/AddNewTrackSeason'));
// Vue.component('add-new-venue', require('./components/forms/AddNewVenue'));

//
//
Vue.component('flash', require('./components/Flash.vue'));

new Vue({
   el: '#flash'
});
// Vue.component('button-create', {
//
//     template: `
//         <button type="button" class="button is-primary is-outlined is-rounded">
//             <span class="fa fa-plus" aria-hidden="true"></span> &nbsp <slot></slot>
//         </button>
// 	`
// });
//
//
// new Vue({
//     el: '#header-button',
//
//     data: {
//         showCreateModal: false
//     },

// });
Vue.component('track-team-results', require('./components/TrackTeamResults'))
Vue.component('cancel-button', require('./components/buttons/CancelButton'));
Vue.component('create-button', require('./components/buttons/CreateButton'));
Vue.component('delete-button', require('./components/buttons/DeleteButton'));
Vue.component('edit-button', require('./components/buttons/EditButton'));
Vue.component('update-button', require('./components/buttons/UpdateButton'));
Vue.component('athletes', require('./components/Athletes'));
Vue.component('divisions', require('./components/Divisions'));
Vue.component('genders', require('./components/Genders'));
Vue.component('hosts', require('./components/Hosts'));
Vue.component('track-seasons', require('./components/TrackSeasons'));
Vue.component('timings', require('./components/Timings'));
Vue.component('track-meets', require('./components/TrackMeets'));
Vue.component('track-meet-names', require('./components/TrackMeetNames'));
Vue.component('track-team-result', require('./components/TrackTeamResult'));
Vue.component('track-venues', require('./components/TrackVenues'));
// Vue.component('create-modal', require('./components/modals/CreateModal'));

new Vue({
    el: '#userContent',

    data: {
        active: false,
    },
});

