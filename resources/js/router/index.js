import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

// guest
import Login from '../pages/Login.vue';
import ForgotPassword from '../pages/ForgotPassword.vue';
import NotFound from '../pages/NotFound.vue';
// Guest

import Dashboard from '../pages/admin/Dashboard.vue';

const routes = [{
    name: 'Login',
    path: '/login',
    component: Login
  },
  {
    name: 'ForgotPassword',
    path: '/login/forgot_password',
    component: ForgotPassword
  },
  {
    name: 'Dashboard',
    path: '/dashboard',
    component: Dashboard
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
    name: "Dashboard"
  });
  else next();
});

export default router;