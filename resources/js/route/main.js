/**
 * 
 * ROUTE
 */

import PageAdmin from '../components/Admin/PageAdmin.vue'
import PageSatker from '../components/Satker/PageSatker.vue'
import PageStruktur from '../components/StrukturOrganisasi/PageStruktur.vue'
import PagePimpinan from '../components/Pimpinan/PagePimpinan.vue'
import PageBidang from '../components/bidang/PageBidang.vue'
import PagePetugas from '../components/Petugas/PagePetugas.vue'
import PageKegiatan from '../components/Kegiatan/PageKegiatan.vue'

export default [
    { path: '/admin/admin', component: PageAdmin, name: 'page.admin' },
    { path: '/admin/satker', component: PageSatker, name: 'page.satker' },
    { path: '/admin/struktur', component: PageStruktur, name: 'page.struktur' },
    { path: '/admin/pimpinan', component: PagePimpinan, name: 'page.pimpinan' },
    { path: '/admin/bidang', component: PageBidang, name: 'page.bidang' },
    { path: '/admin/petugas', component: PagePetugas, name: 'page.petugas' },
    { path: '/admin/kegiatan', component: PageKegiatan, name: 'page.kegiatan' },
]