<template>
    <div class="px-3">
        <div>
            <v-text-field 
                label="Nama Satker" 
                name="nama" 
                :error-messages="errors.nama" 
                @change="clear('nama')"
                v-model="form.nama"/>
        </div>
        <div>
            <v-text-field 
                label="Alamat" 
                name="alamat" 
                :error-messages="errors.alamat" 
                @change="clear('alamat')"
                append-icon="mdi-map-marker"
                v-model="form.alamat"/>
        </div>
        <div>
            <v-text-field 
                label="ISO" 
                name="iso" 
                :error-messages="errors.iso" 
                @change="clear('iso')"
                v-model="form.iso"/>
        </div>
        <div>
            <v-select 
                label="Status Satker" 
                name="status" 
                :items="status_satker"
                :error-messages="errors.status" 
                @change="clear('status')"
                v-model="form.status"/>
        </div>
        <div>
            <v-textarea 
                label="Keterangan Lainnya" 
                name="lain_lain" 
                :error-messages="errors.lain_lain" 
                @change="clear('lain_lain')"
                v-model="form.lain_lain"/>
        </div>
    </div>
</template>
<script>
import statusSatker from './statusSatker'
import { mapActions, mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            form: {},
            rules: {},
            status_satker: statusSatker,
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
            showSatker: 'satker/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showSatker({id: this.id}).catch(e => {
                this.$emit('loading', false)
            })
            this.$emit('loading', false)
            if(res){
                let data = res.data.data
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        this.$set(this.form, key, data[key])
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