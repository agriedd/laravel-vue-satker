<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Kegiatan
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-kegiatan 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <modal-tambah-kegiatan @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <!-- <modal-ubah-kegiatan @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-kegiatan @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <modal-info-kegiatan @modal:info="openModal('info', $event)" @done="update(null)"/> -->
                            </template>
                        </table-kegiatan>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TableKegiatan from './TableKegiatan.vue'
import ModalTambahKegiatan from './ModalTambahKegiatan.vue'
// import ModalUbahPetugas from './ModalUbahPetugas.vue'
// import ModalHapusPetugas from './ModalHapusPetugas.vue'
// import ModalInfoPetugas from './ModalInfoPetugas.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TableKegiatan,
        ModalTambahKegiatan,
        // ModalUbahPetugas,
        // ModalHapusPetugas,
        // ModalInfoPetugas,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'kegiatan/SET_MODAL_TAMBAH',
            setModalUbah: 'kegiatan/SET_MODAL_UBAH',
            setModalHapus: 'kegiatan/SET_MODAL_HAPUS',
            setModalInfo: 'kegiatan/SET_MODAL_INFO',
            setId: 'kegiatan/SET_ID',
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