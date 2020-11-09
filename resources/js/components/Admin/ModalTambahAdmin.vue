<template>
    <v-dialog v-model="dialog" content-class="shadow" scrollable max-width="400" persistent overlay-opacity=".2">
        <v-card>
            <v-form @submit.prevent="submit($event)" :disabled="loading">
                <div>
                    <v-card-text>
                        Form Tambah Admin
                    </v-card-text>
                    <v-divider/>
                </div>
                <v-card-text>
                    <form-tambah-admin v-if="dialog"></form-tambah-admin>
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
            </v-form>
        </v-card>
        <v-snackbar v-model="snackbar.status" timeout="10000" app right absolute>
            {{ snackbar.message }}
        </v-snackbar>
    </v-dialog>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import FormTambahAdmin from './FormTambahAdmin.vue'
export default {
    components: {
        FormTambahAdmin,
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
            modal_tambah: state => state.admin.modal.tambah,
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
            storeAdmin: 'admin/store',
        }),
        ...mapMutations({
            setError: 'admin/SET_ERRORS',
        }),
        async submit(e){
            this.loading = true

            let formdata = new FormData(e.target)
            let res = await this.storeAdmin(formdata).catch(e => {
                
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