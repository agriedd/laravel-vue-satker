<template>
    <div>
        <v-dialog v-model="dialog" content-class="shadow fill-height rounded-0 ma-0 ml-auto h-100" scrollable max-width="400" transition="slide-x-reverse-transition">
            <v-form @submit.prevent="submit($event)" :disabled="loading">
                <v-card rounded="0">
                    <div>
                        <v-card-text>
                            Apakah Anda Yakin Ingin Menghapus Data Ini?
                        </v-card-text>
                        <v-divider/>
                    </div>
                    <v-card-text>
                        <info-satker v-if="dialog" @loading="loading = $event"/>
                    </v-card-text>
                    <div>
                        <v-divider/>
                        <v-card-actions>
                            <v-btn text @click="dialog = false">
                                Batal
                            </v-btn>
                            <v-spacer></v-spacer>
                            <v-btn text type="submit" :loading="loading" color="error">
                                Hapus
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
import InfoSatker from './InfoSatker.vue'
export default {
    components: {
        InfoSatker,
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
            modal_hapus: state => state.satker.modal.hapus,
        }),
        dialog: {
            set(val){
                this.$emit('modal:hapus', val)
            },
            get(){
                return this.modal_hapus
            }
        },
    },
    methods: {
        ...mapActions({
            deleteSatker: 'satker/destroy',
        }),
        ...mapMutations({
            setError: 'satker/SET_ERRORS',
        }),
        async submit(e){
            this.loading = true

            let formdata = new FormData(e.target)
            formdata.append('_method', 'DELETE')
            let res = await this.deleteSatker(formdata).catch(e => {
                
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