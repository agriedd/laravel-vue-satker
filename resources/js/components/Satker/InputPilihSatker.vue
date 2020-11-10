<template>
    <v-autocomplete
        v-model="id_satker"
        :name="name"
        :items="items"
        :loading="loading"
        :search-input.sync="search"
        hide-no-data
        hide-selected
        :item-text="itemText"
        item-value="id_satker"
        :label="label"
        required
        v-bind="$attrs"
        clearable/>
</template>
<script>
import { mapState, mapGetters, mapActions, mapMutations } from 'vuex'
export default {
    props: {
        value: { required: false },
        label: { default: "Pilih Satker" },
        itemText: { default: 'nama' },
        name: { default: 'id_satker' },
    },
    computed: {
        id_satker: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val) 
            },
        },
        data_satker(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
        satker(){
            return this.items.find(e => e.id_satker == this.id_satker)
        },
    },
    data(){
        return {
            search: '',
            items: [],
            loading: false,
            snackbar: {
                status: false,
                message: "Error!",
            }
        }
    },
    methods: {
        ...mapActions({
            getSatker: 'satker/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getSatker({
                id_satker: this.id_satker
            }).catch(e=>{
                this.snackbar.status = true
                this.snackbar.message = e.message
                this.loading = false
            })
            
            this.loading = false
            
            if(res){
                this.items = res.data.data
                let meta = res.data.meta
            }
        }
    },
    watch: {
        search(val, old){
            if(!val) return
            if(this.data_satker.length > 0) return
            if(this.loading) return
            this.getData()
        }
    },
    created(){
        this.getData()
    }
}
</script>