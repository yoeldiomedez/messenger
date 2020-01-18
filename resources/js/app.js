require('./bootstrap');

import Vue from 'vue'
import store from './store'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

Vue.component('profile-component', require('./components/ProfileComponent.vue').default);
Vue.component('messenger-component', require('./components/MessengerComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('contact-form-component', require('./components/ContactFormComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
Vue.component('active-chat-component', require('./components/ActiveChatComponent.vue').default);
Vue.component('message-chat-component', require('./components/MessageChatComponent.vue').default);

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            document.getElementById('logout-form').submit()
        }
    }
})
