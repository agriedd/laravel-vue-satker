<template>
    <v-card flat class="pa-lg-10">
        <v-card-title>
            Struktur Organisasi
        </v-card-title>
        <div class="d-flex flex-wrap justify-space-between">
            <div>
                <div class="fill-height d-flex justify-center flex-column">
                    <v-card-text>
                        <v-progress-circular :value="percent"/>
                    </v-card-text>
                </div>
            </div>
            <div>
                <div class="fill-height d-flex justify-center flex-column">
                    <v-card-text>
                        <div class="display-2 m-0">
                            {{ jumlah || 0 }}
                        </div>
                        <div>
                            Jumlah Struktur
                        </div>
                    </v-card-text>
                </div>
            </div>
        </div>
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
            jumlah: null,
            loading: false,
        }
    },
    computed: {
        percent(){
            let jumlah = this.jumlah || 0
            let jumlah_satker = this.jumlah_satker || 0
            return jumlah / jumlah_satker * 100
        }
    },
    methods: {
        ...mapActions({
            getCount: 'struktur/count'
        }),
        async getData(){
            this.loading = true

            let res = await this.getCount({
                count: true
            }).catch(e=>{})

            this.loading = false
            
            if(res) this.jumlah = res.data.data
        }
    },
    created(){
        this.getData()
    }
}
</script>