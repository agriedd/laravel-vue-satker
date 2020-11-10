<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Pimpinan
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-pimpinan 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <modal-tambah-pimpinan @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <modal-ubah-pimpinan @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <!-- <modal-hapus-struktur @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <modal-info-struktur @modal:info="openModal('info', $event)" @done="update(null)"/> -->
                            </template>
                        </table-pimpinan>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TablePimpinan from './TablePimpinan.vue'
import ModalTambahPimpinan from './ModalTambahPimpinan.vue'
import ModalUbahPimpinan from './ModalUbahPimpinan.vue'
// import ModalHapusStruktur from './ModalHapusStruktur.vue'
// import ModalInfoStruktur from './ModalInfoStruktur.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TablePimpinan,
        ModalTambahPimpinan,
        ModalUbahPimpinan,
        // ModalHapusStruktur,
        // ModalInfoStruktur,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'pimpinan/SET_MODAL_TAMBAH',
            setModalUbah: 'pimpinan/SET_MODAL_UBAH',
            setModalHapus: 'pimpinan/SET_MODAL_HAPUS',
            setModalInfo: 'pimpinan/SET_MODAL_INFO',
            setId: 'pimpinan/SET_ID',
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