<template>
    <div class="px-3">
        <div>
            <h3>
                {{ satker.nama }}
            </h3>
            <div>
                {{ satker.iso }}
            </div>
            <div>
                {{ satker.status }}
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
            satker: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.satker.errors,
            id: state => state.satker.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'satker/CLEAR_ERROR'
        }),
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