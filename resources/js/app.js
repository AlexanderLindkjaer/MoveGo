
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('./event');
require('./global');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('events', require('./components/EventsComponent.vue'));
Vue.component('single-event', require('./components/SingleEventComponent.vue'));
Vue.component('events-map', require('./components/AllEventsMap.vue'));
Vue.component('create-edit-event', require('./components/CreateEditEvent.vue'));
Vue.component('show-event', require('./components/ShowEvent.vue'));
Vue.component('event-comments', require('./components/EventComment.vue'));


// import * as VueGoogleMaps from "vue2-google-maps";
//
// Vue.use(VueGoogleMaps, {
//     load: {
//         key: "AIzaSyB8W6kdi63b48VgkrjbJjl1Sf7wBIB2UbM",
//         libraries: "places" // necessary for places input
//     }
// });

import 'vue-googlemaps/dist/vue-googlemaps.css'
import VueGoogleMaps from 'vue-googlemaps'
import Typed from 'typed.js';


Vue.use(VueGoogleMaps, {
    load: {
        // Google API key
        apiKey: 'AIzaSyB3q_1Npa0gYkXGEe4qzpDqRYI6HTkibLw',
        // Enable more Google Maps libraries here
        libraries: ['places'],
        // Use new renderer
        useBetaRenderer: false,
    },
})

const app = new Vue({
    el: '#app'
});
