
/*require('./bootstrap');*/
window.Vue = require('vue').default;
import { Form, HasError, AlertError } from 'vform'
import Loading from 'vue-loading-overlay';
import 'v-title/lib/element-ui';
import DisableAutocomplete from 'vue-disable-autocomplete';

import VTitle from 'v-title';

Vue.use(VTitle);
window.form = Form;


Vue.use(DisableAutocomplete);
Vue.use(Loading);

Vue.component('profile-edit-component', require('./components/ProfileEditComponent.vue').default);
Vue.component('user-edit-component', require('./components/UserEditComponent.vue').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('user-add-component', require('./components/UserAddComponent.vue').default);
Vue.component('mail-component', require('./components/MailComponent.vue').default);

const axios = require('axios').default;

const app = new Vue({
    el: '#app',
});
