import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'clientes',
      component: () => import('../views/Clients.vue')
    },
    
  ]
})

export default router
