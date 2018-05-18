require('./bootstrap');

window.Event = new Vue();

Vue.component('create-modal', require('./components/modals/CreateModal'));
Vue.component('add-new-gender', require('./components/forms/AddNewGender'));
Vue.component('add-new-meet-division', require('./components/forms/AddNewMeetDivision'));
Vue.component('add-new-meet-host', require('./components/forms/AddNewMeetHost'));
Vue.component('add-new-timing-method', require('./components/forms/AddNewTimingMethod'));
Vue.component('add-new-track-meet', require('./components/forms/AddNewTrackMeet'));
Vue.component('add-new-track-meet-name', require('./components/forms/AddNewTrackMeetName'));
Vue.component('add-new-track-season', require('./components/forms/AddNewTrackSeason'));
Vue.component('add-new-venue', require('./components/forms/AddNewVenue'));
Vue.component('flash', require('./components/Flash.vue'));


new Vue({
    el: '#flash'
});

Vue.component('button-create', {

    template: `
        <button type="button" class="button is-primary is-outlined is-rounded">
            <span class="fa fa-plus" aria-hidden="true"></span> &nbsp <slot></slot>
        </button>
	`
});


new Vue({
    el: '#header-button',

    data: {
        showCreateModal: false
    },

});

Vue.component('division', require('./components/Division'));
Vue.component('gender', require('./components/Gender'));
Vue.component('host', require('./components/Host'));
Vue.component('track-season', require('./components/TrackSeason'));
Vue.component('timing', require('./components/Timing'));
Vue.component('track-meet', require('./components/TrackMeet'));
Vue.component('track-meet-name', require('./components/TrackMeetName'));
Vue.component('track-team-result', require('./components/TrackTeamResult'));
Vue.component('track-venue', require('./components/TrackVenue'));
Vue.component('select-track-meet-name', require('./components/forms/selects/TrackMeetName'));


new Vue({
    el: '.table-card',

    data: {
        active: false,
        showCreateModal: false
    },
});


// new Vue({
//     el: '#list',
//
//     data: {
//         names: []
//     },
//
//     created() {
//
//         axios.get('/track/meet/names').then(response => this.names = response.data);
//     }
// });



// new Vue({
//   el: '#site',
//
//   data: {
//       form: new Form({
//           name: '',
//           city: '',
//           state: ''
//       })
//
//   },
//
//     methods: {
//         onSubmit() {
//             this.form.post('/track/venues')
//                 // .then(response => alert('Done!'))
//                 .catch(errors => console.log(errors));
//
//         }
//     }
// });
