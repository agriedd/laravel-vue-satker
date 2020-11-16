<template>
    <v-card flat rounded="0" class="fill-height">
        <v-list>
            <v-list-item @click="tab = 'bidang'">
                <v-list-item-icon>
                    <v-icon>mdi-dropbox</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>
                        Bidang
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Laporan Bidang
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
                        Jumlah Bidang
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Jumlah Bidang
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action-text>
                    <h1 class="font-weight-bold">
                        {{ jumlah }}
                    </h1>
                </v-list-item-action-text>
            </v-list-item>
            <template v-if="jumlah_satker != null">
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title>
                            Bidang / Satker
                        </v-list-item-title>
                        <v-list-item-subtitle>
                            Jumlah Bidang per Satker
                        </v-list-item-subtitle>
                    </v-list-item-content>
                    <v-list-item-action-text>
                        <h1 class="font-weight-bold">
                            {{ jumlah }} / {{ jumlah_satker || 0 }}
                        </h1>
                    </v-list-item-action-text>
                </v-list-item>
                <v-divider/>
                <v-list-item class="py-5 px-10">
                    <v-list-item-content>
                        <v-progress-linear :value="percent" color="green"/>
                    </v-list-item-content>
                </v-list-item>
            </template>
        </v-list>
    </v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        value: String,
        jumlah_satker: Number,
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
            return  jumlah_satker / jumlah * 100
        }
    },
    data(){
        return {
            jumlah: null,
            loading: false,
        }
    },
    methods: {
        ...mapActions({
            getCount: 'bidang/count'
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