import { RouteRecordRaw } from 'vue-router'

const routes: RouteRecordRaw[] = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [{ path: '', component: () => import('pages/IndexPage.vue') }]
  },

  {
    path: '/audits/:campaign_id',
    component: () => import('pages/AuditPage.vue'),
    children: [{ path: '', component: () => import('pages/AuditPage.vue') }]
  },

  {
    path: '/campaigns',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/CampaignPage.vue') },
      { path: ':campaign_id', component: () => import('pages/ListPiece.vue') }
    ]
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
