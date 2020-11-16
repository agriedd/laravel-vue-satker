<template>
    <div class="grid grey lighten-2">
        <div>
            <info-satker @update:jumlah="jumlah_satker = $event"/>
        </div>
        <div class="table">
            <v-list>
                <table-satker pimpinan
                    @modal:info="openModal('info', true, $event)">
                    <template #default>
                        <modal-info-satker @modal:info="openModal('info', $event)"/>
                    </template>
                </table-satker>
            </v-list>
        </div>
    </div>
</template>
<script>
import InfoSatker from './InfoSatker.vue'
import TableSatker from '../Satker/TableSatker.vue'
import { mapMutations } from 'vuex'
import ModalInfoSatker from '../Satker/ModalInfoSatker.vue'

export default {
    components: {
        InfoSatker,
        TableSatker,
        ModalInfoSatker,
    },
    data(){
        return {
            jumlah_satker: 0
        }
    },
    methods: {
        ...mapMutations({
            setModalInfo: 'satker/SET_MODAL_INFO',
            setId: 'satker/SET_ID',
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
    }
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