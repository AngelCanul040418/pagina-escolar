import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import OfertasTable from '@/views/OfertasTable.vue'
import MejorOferta from '@/views/MejorOferta.vue'
import UsuariosTable from '@/views/UsuariosTable.vue'
import Servicios from '@/views/Servicios.vue'
import Carrusel_de_imagenes from '@/views/Carrusel_de_imagenes.vue'
import Contactos from '@/views/Contactos.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/ofertas',
    name: 'ofertas',
    component: OfertasTable
  },
  {
    path: '/mejorOferta',
    name: 'mejorOferta',
    component: MejorOferta
  },
  {
    path: '/usuarios',
    name: 'usuarios',
    component: UsuariosTable
  },
  {
    path: '/Servicios',
    name: 'Servicios',
    component: Servicios
  },
  {
    path: '/Carrusel_de_imagenes',
    name: 'Carrusel_de_imagenes',
    component: Carrusel_de_imagenes
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/Contactos',
    name: 'Contactos',
    component: Contactos
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
