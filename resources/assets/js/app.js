
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios = require('axios');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('articles', require('./components/Articles.vue'));
Vue.component('approval', require('./components/Approval.vue'));
Vue.component('showallusers', require('./components/Allusers.vue'));
Vue.component('catagory', require('./components/Catagory.vue'));
Vue.component('user-profile', require('./components/Profile.vue'));
Vue.component('home-sidebar', require('./components/Homesidebar.vue'));
Vue.component('home-articles', require('./components/HomeArticles.vue'));
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tikens', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('home-picture-articles', require('./components/Homepicturearticles.vue'));
Vue.component('loadmore-pagination', require('./components/Loadmore.vue'));
Vue.component('image-upload', require('./components/ImageUpload.vue'));
Vue.component('profile-arp', require('./components/profileARP.vue'));
Vue.component('profile-edit', require('./components/ProfileEdit.vue'));

const app = new Vue({
    el: '#app'
});
