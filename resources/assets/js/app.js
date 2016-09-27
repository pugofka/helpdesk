
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


Vue.component('example', require('./components/Example.vue'));
Vue.component('clients', require('./components/Clients.vue'));

import Vue from 'vue'

const app = new Vue({
    el: 'body',
    data: {
        message: 'Hello Vue World!'
    },
    methods: {
        // logout() {
        //     this.$http.post('/logout').then((response) => {
        //
        //         // get status
        //         if(response.status == );
        //
        //         // get status text
        //         console.log(response.statusText);
        //
        //
        //     }, (response) => {
        //         // error callback
        //         console.log('error' + response);
        //     });
        // }
        logout() {
            this.$http.get('api/user').then((response) => {

                // get status
                console.log(response.status);

                // get status text
                console.log(response.statusText);


            }, (response) => {
                // error callback
                console.log('error' + response);
            });
        }
    }
});





