<template>
    <div>
        <v-dialog v-model="dialog" content-class="shadow fill-height rounded-0 ma-0 ml-auto h-100" scrollable max-width="750" transition="slide-x-reverse-transition">
            <v-card rounded="0">
                <div>
                    <v-card-text>
                        Informasi Satker
                    </v-card-text>
                    <v-divider/>
                </div>
                <v-card-text class="pa-0">
                    <info-satker v-if="dialog" @loading="loading = $event"/>
                </v-card-text>
                <div>
                    <v-divider/>
                    <v-card-actions>
                        <v-btn text @click="dialog = false">
                            Tutup
                        </v-btn>
                        <v-spacer></v-spacer>
                        <!-- <v-btn :loading="loading" icon>
                            <v-icon>mdi-pencil</v-icon>
                        </v-btn>
                        <v-btn :loading="loading" icon color="error">
                            <v-icon>mdi-delete</v-icon>
                        </v-btn> -->
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
import InfoSatker from './InfoSatkerFull.vue'
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
            modal_info: state => state.satker.modal.info,
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