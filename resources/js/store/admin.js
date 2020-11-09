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
        async show(context){},
        store(context, data){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.post(api('admin'), data).catch(e => reject(e))
                if(res) resolve(res)
            })
        },
        async update(context, data){},
        async destroy(context, data){},
    },
    mutations: {
        SET_MODAL_TAMBAH(state, payload){
            state.modal.tambah = payload
        },
        SET_MODAL_UBAH(state, payload){
            state.modal.ubah = payload
        },
        SET_ERRORS(state, payload){
            state.errors = payload
        },
        CLEAR_ERROR(state, payload){
            state.errors[payload] = null
        },
        CLEAR_ERRORS(state, payload){
            state.errors = {}
        }
    },
}