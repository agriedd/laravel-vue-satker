import Vuex from 'vuex'
import Vue from 'vue'
import datastore from '../store/main'

Vue.use(Vuex)

const store = new Vuex.Store( { modules: datastore } )

export default store