<template>
    <div class="px-3">
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
                label="Nama Gambar" 
                name="gambar" 
                :error-messages="errors.gambar" 
                @change="clear('gambar'), e"
                v-model="form.file_gambar"
                prepend-icon
                append-icon="mdi-image"/>
        </div>
        <div>
            <input-pilih-satker
                label="Pilih Satker" 
                name="id_satker"
                :error-messages="errors.gambar" 
                @change="clear('id_satker')"
                v-model="form.id_satker"/>
        </div>
    </div>
</template>
<script>
import statusSatker from './statusSatker'
import InputPilihSatker from '../Satker/InputPilihSatker.vue'
import { mapMutations, mapState } from 'vuex'
export default {
    components: {
        InputPilihSatker,
    },
    data(){
        return {
            form: {
                file_gambar: null,
                encode_gambar: null,
            },
            rules: {},
            status_satker: statusSatker,
        }
    },
    computed: {
        ...mapState({
            errors: state => state.struktur.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'struktur/CLEAR_ERROR'
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