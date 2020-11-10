<template>
    <div class="px-3">
        <div>
            <v-text-field 
                label="Nama Satker" 
                name="nama" 
                :error-messages="errors.nama" 
                @change="clear('nama')"/>
        </div>
        <div>
            <v-text-field 
                label="Alamat" 
                name="alamat" 
                :error-messages="errors.alamat" 
                @change="clear('alamat')"
                append-icon="mdi-map-marker"/>
        </div>
        <div>
            <v-text-field 
                label="ISO" 
                name="iso" 
                :error-messages="errors.iso" 
                @change="clear('iso')"/>
        </div>
        <div>
            <v-text-field 
                label="Status" 
                name="status" 
                :error-messages="errors.status" 
                @change="clear('status')"/>
        </div>
        <div>
            <v-textarea 
                label="Keterangan Lainnya" 
                name="lain_lain" 
                :error-messages="errors.lain_lain" 
                @change="clear('lain_lain')"/>
        </div>
    </div>
</template>
<script>
import { mapMutations, mapState } from 'vuex'
export default {
    data(){
        return {
            form: {
                password: null,
            },
            rules: {}
        }
    },
    computed: {
        ...mapState({
            errors: state => state.satker.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'satker/CLEAR_ERROR'
        })
    }
}
</script>