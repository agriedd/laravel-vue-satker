<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6">
            <div>
                <div>
                    <v-list>
                        <list-item v-model="satker.nama" label="Nama"/>
                        <list-item v-model="satker.iso" label="ISO"/>
                        <list-item v-model="satker.alamat" label="Alamat">
                            <v-list-item-icon>
                                <v-icon>mdi-map-marker</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <list-item v-model="satker.status" label="Status"/>
                        <v-divider/>
                        <list-item v-model="satker.lain_lain" label="Keterangan">
                            <v-list-item-icon>
                                <v-icon>mdi-map-marker</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                        <v-list-item-group v-model="tab" color="primary">
                            <list-item value="Struktur Organisasi" label="Struktur organisasi satker" key="struktur">
                                <v-list-item-icon>
                                    <v-icon>mdi-chevron-right</v-icon>
                                </v-list-item-icon>
                            </list-item>
                            <v-divider/>
                            <list-item value="Pimpinan" label="Pimpinan Satker" key="pimpinan">
                                <v-list-item-icon>
                                    <v-icon>mdi-chevron-right</v-icon>
                                </v-list-item-icon>
                            </list-item>
                            <v-divider/>
                            <list-item value="Bidang" label="Bidang Satker" key="satker">
                                <v-list-item-icon>
                                    <v-icon>mdi-chevron-right</v-icon>
                                </v-list-item-icon>
                            </list-item>
                        </v-list-item-group>
                    </v-list>
                </div>
                <v-divider/>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex fill-height">
                <div class="border-left" style="border-left: 1px solid rgba(0,0,0,.15)">
                    <div class="fill-height"></div>
                </div>
                <div class="overflow-auto fill-height" style="width: 100%">
                    <v-card-text v-if="tab == 0">
                        <list-struktur :params="{ id_satker: satker.id_satker }"></list-struktur>
                    </v-card-text>
                    <div v-else-if="tab == 1">
                        <list-pimpinan :params="{ id_satker: satker.id_satker }"></list-pimpinan>
                    </div>
                    <div v-else-if="tab == 2">
                        <list-bidang :params="{ id_satker: satker.id_satker }"></list-bidang>
                    </div>
                    <div v-else class="py-10 d-flex justify-center flex-column">
                        <div class="text--disabled mx-auto">
                            Informasi Satker {{ tab }}
                        </div>
                    </div>
                </div>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
import ListStruktur from '../StrukturOrganisasi/ListStruktur.vue'
import ListPimpinan from '../Pimpinan/ListPimpinan.vue'
import ListBidang from '../bidang/ListBidang.vue'
export default {
    components: {
        ListItem,
        ListStruktur,
        ListPimpinan,
        ListBidang,
    },
    data(){
        return {
            satker: {},
            tab: null,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.satker.errors,
            id: state => state.satker.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showsatker: 'satker/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showsatker({id: this.id}).catch(e => {
                this.$emit('loading', false)
            })
            this.$emit('loading', false)
            if(res){
                let data = res.data.data
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        this.$set(this.satker, key, data[key])
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