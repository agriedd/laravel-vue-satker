<template>
    <div class="px-3">
        <div>
            <h3>
                {{ petugas.nama }}
            </h3>
            <div>
                <div class="text--disabled">
                    {{ petugas.nip }}
                </div>
                <div class="text--disabled">
                    {{ petugas.bidang.nama_bidang }}
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
            petugas: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.petugas.errors,
            id: state => state.petugas.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'petugas/CLEAR_ERROR'
        }),
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