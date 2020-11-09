import axios from 'axios'

import { api } from '../configs/main'

export default {
    namespaced: true,
    
    state: {
        data: [],
        user: {},
        links: {},
        meta: {
            page: 1,
            itemsPerPage: 10,
            sortBy: ['created_at'],
            sortDesc: [true],
            groupBy: [],
            groupDesc: [],
            mustSort: false,
            multiSort: false,
        },
        selected: {
            id:     null,
            ids:    [],
            data:   null,
            datas:  []
        },
        total: 0,
        search: '',
        params: {},

        loading: false,
    },
    getters: {

    },
    actions: {
        get(context, params = {}){
            return new Promise(async(resolve, reject)=>{
                let res = await axios.get(api('admin'), params).catch(e => reject(e))
                if(res)
                    resolve(res)
            })
        },
        async show(context){},
        async store(context, data){},
        async update(context, data){},
        async destroy(context, data){},
    },
    mutations: {

    },
}