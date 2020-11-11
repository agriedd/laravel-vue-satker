import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from '../route/main'
import store from './vuex'
import { host } from '../configs/main'

Vue.use(VueRouter)

const router = new VueRouter({
    routes,
    mode: 'history'
})

const masalahAuth = ()=>{
    alert('Masalah Autentikasi. silahkan masuk kembali')
    window.location = host('login')
}

router.beforeEach(async (to, from, next) => {

    store.commit('navbar/SET_LOADING_APP', true)

    if(store.state.admin.user.id) return next();

    if(to.path == '/admin/403') return next()

    let token = ""
    let el = document.head.querySelector("meta[name='token']")
    token = el.content
    
    if(token){
        let res = await store.dispatch('admin/user', {
            token
        })
        if(res){
            store.commit('admin/SET_USER', res.data.data)
            return next()
        }
    }
    let res = await store.dispatch('admin/logout').catch(e => {
        if(res.response.status == 401) masalahAuth()
        alert('Terjadi sebuah kesalahan.')
        window.location.reload()
    })
    if(res) masalahAuth()

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