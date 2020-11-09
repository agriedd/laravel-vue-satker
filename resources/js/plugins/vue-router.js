import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../route/main'
import store from './vuex'

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

router.beforeEach(async (to, from, next) => {

    store.commit('navbar/SET_LOADING_APP', true)

    if(to.path == '/admin/403') return next()

    let token = ""
    let el = document.head.querySelector("meta[name='token']")
    token = el.content
    
    return next()

    if(token){
        let res = await store.dispatch('admin/user', {
            token
        })
        if(store.state.admin.user) return next()
    }
    next({
        path: '/admin/403'
    })
})

router.afterEach(async (to, from, next) => {
    setTimeout(()=>{
        store.commit('navbar/SET_LOADING_APP', false)
    }, 500)
})

export default router