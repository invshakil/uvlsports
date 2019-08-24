window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Vue JS
 */
window.Vue = require('vue');
window.routes = {};

// Event Bus
Vue.prototype.$eventHub = new Vue();

/**
 * Components
 */
Vue.component('tweet-view', require('./tweetView.vue'));

const app = new Vue({
    el: '#tweet'
});