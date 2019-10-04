const routes = [
  {
    path: '/',
    component: () => import('layouts/MyLayout.vue'),
    children: [{ path: '', component: () => import('pages/Index.vue') }]
  },
  {
    path: '/module/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      {
        path: ':moduleId',
        props: true,
        component: () => import('pages/RecordIndex.vue')
      },
      {
        path: ':moduleId/new',
        props: true,
        component: () => import('pages/RecordDetail.vue')
      },
      {
        path: ':moduleId/:recordId',
        props: true,
        component: () => import('pages/RecordDetail.vue')
      }
    ]
  },
  {
    path: '/admin/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      {
        path: 'module',
        component: () => import('pages/admin/modules/Index.vue')
      },
      {
        path: 'module/new',
        component: () => import('pages/admin/modules/Detail.vue')
      },
      {
        path: 'module/:moduleId',
        props: true,
        component: () => import('pages/admin/modules/Detail.vue')
      }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
