<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Daftar Bidang
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <table-bidang 
                            @modal:tambah="openModal('tambah')" 
                            @modal:ubah="openModal('ubah', true, $event)" 
                            @modal:hapus="openModal('hapus', true, $event)"
                            @modal:info="openModal('info', true, $event)">
                            <template #default="{ update }">
                                <modal-tambah-bidang @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                                <modal-ubah-bidang @modal:ubah="openModal('ubah', $event)" @done="update(null)"/>
                                <modal-hapus-bidang @modal:hapus="openModal('hapus', $event)" @done="update(null)"/>
                                <modal-info-bidang @modal:info="openModal('info', $event)" @done="update(null)"/>
                            </template>
                        </table-bidang>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TableBidang from './TableBidang.vue'
import ModalTambahBidang from './ModalTambahBidang.vue'
import ModalUbahBidang from './ModalUbahBidang.vue'
import ModalHapusBidang from './ModalHapusBidang.vue'
import ModalInfoBidang from './ModalInfoBidang.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TableBidang,
        ModalTambahBidang,
        ModalUbahBidang,
        ModalHapusBidang,
        ModalInfoBidang,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'bidang/SET_MODAL_TAMBAH',
            setModalUbah: 'bidang/SET_MODAL_UBAH',
            setModalHapus: 'bidang/SET_MODAL_HAPUS',
            setModalInfo: 'bidang/SET_MODAL_INFO',
            setId: 'bidang/SET_ID',
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