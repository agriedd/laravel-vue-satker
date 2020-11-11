<template>
    <div class="grid grey lighten-2">
        <div>
            <info-satker @update:jumlah="jumlah_satker = $event"/>
        </div>
        <div>
            <info-struktur :jumlah_satker="jumlah_satker"/>
        </div>
    </div>
</template>
<script>
import InfoSatker from './InfoSatker.vue'
import InfoStruktur from './InfoStruktur.vue'
export default {
    components: {
        InfoSatker,
        InfoStruktur,
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