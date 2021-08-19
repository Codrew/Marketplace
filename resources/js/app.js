require('./bootstrap');

import Vue from 'vue';

// window.Vue = require('vue');
// window.axios = require('axios');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-preview', require('./components/imagePreview/FeatureImage.vue').default);
Vue.component('first-preview', require('./components/imagePreview/FirstImage.vue').default);
Vue.component('second-preview', require('./components/imagePreview/SecondImage.vue').default);
Vue.component('category-dropdown', require('./components/CategoryDropdown.vue').default);
Vue.component('address-dropdown', require('./components/AddressDropdown.vue').default);

const app = new Vue({
    el: '#app',
});