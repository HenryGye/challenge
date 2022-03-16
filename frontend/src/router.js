import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Vuelos from './views/Vuelos.vue'
import ResultadosVuelos from './views/ResultadosVuelos.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  // base: process.env.BASE_URL,
  linkExactActiveClass: "active-routes",
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/vuelos',
      name: 'vuelos',
      component: Vuelos
    },
    {
      path: '/resultados-vuelos',
      name: 'resultadosVuelos',
      component: ResultadosVuelos
    },
  ]
})