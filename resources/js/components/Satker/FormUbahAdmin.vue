<template>
    <div class="px-3">
        <div>
            <v-text-field 
                label="Nama" 
                name="nama" 
                :error-messages="errors.nama" 
                v-model="form.nama"
                @change="clear('nama')"/>
        </div>
        <div>
            <v-text-field 
                label="Email" 
                type="email" 
                name="email" 
                v-model="form.email"
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
                v-model="form.password_confirmation" 
                :rules="[(v)=>v == form.password || `Password tidak cocok!`]" 
                :error-messages="errors.password_confirmation" @change="clear('password_confirmation')"/>
        </div>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
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
            errors: state => state.admin.errors,
            id: state => state.admin.selected.id,
        }),
    },
    methods: {
        ...mapMutations({
            clear: 'admin/CLEAR_ERROR'
        }),
        ...mapActions({
            showAdmin: 'admin/show',
        }),
        async getData(){
            
            this.$emit('loading', true)

            let res = await this.showAdmin({id: this.id}).catch(e => {
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
        }
    },
    created(){
        this.getData()
    }
}
</script>