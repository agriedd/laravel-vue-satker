<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Petugas
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-petugas 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <!-- <modal-tambah-petugas @modal:tambah="openModal('tambah', $event)" @done="update(null)"/> -->
                                <!-- <modal-ubah-petugas @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-petugas @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <modal-info-petugas @modal:info="openModal('info', $event)" @done="update(null)"/> -->
                            </template>
                        </table-petugas>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TablePetugas from './TablePetugas.vue'
// import ModalTambahBidang from './ModalTambahBidang.vue'
// import ModalUbahBidang from './ModalUbahBidang.vue'
// import ModalHapusBidang from './ModalHapusBidang.vue'
// import ModalInfoBidang from './ModalInfoBidang.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TablePetugas,
        // ModalTambahBidang,
        // ModalUbahBidang,
        // ModalHapusBidang,
        // ModalInfoBidang,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'petugas/SET_MODAL_TAMBAH',
            setModalUbah: 'petugas/SET_MODAL_UBAH',
            setModalHapus: 'petugas/SET_MODAL_HAPUS',
            setModalInfo: 'petugas/SET_MODAL_INFO',
            setId: 'petugas/SET_ID',
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
                case 'info':
                    this.setId(id)
                    this.setModalInfo(e)
                    break;
            }
        }
    },
    created(){
    }
}
</script>