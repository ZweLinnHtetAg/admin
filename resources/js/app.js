
require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-edit-component', require('./components/UserEditComponent.vue').default);

const app = new Vue({
    el: '#app',
});
