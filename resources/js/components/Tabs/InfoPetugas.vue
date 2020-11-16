<template>
    <v-card flat rounded="0" class="fill-height">
        <v-list>
            <v-list-item @click="tab = 'petugas'">
                <v-list-item-icon>
                    <v-icon>mdi-account</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>
                        Petugas
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Laporan Petugas
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action>
                    <v-icon>mdi-chevron-right</v-icon>
                </v-list-item-action>
            </v-list-item>
            <v-divider/>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        Jumlah Petugas
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Jumlah Petugas
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action-text>
                    <h1 class="font-weight-bold">
                        {{ jumlah }}
                    </h1>
                </v-list-item-action-text>
            </v-list-item>
            <v-divider/>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        Jumlah PNS
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Jumlah Petugas PNS
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action-text>
                    <h1 class="font-weight-bold">
                        {{ jumlah_pns }}
                    </h1>
                </v-list-item-action-text>
            </v-list-item>
            <v-divider/>
            <v-list-item>
                <v-list-item-content>
                    <v-list-item-title>
                        Jumlah Kontrak
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Jumlah Petugas Kontrak
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action-text>
                    <h1 class="font-weight-bold">
                        {{ jumlah_kontrak }}
                    </h1>
                </v-list-item-action-text>
            </v-list-item>
        </v-list>
    </v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        value: String,
        jumlah_satker: Number,
        params: Object,
    },
    computed: {
        tab: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            }
        },
        percent(){
            let jumlah = this.jumlah || 0
            let jumlah_satker = this.jumlah_satker || 0
            return jumlah / jumlah_satker * 100
        }
    },
    data(){
        return {
            jumlah: null,
            jumlah_pns: null,
            jumlah_kontrak: null,
            loading: false,
        }
    },
    methods: {
        ...mapActions({
            getCount: 'petugas/count'
        }),
        async getData(){
            this.loading = true

            let res = await this.getCount({
                count: true,
                ...this.params,
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah = res.data.data
        },
        async getDataPNS(){
            this.loading = true

            let res = await this.getCount({
                count: true,
                pns: true,
                ...this.params,
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah_pns = res.data.data
        },
        async getDataKontrak(){
            this.loading = true

            let res = await this.getCount({
                count: true,
                kontrak: true,
                ...this.params
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah_kontrak = res.data.data
        }
    },
    created(){
        this.getData()
        this.getDataPNS()
        this.getDataKontrak()
    }
}
</script>