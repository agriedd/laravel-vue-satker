<template>
    <div class="px-3">
        <div>
            <v-text-field 
                label="Nama" 
                name="nama" 
                :error-messages="errors.nama" 
                @change="clear('nama')"/>
        </div>
        <div>
            <v-text-field 
                label="Email" 
                type="email" 
                name="email" 
                :error-messages="errors.email" 
                @change="clear('email')"/>
        </div>
        <div>
            <v-text-field 
                label="Kata Sandi" 
                type="password" 
                v-model="form.password" 
                name="password" 
                :error-messages="errors.password" 
                @change="clear('password')"/>
        </div>
        <div>
            <v-text-field 
                label="Konfirmasi Kata Sandi" 
                type="password" 
                name="password_confirmation" 
                v-model="form.password_confirmation" :rules="[(v)=>v == form.password || `Password tidak cocok!`]" 
                :error-messages="errors.password_confirmation" @change="clear('password_confirmation')"/>
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
            errors: state => state.admin.errors
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'admin/CLEAR_ERROR'
        })
    }
}
</script>