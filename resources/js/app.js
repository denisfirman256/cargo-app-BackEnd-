require('./bootstrap');

import Vue from "vue";

// bootstrap import
import {
  BootstrapVue,
  IconsPlugin
} from 'bootstrap-vue';

// import router login
import router from "./router/index.js";
Vue.component("dashboard-component", require("./components/dashboardComponent.vue").default);

// importing AOS
import AOS from 'aos'
import 'aos/dist/aos.css'

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(BootstrapVue)
Vue.use(AOS)

window.Vue = require('vue').default;

const app = new Vue({
  el: '#app',
  router
});

const admin = new Vue({
  el: '#admin',
  router
});