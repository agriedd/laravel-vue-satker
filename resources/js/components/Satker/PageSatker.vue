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
                        <table-satker 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <modal-tambah-satker @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <modal-ubah-satker @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-satker @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <modal-info-satker @modal:info="openModal('info', $event)" @done="update(null)"/>
                            </template>
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
import ModalTambahSatker from './ModalTambahSatker.vue'
import ModalUbahSatker from './ModalUbahSatker.vue'
import ModalHapusSatker from './ModalHapusSatker.vue'
import ModalInfoSatker from './ModalInfoSatker.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TableSatker,
        ModalTambahSatker,
        ModalUbahSatker,
        ModalHapusSatker,
        ModalInfoSatker,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'satker/SET_MODAL_TAMBAH',
            setModalUbah: 'satker/SET_MODAL_UBAH',
            setModalHapus: 'satker/SET_MODAL_HAPUS',
            setModalInfo: 'satker/SET_MODAL_INFO',
            setId: 'satker/SET_ID',
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