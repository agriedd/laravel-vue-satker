<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <div class="d-flex">
                            <v-icon left>mdi-view-dashboard</v-icon>
                            <v-toolbar-title class="grey--text">
                                Panel Admin
                            </v-toolbar-title>
                        </div>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-divider/>
                    <div>
                        <v-card-text>
                            <h3>
                                Selamat datang di halaman panel admin.
                            </h3>
                        </v-card-text>
                        <v-card-text>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis nulla cum quam reiciendis laborum dolores ullam sapiente cupiditate distinctio fuga, exercitationem deleniti magni vero eos eligendi. Consequatur voluptates sed ad!
                        </v-card-text>
                    </div>
                    <v-divider/>
                    <v-row no-gutters>
                        <v-col cols="12" sm="6" class="pa-3">
                            <item-info-satker/>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-card flat class="pa-lg-10">
                                <v-card-title>
                                    Struktur Organisasi
                                </v-card-title>
                                <div class="d-flex flex-wrap justify-space-between">
                                    <div>
                                        <div class="fill-height d-flex justify-center flex-column">
                                            <v-card-text>
                                                <v-progress-circular :value="20"/>
                                            </v-card-text>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fill-height d-flex justify-center flex-column">
                                            <v-card-text>
                                                <div class="display-2 m-0">
                                                    92
                                                </div>
                                                <div>
                                                    Jumlah Struktur
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-card flat class="pa-lg-10" dark>
                                <v-card-title>
                                    Pimpinan / Petugas
                                </v-card-title>
                                <div class="d-flex flex-wrap justify-space-between">
                                    <div>
                                        <div class="fill-height d-flex justify-center flex-column">
                                            <v-card-text>
                                                <div class="display-2 m-0">
                                                    92
                                                </div>
                                                <div>
                                                    Jumlah Pimpinan
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fill-height d-flex justify-center flex-column">
                                            <v-card-text>
                                                <div class="display-2 m-0 text-right">
                                                    92
                                                </div>
                                                <div>
                                                    Jumlah Petugas
                                                </div>
                                            </v-card-text>
                                        </div>
                                    </div>
                                </div>
                                <v-card-text>
                                    <v-progress-linear :value="45"/>
                                </v-card-text>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-card flat v-ripple class="pa-lg-10">
                                <v-card-text>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eius nesciunt sequi aliquam nemo reprehenderit repellat nobis molestiae itaque, veniam corporis quasi iure, fugit quidem ex voluptates modi! Officiis, atque iusto.
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarDefault.vue'
import ItemInfoSatker from './ItemInfoSatker.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        AppBar,
        ItemInfoSatker,
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