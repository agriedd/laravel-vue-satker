<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Struktur Organisasi
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-struktur 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <modal-tambah-struktur @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <modal-ubah-struktur @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-struktur @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <!-- <modal-info-satker @modal:info="openModal('info', $event)" @done="update(null)"/> -->
                            </template>
                        </table-struktur>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TableStruktur from './TableStruktur.vue'
import ModalTambahStruktur from './ModalTambahStruktur.vue'
import ModalUbahStruktur from './ModalUbahStruktur.vue'
import ModalHapusStruktur from './ModalHapusStruktur.vue'
// import ModalInfoSatker from './ModalInfoSatker.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TableStruktur,
        ModalTambahStruktur,
        ModalUbahStruktur,
        ModalHapusStruktur,
        // ModalInfoSatker,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'struktur/SET_MODAL_TAMBAH',
            setModalUbah: 'struktur/SET_MODAL_UBAH',
            setModalHapus: 'struktur/SET_MODAL_HAPUS',
            setModalInfo: 'struktur/SET_MODAL_INFO',
            setId: 'struktur/SET_ID',
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