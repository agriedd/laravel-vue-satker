<template>
    <v-autocomplete
        v-model="id_bidang"
        :name="name"
        :items="items"
        :loading="loading"
        :search-input.sync="search"
        hide-no-data
        hide-selected
        :item-text="itemText"
        item-value="id_bidang"
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
        label: { default: "Pilih Bidang" },
        itemText: { default: 'nama_bidang' },
        name: { default: 'id_bidang' },
    },
    computed: {
        id_bidang: {
            get(){ return this.value },
            set(val){ 
                this.$emit('input', val) 
            },
        },
        data_satker(){
            const r = RegExp(this.search)
            return this.items.filter(it => r.test(it.nama) )
        },
        bidang(){
            return this.items.find(e => e.id_bidang == this.id_bidang)
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
            getSatker: 'bidang/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getSatker({
                id_bidang: this.id_bidang
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