<template>
    <div class="grid grey lighten-2">
        <div>
            <info-satker @update:jumlah="jumlah_satker = $event"/>
        </div>
        <div>
            <info-struktur :jumlah_satker="jumlah_satker"/>
        </div>
        <div>
            <info-petugas/>
        </div>
        <div>
            <info-bidang :jumlah_satker="jumlah_satker"/>
        </div>
        <div>
            <info-kegiatan/>
        </div>
    </div>
</template>
<script>
import InfoSatker from './InfoSatker.vue'
import InfoStruktur from './InfoStruktur.vue'
import InfoPetugas from './InfoPetugas.vue'
import InfoBidang from './InfoBidang.vue'
import InfoKegiatan from './InfoKegiatan.vue'
export default {
    components: {
        InfoSatker,
        InfoStruktur,
        InfoPetugas,
        InfoBidang,
        InfoKegiatan,
    },
    data(){
        return {
            jumlah_satker: 0
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