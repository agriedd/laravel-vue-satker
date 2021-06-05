<template>
    <div>
        <v-dialog v-model="dialog" content-class="shadow fill-height rounded-0 ma-0 ml-auto h-100" scrollable max-width="750" transition="slide-x-reverse-transition">
            <v-card rounded="0">
                <div>
                    <v-card-text>
                        Informasi Pegawai
                    </v-card-text>
                    <v-divider/>
                </div>
                <v-card-text class="pa-0">
                    <info-petugas v-if="dialog" @loading="loading = $event"/>
                </v-card-text>
                <div>
                    <v-divider/>
                    <v-card-actions>
                        <v-btn text @click="dialog = false">
                            Tutup
                        </v-btn>
                        <v-spacer></v-spacer>
                    </v-card-actions>
                </div>
            </v-card>
            <v-snackbar v-model="snackbar.status" timeout="10000" app elevation="0">
                {{ snackbar.message }}
            </v-snackbar>
        </v-dialog>
    </div>
</template>
<script>
import { mapActions, mapMutations, mapState } from 'vuex'
import InfoPetugas from './InfoPetugasFull.vue'
export default {
    components: {
        InfoPetugas,
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
            modal_info: state => state.petugas.modal.info,
        }),
        dialog: {
            set(val){
                this.$emit('modal:info', val)
            },
            get(){
                return this.modal_info
            }
        },
    },
    methods: {

    }
}
</script>