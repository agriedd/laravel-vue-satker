/**
 * 
 * ROUTE
 */

import PageAdmin from '../components/Admin/PageAdmin.vue'
import PageSatker from '../components/Satker/PageSatker.vue'

export default [
    { path: '/admin/admin', component: PageAdmin, name: 'page.admin' },
    { path: '/admin/satker', component: PageSatker, name: 'page.satker' },
]