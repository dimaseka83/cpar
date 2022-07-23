import './bootstrap';
import Vue from 'vue';
import Index from './index.vue';
import Vuex from 'vuex';
import router from './routes';
import VueRouter from 'vue-router';
import Vuetify from 'vuetify'
import Store from './store';
import 'vuetify/dist/vuetify.min.css';
import '@mdi/font/css/materialdesignicons.css';

window.Vue = require('vue').default;
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(Vuex);

    const app = new Vue({
        el: '#app',
                router,
        Store,
        vuetify: new Vuetify(),
        components: {
            "index": Index
        },
        beforeCreate(){
            this.$store.dispatch('loadStoredState');
        }
});
