<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6" style="border-right: 1px solid rgba(0,0,0,.15)">
            <div class="fill-height">
                <info-petugas-template :petugas="petugas">
                    <v-list-item-group v-model="tab" color="primary">
                        <list-item v-model="petugas.bidang.satker.nama" label="Nama Satker" key="0">
                            <v-list-item-action-text>
                                Lihat Satker
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                        <list-item v-model="petugas.bidang.nama_bidang" label="Bidang" key="1">
                            <v-list-item-action-text>
                                Lihat Bidang
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                    </v-list-item-group>
                    <v-divider/>
                </info-petugas-template>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex" style="position: sticky; top: 0px">
                <v-slide-y-transition mode="out-in">
                    <v-card-text :key="tab" class="grow pa-0">
                        <info-satker :value="petugas.bidang.satker" v-if="tab == 0"/>
                        <info-bidang :bidang="petugas.bidang" v-else-if="tab == 1"/>
                    </v-card-text>
                </v-slide-y-transition>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
import InfoSatker from '../Satker/InfoSatkerHover.vue'
import InfoBidang from '../bidang/InfoBidangTemplate.vue'
import InfoPetugasTemplate from './InfoPetugasTemplate.vue'
export default {
    components: {
        ListItem,
        InfoSatker,
        InfoPetugasTemplate,
        InfoBidang,
    },
    data(){
        return {
            petugas: {},
            tab: 0,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.petugas.errors,
            id: state => state.petugas.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showpimpinan: 'petugas/show',
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
                        this.$set(this.petugas, key, data[key])
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