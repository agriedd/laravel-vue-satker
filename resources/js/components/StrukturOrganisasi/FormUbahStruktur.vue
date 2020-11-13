<template>
    <div class="px-3">
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
                label="Gambar Struktur" 
                name="gambar" 
                :error-messages="errors.gambar" 
                @change="clear('gambar')"
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
import { mapActions, mapMutations, mapState } from 'vuex'
import InputPilihSatker from '../Satker/InputPilihSatker.vue'
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
            errors: state => state.struktur.errors,
            id: state => state.struktur.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'struktur/CLEAR_ERROR'
        }),
        ...mapActions({
            showSatker: 'struktur/show',
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