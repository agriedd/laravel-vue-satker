import axios from 'axios'

import { api, host } from '../configs/main'

export default {
    namespaced: true,
    
    state: {
        data: [],
        user: {},
        selected: {
            id:     null,
            ids:    [],
            data:   null,
            datas:  []
        },
        modal: {
            tambah: false,
            ubah: false,
            hapus: false,
        },
        errors: {},
    },
    getters: {

    },
    actions: {
        get(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('admin'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        user(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('self'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        logout(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(host('api/logout'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        show(context, params){
            let id = params.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.get(api(`admin/${id}`), { params: params }).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('admin'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        update(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`admin/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        destroy(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`admin/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
    },
    mutations: {
        SET_MODAL_TAMBAH(state, payload){
            state.modal.tambah = payload
        },
        SET_MODAL_UBAH(state, payload){
            state.modal.ubah = payload
        },
        SET_MODAL_HAPUS(state, payload){
            state.modal.hapus = payload
        },
        SET_ERRORS(state, payload){
            state.errors = payload
        },
        CLEAR_ERROR(state, payload){
            state.errors[payload] = null
        },
        CLEAR_ERRORS(state, payload){
            state.errors = {}
        },
        SET_ID(state, payload){
            state.selected.id = payload
        },
        SET_USER(state, payload){
            state.user = payload
        }
    },
}