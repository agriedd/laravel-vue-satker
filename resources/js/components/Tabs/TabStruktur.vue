<template>
    <div class="grid grey lighten-2">
        <div>
            <info-struktur/>
        </div>
        <div class="table">
            <v-list class="fill-height">
                <table-struktur pimpinan/>
            </v-list>
        </div>
    </div>
</template>
<script>
import InfoStruktur from './InfoStruktur.vue'
import TableStruktur from '../StrukturOrganisasi/TableStruktur.vue'

export default {
    components: {
        InfoStruktur,
        TableStruktur,
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