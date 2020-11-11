<template>
    <div class="grid grey lighten-2">
        <div>
            <info-satker @update:jumlah="jumlah_satker = $event"/>
        </div>
        <div>
            <v-list>
                <v-list-item>
                    <v-list-item-icon>
                        <v-icon>mdi-bookmark</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>
                            Satker
                        </v-list-item-title>
                        <v-list-item-subtitle>
                            Laporan Satker
                        </v-list-item-subtitle>
                    </v-list-item-content>
                    <v-list-item-action>
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-list-item-action>
                </v-list-item>
                <v-divider/>
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
        grid-template-columns: minmax(300px, 1fr) minmax(600px, auto);
        grid-auto-rows: minmax(300px, 1fr);
        grid-gap: 1px;
    }
</style>