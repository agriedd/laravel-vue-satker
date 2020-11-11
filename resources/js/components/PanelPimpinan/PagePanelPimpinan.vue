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
                        <v-btn icon @click="openModal('tambah')">
                            <v-icon>mdi-plus</v-icon>
                        </v-btn>
                    </v-toolbar>
                    <div style="position: sticky; top: 0px; z-index: 2;">
                        <v-tabs centered v-model="tab">
                            <v-tab key="awal">Awal</v-tab>
                            <v-tab key="sankter">Sankter</v-tab>
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
                                <v-card flat>
                                    <v-card-text>
                                        Struktur Organisasi
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item key="petugas">
                                <v-card flat>
                                    <v-card-text>
                                        Petugas
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item key="bidang">
                                <v-card flat>
                                    <v-card-text>
                                        Bidang
                                    </v-card-text>
                                </v-card>
                            </v-tab-item>
                            <v-tab-item key="kegiatan">
                                <v-card flat>
                                    <v-card-text>
                                        Kegiatan
                                    </v-card-text>
                                </v-card>
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

import TabAwal from '../Tabs/TabAwal.vue'
import TabSankter from '../Tabs/TabSankter.vue'
export default {
    components: {
        AppBar,
        TabAwal,
        TabSankter,
    },
    data(){
        return {
            tab: 'awal'
        }
    },
    computed: {
    },
    methods: {
    },
    created(){
    }
}
</script>