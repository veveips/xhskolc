import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [{
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      title: '首页 - 小红书达人管理系统'
    }
  },
  {
    path: '/about',
    name: 'About',
    meta: {
      title: '关于 - 小红书达人管理系统'
    },
    component: () => import('../views/About.vue')
  },
  {
    path: '/kolcs',
    name: 'Kolcs',
    meta: {
      title: '达人管理 - 小红书达人管理系统'
    },
    component: () => import('../views/Kolcs.vue')
  },
  {
    path: '/goods',
    name: 'Goods',
    meta: {
      title: '商品管理 - 小红书达人管理系统'
    },
    component: () => import('../views/Goods.vue')
  },
  {
    path: '/msgs',
    name: 'Msgs',
    meta: {
      title: '消息通知 - 小红书达人管理系统'
    },
    component: () => import('../views/Msgs.vue')
  },
  {
    path: '/forms',
    name: 'Forms',
    meta: {
      title: '订单管理 - 小红书达人管理系统'
    },
    component: () => import('../views/Forms.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router