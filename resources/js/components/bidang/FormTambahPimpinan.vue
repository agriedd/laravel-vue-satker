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
                @change="clear('nip')"/>
        </div>
        <div>
            <v-text-field
                label="Nama" 
                name="nama" 
                :error-messages="errors.nama"
                @change="clear('nama')"/>
        </div>
        <div>
            <v-text-field
                label="Pangkat Atau Golongan" 
                name="pangkat" 
                :error-messages="errors.pangkat"
                @change="clear('pangkat')"/>
        </div>
        <div>
            <v-text-field
                label="Tempat Lahir" 
                name="tempat_lahir" 
                :error-messages="errors.tempat_lahir"
                @change="clear('tempat_lahir')"/>
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
                append-icon="mdi-map-marker"/>
        </div>
    </div>
</template>
<script>
import statusSatker from './statusSatker'
import InputPilihSatker from '../Satker/InputPilihSatker.vue'
import InputTanggalLahir from './InputPilihTanggalLahir.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        InputPilihSatker,
        InputTanggalLahir,
    },
    data(){
        return {
            form: {
                tanggal_lahir: null,
                file_gambar: null,
                encode_gambar: null,
            },
            rules: {},
            status_satker: statusSatker,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.pimpinan.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'pimpinan/CLEAR_ERROR'
        }),
        getImage(){
            if(this.form.file_gambar){
                let reader = new FileReader();
                reader.onload = e =>{
                    this.form.encode_gambar = reader.result;
                }
                reader.readAsDataURL(this.form.file_gambar);
                return
            }
            this.encode_gambar = null;
        }
    },
    watch: {
        'form.file_gambar': function(val){
            this.getImage()
        }
    }
}
</script>