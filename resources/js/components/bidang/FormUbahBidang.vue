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
                append-icon="mdi-acount"
                v-model="form.nama_kepala_b"/>
        </div>
        <div>
            <v-text-field
                label="Nama Bidang" 
                name="nama_bidang" 
                :error-messages="errors.nama_bidang"
                @change="clear('nama_bidang')"
                v-model="form.nama_bidang"/>
        </div>
        <div>
            <v-textarea
                label="Visi dan Misi" 
                name="visi_misi" 
                :error-messages="errors.visi_misi"
                @change="clear('visi_misi')"
                v-model="form.visi_misi"/>
        </div>
        <div>
            <v-text-field
                label="Tujuan" 
                name="tujuan" 
                :error-messages="errors.tujuan"
                @change="clear('tujuan')"
                v-model="form.tujuan"/>
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
            errors: state => state.bidang.errors,
            id: state => state.bidang.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'bidang/CLEAR_ERROR'
        }),
        ...mapActions({
            showSatker: 'bidang/show',
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