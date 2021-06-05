<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6" style="border-right: 1px solid rgba(0,0,0,.15)">
            <div class="fill-height">
                <info-bidang-template :bidang="bidang">
                    <v-list-item-group v-model="tab" color="primary">
                        <list-item v-model="bidang.satker.nama" label="Nama Satker" key="0">
                            <v-list-item-action-text>
                                Lihat Satker
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                        <list-item value="Pegawai" label="Daftar Pegawai" key="1">
                            <v-list-item-action-text>
                                Lihat Daftar Pegawai
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                        <list-item value="Kegiatan" label="Daftar Kegiatan" key="2">
                            <v-list-item-action-text>
                                Lihat Daftar Kegiatan
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                    </v-list-item-group>
                    <v-divider/>
                </info-bidang-template>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex" style="position: sticky; top: 0px">
                <v-card-text :key="tab" class="grow pa-0">
                    <info-satker :value="bidang.satker" v-if="tab == 0"/>
                    <list-petugas :params="{ id_bidang: bidang.id_bidang }" v-else-if="tab == 1"/>
                    <list-kegiatan :params="{ id_bidang: bidang.id_bidang }" v-else-if="tab == 2"/>
                </v-card-text>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
import InfoSatker from '../Satker/InfoSatkerHover.vue'
import InfoBidangTemplate from './InfoBidangTemplate.vue'
import ListPetugas from '../Petugas/ListPetugas.vue'
import ListKegiatan from '../Kegiatan/ListKegiatan.vue'
export default {
    components: {
        ListItem,
        InfoSatker,
        InfoBidangTemplate,
        ListPetugas,
        ListKegiatan,
    },
    data(){
        return {
            bidang: {},
            tab: 0,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.bidang.errors,
            id: state => state.bidang.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showpimpinan: 'bidang/show',
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
                        this.$set(this.bidang, key, data[key])
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