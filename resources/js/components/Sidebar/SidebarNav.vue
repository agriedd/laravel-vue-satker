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
                { title: "Awal", icon: "mdi-home", link: "/admin" },
                { title: "Satker", icon: "mdi-bookmark", link: "/admin/satker"},
            ],
            listbottom: [
                { title: "Struktur", icon: "mdi-file-tree", link: "/admin/struktur"},
                { title: "Bidang", icon: "mdi-dropbox", link: "/admin/bidang"},
                    { title: "Pimpinan", icon: "mdi-account", link: "/admin/pimpinan"},
                    { title: "Petugas", icon: "mdi-account-group", link: "/admin/petugas"},
                    { title: "Kegiatan", icon: "mdi-bookmark", link: "/admin/kegiatan"},
                { title: "Admin", icon: "mdi-shield-account-variant", link: "/admin/admin"},
            ],
            listgroup: [
            ]
        }
    },
    computed: {}
}
</script>