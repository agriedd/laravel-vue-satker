<template>
    <div class="px-3">
        <div>
            <h3>
                {{ pimpinan.nama }}
            </h3>
            <div>
                <div class="text--disabled">
                    {{ pimpinan.nip }}
                </div>
                <div class="text--disabled">
                    {{ pimpinan.bidang.nama_bidang }}
                </div>
                <div class="text--disabled">
                    {{ pimpinan.pangkat }}
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
            pimpinan: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.pimpinan.errors,
            id: state => state.pimpinan.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'pimpinan/CLEAR_ERROR'
        }),
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