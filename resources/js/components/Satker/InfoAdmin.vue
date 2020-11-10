<template>
    <div class="px-3">
        <div>
            <h3>
                {{ admin.nama }}
            </h3>
            <div>
                {{ admin.email }}
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
            admin: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.admin.errors,
            id: state => state.admin.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'admin/CLEAR_ERROR'
        }),
        ...mapActions({
            showAdmin: 'admin/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showAdmin({id: this.id}).catch(e => {
                this.$emit('loading', false)
            })
            this.$emit('loading', false)
            if(res){
                let data = res.data.data
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        this.$set(this.admin, key, data[key])
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