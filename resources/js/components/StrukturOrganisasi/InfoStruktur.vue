<template>
    <div class="px-3">
        <div>
            <h3>
                {{ struktur.satker.nama }}
            </h3>
            <div>
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-img :src="struktur.gambar_url" class="rounded" max-width="100%" max-height="50vh"/>
                </div>
            </div>
        </div>
        <div class="pt-10">
            <v-alert type="error" prominent text>
                Data yang sudah dihapus tidak dapat dikembalikan.
            </v-alert>
        </div>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            struktur: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.struktur.errors,
            id: state => state.struktur.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'struktur/CLEAR_ERROR'
        }),
        ...mapActions({
            showstruktur: 'struktur/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showstruktur({id: this.id}).catch(e => {
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