import axios from 'axios'

import { api } from '../configs/main'

export default {
    namespaced: true,
    
    state: {
        loading: false,
        drawer: true,
        mini_drawer: false,
    },
    getters: {},
    actions: {},
    mutations: {
        SET_DRAWER(state, payload){
            state.drawer = payload
        },
        SET_MINI_DRAWER(state, payload){
            state.mini_drawer = payload
        },
        SET_LOADING_APP(state, payload){
            state.loading = payload
        },
        TOGGLE_MINI_DRAWER(state){
            state.mini_drawer = !state.mini_drawer
        },
        TOGGLE_DRAWER(state){
            state.drawer = !state.drawer
        }
    },
}