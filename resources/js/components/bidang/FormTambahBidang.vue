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
                label="Nama Kepala Bidang" 
                name="nama_kepala_b" 
                :error-messages="errors.nama_kepala_b"
                @change="clear('nama_kepala_b')"
                append-icon="mdi-acount"/>
        </div>
        <div>
            <v-text-field
                label="Nama Bidang" 
                name="nama_bidang" 
                :error-messages="errors.nama_bidang"
                @change="clear('nama_bidang')"/>
        </div>
        <div>
            <v-textarea
                label="Visi dan Misi" 
                name="visi_misi" 
                :error-messages="errors.visi_misi"
                @change="clear('visi_misi')"/>
        </div>
        <div>
            <v-text-field
                label="Tujuan" 
                name="tujuan" 
                :error-messages="errors.tujuan"
                @change="clear('tujuan')"/>
        </div>
    </div>
</template>
<script>
import InputPilihSatker from '../Satker/InputPilihSatker.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        InputPilihSatker,
    },
    data(){
        return {
            form: {},
            rules: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.bidang.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'bidang/CLEAR_ERROR'
        }),
    },
}
</script>