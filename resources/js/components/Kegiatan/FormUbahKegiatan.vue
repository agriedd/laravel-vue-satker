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
                @change="clear('nama_kegiatan')"
                v-model="form.nama_kegiatan"/>
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
                append-icon="mdi-map-marker"
                v-model="form.lokasi"/>
        </div>
        <div>
            <v-textarea
                label="Rincian Kegiatan" 
                name="rincian_kegiatan" 
                :error-messages="errors.rincian_kegiatan"
                @change="clear('rincian_kegiatan')"
                v-model="form.rincian_kegiatan"/>
        </div>
        <v-expand-transition>
            <div v-if="form.file_gambar && form.encode_gambar" class="pb-5" key="1">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-img :src="form.encode_gambar" class="rounded" max-width="100%" max-height="50vh"/>
                </div>
            </div>
            <div v-else-if="form.gambar_url" class="pb-5" key="2">
                <div class="d-flex justify-center" style="position: relative; width: 100%">
                    <v-img :src="form.gambar_url" class="rounded" max-width="100%" max-height="50vh"/>
                </div>
            </div>
        </v-expand-transition>
        <div>
            <v-file-input
                label="Gambar Kegiatan" 
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
import { mapActions, mapMutations, mapState } from 'vuex'
import InputPilihBidang from '../bidang/InputPilihBidang.vue'
import InputPilihTanggal from './InputPilihTanggal.vue'
export default {
    components: {
        InputPilihBidang,
        InputPilihTanggal,
    },
    data(){
        return {
            form: {
                file_gambar: null,
                encode_gambar: null,
            },
            rules: {},
        }
    },
    computed: {
        ...mapState({
            errors: state => state.kegiatan.errors,
            id: state => state.kegiatan.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'kegiatan/CLEAR_ERROR'
        }),
        ...mapActions({
            showpetugas: 'kegiatan/show',
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
    },
    created(){
        this.getData()
    }
}
</script>