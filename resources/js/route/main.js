/**
 * 
 * ROUTE
 */

import PageAdmin from '../components/Admin/PageAdmin.vue'
import PageSatker from '../components/Satker/PageSatker.vue'
import PageStruktur from '../components/StrukturOrganisasi/PageStruktur.vue'
import PagePimpinan from '../components/Pimpinan/PagePimpinan.vue'
import PageBidang from '../components/Bidang/PageBidang.vue'

export default [
    { path: '/admin/admin', component: PageAdmin, name: 'page.admin' },
    { path: '/admin/satker', component: PageSatker, name: 'page.satker' },
    { path: '/admin/struktur', component: PageStruktur, name: 'page.struktur' },
    { path: '/admin/pimpinan', component: PagePimpinan, name: 'page.pimpinan' },
    { path: '/admin/bidang', component: PageBidang, name: 'page.bidang' },
]