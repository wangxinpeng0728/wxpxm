import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

const routes = [
  {
    //登录路由
    path:"/login",
    component:()=>import("../views/login.vue"),
  },
  {
    //首页2
    path:"/",
    component:()=>import("../admin.vue"),
    children:[
      {
        //首页
        path:"/",
        component:()=>import("../views/admins.vue"),
      },
      {
        //管理员展示
        path: '/admin',
        component: () => import('../views/admin/admin.vue')
      },
      {
        //管理员修改
        path: '/adminedit',
        component: () => import('../views/admin/adminedit.vue')
      },
      {
        //添加管理员
        path: '/addadmin',
        component: () => import('../views/admin/addadmin.vue')
      },
      {
        //用户展示
        path: '/user',
        component: () => import('../views/user/user.vue')
      },
      {
        //新闻展示
        path: '/newshow',
        component: () => import('../views/news/newshow.vue')
      },
      {
        //新闻添加
        path: '/newadd',
        component: () => import('../views/news/newadd.vue')
      },
      {
        //新闻修改
        path: '/newedit',
        component: () => import('../views/news/newedit.vue')
      },
      {
        //类别展示
        path: '/typeindex',
        component: () => import('../views/type/typeindex.vue')
      },
      {
        //类别添加
        path: '/typeadd',
        component: () => import('../views/type/typeadd.vue')
      },
      {
        //商品展示
        path: '/goodsshow',
        component: () => import('../views/goods/goodsshow.vue')
      },
      {
        //商品添加
        path: '/goodsadd',
        component: () => import('../views/goods/goodsadd.vue')
      },
      {
        //商品回收站
        path: '/goodshui',
        component: () => import('../views/goods/goodshui.vue')
      },
      {
        //商品详情
        path: '/userinfo',
        component: () => import('../views/user/userinfo.vue')
      },
      {
        //商品修改
        path: '/edit/:id',
        component: () => import('../views/goods/goodsedit.vue')
      },
      {
        //订单展示
        path: '/dingshow',
        component: () => import('../views/ding/dingshow.vue')
      },
      {
        //子类别展示
        path: '/typezi/:id',
        component: () => import('../views/type/typezi.vue')
      },
      {
        //孙类别展示
        path: '/typezis/:id',
        component: () => import('../views/type/typezis.vue')
      },
      {
        //孙类别展示
        path: '/typeziss/:id',
        component: () => import('../views/type/typeziss.vue')
      },
      {
        //类别修改
        path: '/typeedit',
        component: () => import('../views/type/typeedit.vue')
      },
      {
        //收藏查看
        path: '/collection',
        component: () => import('../views/collection/collection.vue')
      },
      {
        //评论
        path: '/comment',
        component: () => import('../views/comment/comment.vue')
      },
      {
        //漫画
        path: '/manhua',
        component: () => import('../views/manhua/manhua.vue')
      },
    ]
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

//导航守卫

router.beforeEach((to,from,next)=>{
  let username = localStorage.getItem("username");
  
  if (to.path!="/login" && !username) {
    return next("/login");
  } else {
    return next();
  }
})

export default router
