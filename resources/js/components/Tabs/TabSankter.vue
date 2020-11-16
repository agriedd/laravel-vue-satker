<template>
    <div class="grid grey lighten-2">
        <div>
            <info-satker @update:jumlah="jumlah_satker = $event"/>
        </div>
        <div class="table">
            <v-list>
                <table-satker pimpinan/>
            </v-list>
        </div>
    </div>
</template>
<script>
import InfoSatker from './InfoSatker.vue'
import TableSatker from '../Satker/TableSatker.vue'

export default {
    components: {
        InfoSatker,
        TableSatker,
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