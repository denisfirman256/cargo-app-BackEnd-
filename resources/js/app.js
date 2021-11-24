require('./bootstrap');

import Vue from "vue";
import router from "./router/index.js";
import Notifications from 'vue-notification'

Vue.use(Notifications)

// bootstrap import
import {
  BootstrapVue,
  IconsPlugin
} from 'bootstrap-vue';
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

// import router
Vue.component("dashboard-component", require("./components/dashboardComponent.vue").default);

window.Vue = require('vue').default;

const admin = new Vue({
  el: '#admin',
  router
});

const login = new Vue({
  el: '#login',
  router
});