<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12" sm="6">
            <div>
                <v-list>
                    <list-item v-model="pimpinan.nama" label="Nama Pimpinan"></list-item>
                    <list-item v-model="pimpinan.nip" label="NIP"></list-item>
                    <list-item v-model="pimpinan.pangkat" label="Pangkat / Golongan">
                        <v-list-item-icon>
                            <v-icon>mdi-crown</v-icon>
                        </v-list-item-icon>
                    </list-item>
                    <v-divider/>
                    <list-item v-model="pimpinan.tempat_lahir" label="Tempat Lahir">
                        <v-list-item-icon>
                            <v-icon>mdi-map-marker</v-icon>
                        </v-list-item-icon>
                    </list-item>
                    <list-item v-model="pimpinan.tanggal_lahir" label="Tanggal Lahir">
                        <v-list-item-icon>
                            <v-icon>mdi-calendar</v-icon>
                        </v-list-item-icon>
                    </list-item>
                    <list-item v-model="pimpinan.alamat" label="Alamat">
                        <v-list-item-icon>
                            <v-icon>mdi-map-marker</v-icon>
                        </v-list-item-icon>
                    </list-item>
                    <v-divider/>
                    <v-list-item-group v-model="tab" color="primary">
                        <list-item v-model="pimpinan.satker.nama" label="Nama Satker" key="0">
                            <v-list-item-action-text>
                                Lihat Satker
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                    </v-list-item-group>
                    <v-divider/>
                </v-list>
            </div>
        </v-col>
        <v-col cols="12" sm="6">
            <div class="d-flex fill-height">
                <div class="border-left" style="border-left: 1px solid rgba(0,0,0,.15)">
                    <div class="fill-height"></div>
                </div>
                <v-slide-x-transition>
                    <v-card-text :key="tab">
                        <info-satker :value="pimpinan.satker" v-if="tab == 0"/>
                    </v-card-text>
                </v-slide-x-transition>
            </div>
        </v-col>
    </v-row>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import ListItem from '../List/ListItem.vue'
import InfoSatker from '../Satker/InfoSatkerHover.vue'
export default {
    components: {
        ListItem,
        InfoSatker,
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