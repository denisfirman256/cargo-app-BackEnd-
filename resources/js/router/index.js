import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

// guest
import Login from '../pages/Login.vue';
import ForgotPassword from '../pages/ForgotPassword.vue';
import NotFound from '../pages/NotFound.vue';
// Guest

import App from '../admin/App.vue';

const routes = [{
    name: 'Login',
    path: '/login',
    component: Login,
    meta: {
      layout: "Login"
    }
  },
  {
    name: 'ForgotPassword',
    path: '/login/forgot_password',
    component: ForgotPassword,
    meta: {
      layout: "Login"
    }
  },
  {
    name: 'App',
    path: '/admin/dashboard',
    component: App,
    meta: {
      layout: "App"
    }
  },
  {
    path: '*',
    component: NotFound
  }
]

const router = new VueRouter({
  linkActiveClass: 'active',
  mode: 'history',
  routes
});


router.beforeEach((to, from, next) => {
  const isAuthenticated = JSON.parse(localStorage.getItem('authenticated'));

  if (to.name !== "Login" && !isAuthenticated) next({
    name: "Login"
  });
  if (to.name === "Login" && isAuthenticated) next({
    name: "App"
  });
  else next();
});

export default router;