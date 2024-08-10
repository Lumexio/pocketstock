import Vue from 'vue'
import VueRouter from 'vue-router'
import store from "@/store";
//import * as main from "@/main.js";
//import { nextTick } from 'vue/types/umd';
//Vue.use(main);
Vue.use(VueRouter)
Vue.use(store)


const routes = [
  {
    path: '/',
    redirect: {
      name: 'login',
      component: () => import(/*webpackChunkName: "Login" */'../components/global/login.vue'),
      meta: {
        layout: 'auth',
        name: 'auth'
      }
    }
  },
  {
    path: '/login',
    name: 'login',
    component: () => import(/*webpackChunkName: "Login" */'../components/global/login.vue'),

    meta: {
      layout: 'auth',
      name: 'auth'
    }
  },
  {
    path: '/home',
    name: 'home',
    component: () => import(/*webpackChunkName: "Home" */'../views/Home.vue'),

    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {

        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {

        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  //Cruds 
  {
    path: '/crearuser',
    name: 'crearuser',
    component: () => import('../components/cruds/crearuser.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },

  //Listas
  {
    path: '/users',
    name: 'users',
    component: () => import('../views/main-users.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/products',
    name: 'artículos',
    component: () => import('../views/main-products.vue'), meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/categorys',
    name: 'categorys',
    component: () => import('../views/main-categorys.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/marcas',
    name: 'marcas',
    component: () => import('../views/main-marcas.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/tipos',
    name: 'tipos',
    component: () => import('../views/main-tipo.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/proveedores',
    name: 'proveedores',
    component: () => import('../views/main-proveedores.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/racks',
    name: 'racks',
    component: () => import('../views/main-rack.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/travesano',
    name: 'travesano',
    component: () => import('../views/main-travesano.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '/historial',
    name: 'historial',
    component: () => import('../views/main-activitylog.vue'),
    meta: {
      authenticated: true
    },
    beforeEnter: (to, from, next) => {
      let validado = to.matched.some(record => record.meta.authenticated);
      if (store.state.token) {
        next();
        if (validado == true && from.path !== '/') {
          next();
        }
      }
      else if (!validado) {
        next({ name: 'login' });
      }
      else {
        next({ name: 'login' });
      }

    }
  },
  {
    path: '*',
    name: 'Error',
    component: () => import('@/layouts/error.vue'),
    meta: {
      layout: 'error' // name of the layout
    }
  },
]



const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})




export default router