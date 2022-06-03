import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import MovieListView from '../views/MovieListView.vue'
import ModifyMovie from '../views/ModifyMovie.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Reservation from '../views/ReservationView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // },
    {
      path: '/movie-list',
      name: 'movie_list',
      component: MovieListView
    },
    {
      path: '/movie/:type/:id?',
      name: 'modify_movie',
      component: ModifyMovie,
      props: true
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/reservation/:id',
      name: 'reservation',
      component: Reservation,
      props: true
    }
  ]
})

export default router
