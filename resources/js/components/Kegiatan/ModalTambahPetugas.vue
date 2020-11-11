<template>
    <div>
        <v-dialog v-model="dialog" content-class="shadow fill-height rounded-0 ma-0 ml-auto h-100" scrollable max-width="400" persistent transition="slide-x-reverse-transition">
            <v-form @submit.prevent="submit($event)" :disabled="loading">
                <v-card rounded="0">
                    <div>
                        <v-card-text>
                            Form Tambah Petugas
                        </v-card-text>
                        <v-divider/>
                    </div>
                    <v-card-text>
                        <form-tambah-petugas v-if="dialog"></form-tambah-petugas>
                    </v-card-text>
                    <div>
                        <v-divider/>
                        <v-card-actions>
                            <v-btn text @click="dialog = false">
                                Batal
                            </v-btn>
                            <v-spacer></v-spacer>
                            <v-btn text type="submit" :loading="loading" color="primary">
                                Tambah
                            </v-btn>
                        </v-card-actions>
                    </div>
                </v-card>
                <v-snackbar v-model="snackbar.status" timeout="10000" app elevation="0">
                    {{ snackbar.message }}
                </v-snackbar>
            </v-form>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahPetugas from './FormTambahPetugas.vue'
export default {
    components: {
        FormTambahPetugas,
    },
    data(){
        return {
            loading: false,
            snackbar: {
                status: false,
                message: "Error!",
            },
        }
    },
    computed: {
        ...mapState({
            modal_tambah: state => state.petugas.modal.tambah,
        }),
        dialog: {
            set(val){
                this.$emit('modal:tambah', val)
            },
            get(){
                return this.modal_tambah
            }
        },
    },
    methods: {
        ...mapActions({
            storebidang: 'petugas/store',
        }),
        ...mapMutations({
            setError: 'petugas/SET_ERRORS',
        }),
        async submit(e){
            this.loading = true

            let formdata = new FormData(e.target)
            let res = await this.storebidang(formdata).catch(e => {
                
                if(e.response.status == 422)
                    this.setError(e.response.data.errors)
                
                this.snackbar.status = true
                this.snackbar.message = e.response.data.message || e.message 
                this.loading = false
            })
            this.loading = false
            if(res){
                this.$emit('done', res)
                this.dialog = false
            }
        }
    }
}
</script>