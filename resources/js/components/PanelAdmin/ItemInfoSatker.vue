<template>
    <v-card flat class="pa-lg-10">
        <v-card-title>
            Satker
        </v-card-title>
        <div class="d-flex flex-wrap justify-space-between">
            <div>
                <div class="fill-height d-flex justify-center flex-column">
                    <v-card-text>
                        <v-slide-y-transition mode="out-in">
                            <div class="display-2 m-0" :key="jumlah">
                                {{ jumlah || 0 }}
                            </div>
                        </v-slide-y-transition>
                        <div>
                            Jumlah Satker
                        </div>
                    </v-card-text>
                </div>
            </div>
            <div>
                <v-card-text>
                    <v-icon large>mdi-bookmark</v-icon>
                </v-card-text>
            </div>
        </div>
    </v-card>
</template>
<script>
import { mapActions } from 'vuex'
export default {
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
            
            if(res) this.jumlah = res.data.data
        }
    },
    created(){
        this.getData()
    }
}
</script>