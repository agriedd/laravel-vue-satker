<template>
    <v-card flat class="pa-lg-10" dark>
        <v-card-title>
            Pimpinan / Petugas
        </v-card-title>
        <div class="d-flex flex-wrap justify-space-between">
            <div>
                <div class="fill-height d-flex justify-center flex-column">
                    <v-card-text>
                        <div class="display-2 m-0">
                            {{ jumlah.pimpinan }}
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
                            {{ jumlah.petugas }}
                        </div>
                        <div>
                            Jumlah Petugas
                        </div>
                    </v-card-text>
                </div>
            </div>
        </div>
        <v-card-text>
            <v-progress-linear :value="percent"/>
        </v-card-text>
    </v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        jumlah_satker: Number,
    },
    data(){
        return {
            jumlah: {
                pimpinan: null,
                petugas: null,
            },
            loading: false,
        }
    },
    computed: {
        percent(){
            let jumlah = this.jumlah.pimpinan || 0
            let jumlah_petugas = this.jumlah.petugas || 0
            return jumlah / jumlah_petugas * 100
        }
    },
    methods: {
        ...mapActions({
            getCountPimpinan: 'pimpinan/count',
            getCountPetugas: 'petugas/count'
        }),
        async getDataPimpinan(){
            this.loading = true

            let res = await this.getCountPimpinan({
                count: true
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah.pimpinan = res.data.data
        },
        async getDataPetugas(){
            this.loading = true

            let res = await this.getCountPetugas({
                count: true
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah.petugas = res.data.data
        }
    },
    created(){
        this.getDataPimpinan()
        this.getDataPetugas()
    }
}
</script>