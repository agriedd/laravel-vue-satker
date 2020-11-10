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
                        <v-list-item-group v-model="tab">
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
                <v-card-text class="overflow-auto fill-height">
                    <div class="py-10 d-flex justify-center flex-column">
                        <div class="text--disabled mx-auto">
                            Informasi Satker {{ tab }}
                        </div>
                    </div>
                </v-card-text>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
export default {
    components: {
        ListItem,
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