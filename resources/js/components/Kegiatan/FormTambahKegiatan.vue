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
                label="Nama Kegiatan" 
                name="nama_kegiatan" 
                :error-messages="errors.nama_kegiatan"
                @change="clear('nama_kegiatan')"/>
        </div>
        <div>
            <input-pilih-tanggal 
                v-model="form.tanggal" 
                :errors="errors" 
                @clear:error="clear('tanggal')"/>
        </div>
        <div>
            <v-text-field
                label="Lokasi" 
                name="lokasi" 
                :error-messages="errors.lokasi"
                @change="clear('lokasi')"
                append-icon="mdi-map-marker"/>
        </div>
        <div>
            <v-textarea
                label="Rincian Kegiatan" 
                name="rincian_kegiatan" 
                :error-messages="errors.rincian_kegiatan"
                @change="clear('rincian_kegiatan')"/>
        </div>
        <v-expand-transition>
            <div v-if="form.file_gambar && form.encode_gambar" class="pb-5">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-img :src="form.encode_gambar" class="rounded" max-width="100%" max-height="50vh"/>
                </div>
                <v-divider></v-divider>
            </div>
        </v-expand-transition>
        <div>
            <v-file-input
                label="Gambar Kegiatan (Opsional)" 
                name="gambar" 
                :error-messages="errors.gambar" 
                @change="clear('gambar')"
                v-model="form.file_gambar"
                prepend-icon
                append-icon="mdi-image"/>
        </div>
    </div>
</template>
<script>
import InputPilihBidang from '../bidang/InputPilihBidang.vue'
import InputPilihTanggal from './InputPilihTanggal.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        InputPilihBidang,
        InputPilihTanggal,
    },
    data(){
        return {
            form: {
                tanggal: null
            },
            rules: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.kegiatan.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'kegiatan/CLEAR_ERROR'
        }),
    },
}
</script>