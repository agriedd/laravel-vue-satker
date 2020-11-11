<template>
    <div class="px-3">
        <div>
            <input-pilih-bidang
                label="Pilih Bidang" 
                name="id_bidang"
                :error-messages="errors.id_bidang" 
                @change="clear('id_bidang')"
                v-model="form.id_bidang"/>
        </div>
        <div>
            <v-text-field
                label="Nama Petugas" 
                name="nama" 
                :error-messages="errors.nama"
                @change="clear('nama')"
                v-model="form.nama"/>
        </div>
        <div>
            <v-text-field
                label="NIP" 
                name="nip" 
                :error-messages="errors.nip"
                @change="clear('nip')"
                v-model="form.nip"/>
        </div>
        <div>
            <v-text-field
                label="Pangkat | Golongan" 
                name="pangkat" 
                :error-messages="errors.pangkat"
                @change="clear('pangkat')"
                v-model="form.pangkat"/>
        </div>
        <div>
            <v-select 
                label="Status Petugas" 
                name="status" 
                :items="status_petugas"
                :error-messages="errors.status" 
                @change="clear('status')"
                v-model="form.status"/>
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
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import InputPilihBidang from '../bidang/InputPilihBidang.vue'
import statusPetugas from './statusPetugas'
export default {
    components: {
        InputPilihBidang,
    },
    data(){
        return {
            form: {},
            rules: {},
            status_petugas: statusPetugas,
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
            showpetugas: 'petugas/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showpetugas({id: this.id}).catch(e => {
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
        },
    },
    created(){
        this.getData()
    }
}
</script>