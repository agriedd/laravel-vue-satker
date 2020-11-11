<template>
    <v-card flat rounded="0" class="fill-height">
        <v-list>
            <v-list-item @click="tab = 'sankter'">
                <v-list-item-icon>
                    <v-icon>mdi-bookmark</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>
                        Satker
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Laporan Satker
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
                        Jumlah Satker
                    </v-list-item-title>
                    <v-list-item-subtitle>
                        Jumlah Satker
                    </v-list-item-subtitle>
                </v-list-item-content>
                <v-list-item-action-text>
                    <h1 class="font-weight-bold">
                        {{ jumlah }}
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
        value: String
    },
    computed: {
        tab: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            }
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
            getCount: 'satker/count'
        }),
        async getData(){
            this.loading = true

            let res = await this.getCount({
                count: true
            }).catch(e=>{})

            this.loading = false
            
            if(res) {
                this.jumlah = res.data.data
            }
        }
    },
    watch: {
        jumlah(val){
            this.$emit('update:jumlah', val)
        }
    },
    created(){
        this.getData()
    }
}
</script>