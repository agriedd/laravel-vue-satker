<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6">
            <div>
                <info-pimpinan-template :pimpinan="pimpinan">
                    <v-list-item-group v-model="tab" color="primary">
                        <list-item v-model="pimpinan.bidang.nama_bidang" label="Nama Bidang" key="0">
                            <v-list-item-action-text>
                                Lihat Bidang
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                    </v-list-item-group>
                    <v-divider/>
                </info-pimpinan-template>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex fill-height">
                <div class="border-left" style="border-left: 1px solid rgba(0,0,0,.15)">
                    <div class="fill-height"></div>
                </div>
                <v-slide-x-transition>
                    <v-card-text :key="tab">
                        <info-bidang :bidang="pimpinan.bidang" v-if="tab == 0"/>
                    </v-card-text>
                </v-slide-x-transition>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
import InfoBidang from '../bidang/InfoBidangTemplate.vue'
import InfoSatker from '../Satker/InfoSatkerHover.vue'
import InfoPimpinanTemplate from './InfoPimpinanTemplate.vue'
export default {
    components: {
        ListItem,
        InfoSatker,
        InfoPimpinanTemplate,
        InfoBidang,
    },
    data(){
        return {
            pimpinan: {},
            tab: 0,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.pimpinan.errors,
            id: state => state.pimpinan.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showpimpinan: 'pimpinan/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showpimpinan({id: this.id}).catch(e => {
                this.$emit('loading', false)
            })
            this.$emit('loading', false)
            if(res){
                let data = res.data.data
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        this.$set(this.pimpinan, key, data[key])
                    }
                }
            }
        }
    },
    created(){
        this.getData()
    }
}
</script>