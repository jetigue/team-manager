require('./bootstrap');

// window.Event = new Vue();

//
//
// Vue.component('flash', require('./components/Flash.vue'));
//
// new Vue({
//    el: '#flash'
// });
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

Vue.component('athletes', require('./components/Athletes'));

// Buttons
Vue.component('cancel-button', require('./components/buttons/CancelButton'));
Vue.component('create-button', require('./components/buttons/CreateButton'));
Vue.component('delete-button', require('./components/buttons/DeleteButton'));
Vue.component('edit-button', require('./components/buttons/EditButton'));
Vue.component('update-button', require('./components/buttons/UpdateButton'));

// General Properties
Vue.component('distances', require('./components/general_properties/Distances'));
Vue.component('seasons', require('./components/general_properties/Seasons'));
Vue.component('terrain-types', require('./components/general_properties/TerrainTypes'));

// Meet Properties
Vue.component('hosts', require('./components/meet_properties/Hosts'));
Vue.component('timings', require('./components/meet_properties/Timings'));

// Race Properties
Vue.component('divisions', require('./components/race_properties/Divisions'));
Vue.component('genders', require('./components/race_properties/Genders'));

// Training Properties
Vue.component('run-efforts', require('./components/training_properties/RunEfforts'));
Vue.component('day-times', require('./components/training_properties/DayTimes'));
Vue.component('run-feelings', require('./components/training_properties/RunFeelings'));
Vue.component('run-types', require('./components/training_properties/RunTypes'));

// Cross Country
Vue.component('cross-country-meet-names', require('./components/cross_country/CrossCountryMeetNames'));
Vue.component('cross-country-meets', require('./components/cross_country/CrossCountryMeets'));
Vue.component('cross-country-venues', require('./components/cross_country/CrossCountryVenues'));

// Track
Vue.component('track-seasons', require('./components/track/TrackSeasons'));
Vue.component('track-meets', require('./components/track/TrackMeets'));
Vue.component('track-meet-names', require('./components/track/TrackMeetNames'));
Vue.component('track-team-result', require('./components/track/TrackTeamResult'));
Vue.component('track-venues', require('./components/track/TrackVenues'));
Vue.component('track-team-results', require('./components/track/TrackTeamResults'));

// Vue.component('create-modal', require('./components/modals/CreateModal'));

new Vue({
    el: '#userContent',

    data: {
        active: false,
    },
});
Vue.component('user-menu', require('./components/menus/UserMenu'));
// Vue.component('menu-items', require('./components/menus/MenuItems'));
// Vue.component('menu-item', require('./components/menus/MenuItem'));

new Vue({
    el: '#userMenu'
});

