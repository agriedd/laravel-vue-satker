<template>
    <div>
        <app-bar color="blue"/>
        <v-main>
            <v-container style="margin-top: -68px; z-index: 1; position: relative;">
                <v-card class="shadow">
                    <v-toolbar flat>
                        <v-toolbar-title class="grey--text">
                            Panel Pimpinan
                        </v-toolbar-title>
                        <v-spacer></v-spacer>
                        <div class="d-inline-block">
                            <form :action="host('logout')" class="wrap d-inline-block" method="POST">
                                <input type="hidden" name="_token" :value="token">
                                <v-tooltip bottom>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn text icon type="submit"
                                            v-bind="attrs"
                                            v-on="on">
                                            <v-icon>mdi-power</v-icon>
                                        </v-btn>
                                    </template>
                                    <span>Keluar</span>
                                </v-tooltip>
                            </form>
                        </div>
                    </v-toolbar>
                    <div style="position: sticky; top: 0px; z-index: 3;">
                        <v-tabs centered v-model="tab">
                            <v-tab key="awal">Awal</v-tab>
                            <v-tab key="sankter">Satker</v-tab>
                            <v-tab key="struktur">Struktur Organisasi</v-tab>
                            <v-tab key="petugas">Petugas</v-tab>
                            <v-tab key="bidang">Bidang</v-tab>
                            <v-tab key="kegiatan">Kegiatan</v-tab>
                        </v-tabs>
                        <v-divider/>
                    </div>
                    <div>
                        <v-tabs-items v-model="tab">
                            <v-tab-item key="awal">
                                <tab-awal/>
                            </v-tab-item>
                            <v-tab-item key="sankter">
                                <tab-sankter/>
                            </v-tab-item>
                            <v-tab-item key="struktur">
                                <tab-struktur/>
                            </v-tab-item>
                            <v-tab-item key="petugas">
                                <tab-petugas/>
                            </v-tab-item>
                            <v-tab-item key="bidang">
                                <tab-bidang/>
                            </v-tab-item>
                            <v-tab-item key="kegiatan">
                                <tab-kegiatan/>
                            </v-tab-item>
                        </v-tabs-items>
                    </div>
                </v-card>
            </v-container>
        </v-main>
    </div>
</template>
<script>
import AppBar from '../AppBar/AppBarPimpinan.vue'
import { host, csrf_token } from '../../configs/main'

import TabAwal from '../Tabs/TabAwal.vue'
import TabSankter from '../Tabs/TabSankter.vue'
import TabStruktur from '../Tabs/TabStruktur.vue'
import TabPetugas from '../Tabs/TabPetugas.vue'
import TabBidang from '../Tabs/TabBidang.vue'
import TabKegiatan from '../Tabs/TabKegiatan.vue'
import { mapState } from 'vuex'
export default {
    components: {
        AppBar,
        TabAwal,
        TabSankter,
        TabStruktur,
        TabPetugas,
        TabBidang,
        TabKegiatan,
    },
    data(){
        return {
            tab: 'awal',
            token: csrf_token
        }
    },
    computed: {
        ...mapState({
            user: state => state.pimpinan.user
        })
    },
    methods: {
        host,
    },
    created(){
    }
}
</script>