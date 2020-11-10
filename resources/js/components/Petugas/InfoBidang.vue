<template>
    <div class="px-3">
        <div>
            <h3>
                {{ bidang.nama_bidang }}
            </h3>
            <div>
                <div class="text--disabled">
                    {{ bidang.nama_kepala_b }}
                </div>
                <div class="text--disabled">
                    {{ bidang.satker.nama }}
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
            bidang: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.bidang.errors,
            id: state => state.bidang.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'bidang/CLEAR_ERROR'
        }),
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