<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-card-text>
                        Daftar Admin
                    </v-card-text>
                    <v-divider/>
                    <div>
                        <table-admin @modal:tambah="openModal('tambah')">
                            <template #default="{ update }">
                                <modal-tambah-admin @modal:tambah="openModal('tambah', $event)" @done="update(null)"/>
                            </template>
                        </table-admin>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import TableAdmin from './TableAdmin.vue'
import ModalTambahAdmin from './ModalTambahAdmin.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        TableAdmin,
        AppBar,
        ModalTambahAdmin,
    },
    computed: {
    },
    methods: {
        ...mapMutations({
            setModalTambah: 'admin/SET_MODAL_TAMBAH'
        }),
        openModal(t, e = true){
            switch (t) {
                default:
                case 'tambah':
                    this.setModalTambah(e)
                    break;
            }
        }
    },
    created(){
    }
}
</script>