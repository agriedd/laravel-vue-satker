import Vue from 'vue'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import colors from 'vuetify/lib/util/colors'

Vue.use(Vuetify)

const opts = { 
    customVariables: ['./sass/_variables.scss'],
    treeShake: true,
    theme: {
        options: {
            customProperties: true,
        },
        themes: {}
    } 
}

export default new Vuetify(opts)