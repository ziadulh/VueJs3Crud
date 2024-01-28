import { createRouter, createWebHistory } from 'vue-router'
const routes = [
  {
    path: '/',
    name: 'HomeComponent',
    component: import(/* webpackChunkName: "about" */ '../views/HomeComponent.vue')
  },
  {
    path: '/create',
    name: 'CreateComponent',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/CreateComponent.vue')
  },
  {
    path: '/list',
    name: 'ListComponent',
    component: import('../views/ListComponent.vue')
  },
  {
    path: '/edit/:id',
    name: 'EditComponent',
    component: import('../views/EditComponent.vue')
  },
]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})
export default router