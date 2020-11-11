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
                @change="clear('nama')"/>
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
                label="Pangkat | Golongan" 
                name="pangkat" 
                :error-messages="errors.pangkat"
                @change="clear('pangkat')"/>
        </div>
        <div>
            <v-select 
                label="Status Petugas" 
                name="status" 
                :items="status_petugas"
                :error-messages="errors.status" 
                @change="clear('status')"/>
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
import InputPilihBidang from '../bidang/InputPilihBidang.vue'
import statusPetugas from './statusPetugas'
import { mapMutations, mapState } from 'vuex'
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