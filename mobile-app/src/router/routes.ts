import { RouteRecordRaw } from 'vue-router'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [{ path: '', component: () => import('pages/IndexPage.vue') }]
  },

  {
    path: '/test',
    component: () => import('layouts/MainLayout.vue'),
    children: [{ path: '', component: () => import('pages/TestPage.vue') }]
  },

  {
    path: '/loading',
    children: [{ path: '', component: () => import('pages/LoadingPage.vue') }]
  },

  {
    path: '/home',
    children: [{ path: '', component: () => import('pages/HomePage.vue') }]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
