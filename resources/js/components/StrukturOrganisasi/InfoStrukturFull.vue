<template>
    <v-row no-gutters class="fill-height">
        <v-col cols="12">
            <div>
                <div>
                    <v-list>
                        <v-list-item>
                            <div class="d-flex justify-center pb-3" style="position: relative; width: 100%">
                                <v-img :src="struktur.gambar_url" class="rounded" max-width="100%" max-height="100vh"/>
                            </div>
                        </v-list-item>
                        <v-divider/>
                        <list-item v-model="struktur.satker.nama" label="Nama Satker">
                            <v-list-item-action-text>
                                Lihat Satker
                            </v-list-item-action-text>
                            <v-list-item-icon>
                                <v-icon>mdi-chevron-right</v-icon>
                            </v-list-item-icon>
                        </list-item>
                        <v-divider/>
                    </v-list>
                </div>
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
            struktur: {},
            tab: null,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.struktur.errors,
            id: state => state.struktur.selected.id,
        }),
    },
    methods: {
        ...mapMutations({}),
        ...mapActions({
            showStruktur: 'struktur/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showStruktur({id: this.id}).catch(e => {
                this.$emit('loading', false)
            })
            this.$emit('loading', false)
            if(res){
                let data = res.data.data
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        this.$set(this.struktur, key, data[key])
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