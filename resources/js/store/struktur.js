import axios from 'axios'

import { api } from '../configs/main'

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
            info: false,
        },
        errors: {},
    },
    getters: {

    },
    actions: {
        get(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('struktur'), { params: params }).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async show(context, params){
            let id = params.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.get(api(`struktur/${id}`), { params: params }).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('struktur'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async update(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`struktur/${id}`), data).catch(e => reject(e))
                    if(res) resolve(res)
                })
        },
        async destroy(context, data){
            let id = context.state.selected.id
            if(id)
                return new Promise(async(resolve, reject)=>{
                    let res = await axios.post(api(`struktur/${id}`), data).catch(e => reject(e))
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
        SET_MODAL_INFO(state, payload){
            state.modal.info = payload
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
        }
    },
}