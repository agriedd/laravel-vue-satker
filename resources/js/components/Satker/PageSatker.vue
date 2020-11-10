<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Satker
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-satker @modal:tambah="openModal('tambah')" @modal:ubah="openModal('ubah', true, $event)" @modal:hapus="openModal('hapus', true, $event)">
                            <!-- <template #default="{ update }">
                                <modal-tambah-admin @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <modal-ubah-admin @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-admin @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                            </template> -->
                        </table-satker>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TableSatker from './TableSatker.vue'
// import ModalTambahAdmin from './ModalTambahAdmin.vue'
// import ModalUbahAdmin from './ModalUbahAdmin.vue'
// import ModalHapusAdmin from './ModalHapusAdmin.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TableSatker,
        // ModalTambahAdmin,
        // ModalUbahAdmin,
        // ModalHapusAdmin,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'admin/SET_MODAL_TAMBAH',
            setModalUbah: 'admin/SET_MODAL_UBAH',
            setModalHapus: 'admin/SET_MODAL_HAPUS',
            setId: 'admin/SET_ID',
        }),
        openModal(t, e = true, id = null){
            switch (t) {
                default:
                case 'tambah':
                    this.setModalTambah(e)
                    break;
                case 'ubah':
                    this.setId(id)
                    this.setModalUbah(e)
                    break;
                case 'hapus':
                    this.setId(id)
                    this.setModalHapus(e)
                    break;
            }
        }
    },
    created(){
    }
}
</script>