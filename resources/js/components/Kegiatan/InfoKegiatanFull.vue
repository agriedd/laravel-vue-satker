<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6" style="border-right: 1px solid rgba(0,0,0,.15)">
            <div class="fill-height">
                <info-kegiatan-template :kegiatan="kegiatan">
                    <v-list-item-group v-model="tab" color="primary">
                        <list-item v-model="kegiatan.bidang.satker.nama" label="Nama Satker" key="0">
                            <v-list-item-action-text>
                                Lihat Satker
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                        <list-item v-model="kegiatan.bidang.nama_bidang" label="Bidang" key="1">
                            <v-list-item-action-text>
                                Lihat Bidang
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                    </v-list-item-group>
                    <v-divider/>
                </info-kegiatan-template>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex" style="position: sticky; top: 0px">
                <v-slide-y-transition mode="out-in">
                    <v-card-text :key="tab" class="grow pa-0">
                        <info-satker :value="kegiatan.bidang.satker" v-if="tab == 0"/>
                        <info-bidang :bidang="kegiatan.bidang" v-else-if="tab == 1"/>
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
import InfoKegiatanTemplate from './InfoKegiatanTemplate.vue'
export default {
    components: {
        ListItem,
        InfoSatker,
        InfoKegiatanTemplate,
        InfoBidang,
    },
    data(){
        return {
            kegiatan: {},
            tab: 0,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.kegiatan.errors,
            id: state => state.kegiatan.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showpimpinan: 'kegiatan/show',
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
                        this.$set(this.kegiatan, key, data[key])
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