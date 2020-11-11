<template>
    <div class="px-3">
        <div>
            <h3>
                {{ kegiatan.nama_kegiatan }}
            </h3>
            <div>
                <div class="text--disabled">
                    {{ kegiatan.detail_kegiatan }}
                </div>
                <div class="text--disabled">
                    {{ kegiatan.lokasi }} | {{ kegiatan.tanggal }}
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
            kegiatan: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.kegiatan.errors,
            id: state => state.kegiatan.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'kegiatan/CLEAR_ERROR'
        }),
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