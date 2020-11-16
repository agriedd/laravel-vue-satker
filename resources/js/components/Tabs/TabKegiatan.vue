<template>
    <div class="grid grey lighten-2">
        <div>
            <info-kegiatan :params="{ id_bidang: user.id_bidang }"/>
        </div>
        <div class="table">
            <v-list class="fill-height">
                <!-- <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-bookmark</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>
                            Export
                        </v-list-item-title>
                        <v-list-item-subtitle>
                            Laporan Kegiatan
                        </v-list-item-subtitle>
                    </v-list-item-content>
                    <v-list-item-action>
                        <v-btn link href="#" icon>
                            <v-icon>mdi-download</v-icon>
                        </v-btn>
                    </v-list-item-action>
                </v-list-item>
                <v-divider/> -->
                <table-kegiatan pimpinan :params="{ id_bidang: user.id_bidang }"
                    @modal:info="openModal('info', true, $event)">
                    <template #default>
                        <modal-info-kegiatan @modal:info="openModal('info', $event)" @done="update(null)"/>
                    </template>
                </table-kegiatan>
            </v-list>
        </div>
    </div>
</template>
<script>
import InfoKegiatan from './InfoKegiatan.vue'
import TableKegiatan from '../Kegiatan/TableKegiatan.vue'
import { mapMutations, mapState } from 'vuex'
import ModalInfoKegiatan from '../Kegiatan/ModalInfoKegiatan.vue'

export default {
    components: {
        InfoKegiatan,
        TableKegiatan,
        ModalInfoKegiatan,
    },
    data(){
        return {
            jumlah_satker: 0
        }
    },
    computed: {
        ...mapState({
            user: state => state.pimpinan.user
        })
    },
    methods: {
        ...mapMutations({
            setModalInfo: 'kegiatan/SET_MODAL_INFO',
            setId: 'kegiatan/SET_ID',
        }),
        openModal(t, e = true, id = null){
            switch (t) {
                default:
                case 'info':
                    this.setId(id)
                    this.setModalInfo(e)
                    break;
            }
        }
    },
}
</script>
<style lang="scss" scoped>
    .grid{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-auto-rows: minmax(300px, 1fr);
        grid-gap: 1px;
    }
</style>