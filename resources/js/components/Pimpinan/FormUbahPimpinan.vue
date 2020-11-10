<template>
    <div class="px-3">
        <div>
            <input-pilih-satker
                label="Pilih Satker" 
                name="id_satker"
                :error-messages="errors.id_satker" 
                @change="clear('id_satker')"
                v-model="form.id_satker"/>
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
                label="Nama" 
                name="nama" 
                :error-messages="errors.nama"
                @change="clear('nama')"
                v-model="form.nama"/>
        </div>
        <div>
            <v-text-field
                label="Pangkat Atau Golongan" 
                name="pangkat" 
                :error-messages="errors.pangkat"
                @change="clear('pangkat')"
                v-model="form.pangkat"/>
        </div>
        <div>
            <v-text-field
                label="Tempat Lahir" 
                name="tempat_lahir" 
                :error-messages="errors.tempat_lahir"
                @change="clear('tempat_lahir')"
                v-model="form.tempat_lahir"/>
        </div>
        <div>
            <input-tanggal-lahir @clear:error="clear('tanggal_lahir')" :errors="errors" v-model="form.tanggal_lahir"/>
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
import InputPilihSatker from '../Satker/InputPilihSatker.vue'
import InputTanggalLahir from './InputPilihTanggalLahir.vue'
export default {
    components: {
        InputPilihSatker,
        InputTanggalLahir,
    },
    data(){
        return {
            form: {},
            rules: {},
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
            showSatker: 'pimpinan/show',
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
        },
    },
    created(){
        this.getData()
    }
}
</script>