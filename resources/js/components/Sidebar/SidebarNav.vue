<template>
    <sidebar-nav-template
        :color="color"
        :config="configs"
        :listtop="listtop"
        :listbottom="listbottom"
        :listgroup="listgroup"
        />
</template>
<script>
import { mapState } from 'vuex'
import SidebarNavTemplate from './SidebarNavTemplate.vue'
export default {
    components: {
        SidebarNavTemplate
    },
    data(){
        return {
            color: 'primary',
            configs: {
                dense: true,
            },
            listtop: [
                // { title: "Awal", icon: "mdi-home", link: "/admin/" },
                { title: "Satker", icon: "mdi-bookmark", link: "/admin/satker"},
            ],
            listbottom: [
                // { title: "Inventaris", icon: "mdi-package-variant", link: "/admin/inventaris" },
                // { title: "Laporan", icon: "mdi-printer", link: "/admin/laporan", active: false, items: [
                //     { title: "Jemaat", icon: "mdi-account-group", link: "/admin/laporan/kk"},
                //     { title: "Ulang Tahun", icon: "mdi-cake-variant", link: "/admin/laporan/ulang-tahun" },
                //     { title: "Baptis", icon: "mdi-human-baby-changing-table", link: "/admin/laporan/baptis"},
                //     { title: "Sidi", icon: "mdi-account-outline", link: "/admin/laporan/sidi"},
                //     { title: "Nikah", icon: "mdi-ring", link: "/admin/laporan/nikah"},
                // ] },
                { title: "Struktur", icon: "mdi-bookmark", link: "/admin/struktur"},
                { title: "Admin", icon: "mdi-shield-account-variant", link: "/admin/admin"},
            ],
            listgroup: [
                // { title: "Jemaat", icon: "mdi-account-group", active: false, items: [
                //     { title: "Kepala Keluarga", icon: "mdi-account", link: "/admin/jemaat/kk" },
                //     { title: "Daftar Jemaat", icon: "mdi-account-group", link: "/admin/jemaat" },
                // ] },
                // { title: "Pelayan", icon: "mdi-shield-account", link: "/admin/jemaat", active: false, items: [
                //     { title: "Daftar Pendeta", icon: "mdi-shield-account", link: "/admin/pendeta" },
                //     { title: "Daftar Majelis", icon: "mdi-account-group", link: "/admin/majelis" },
                //     { title: "Daftar Pegawai", icon: "mdi-account", link: "/admin/pegawai" },
                // ] },
            ]
        }
    },
    computed: {}
}
</script>