<template>
    <v-list>
        <list-item v-model="value.nama" label="Nama"/>
        <list-item v-model="value.iso" label="ISO"/>
        <list-item v-model="value.alamat" label="Alamat">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="value.status" label="Status"/>
        <v-divider/>
        <list-item v-model="value.lain_lain" label="Keterangan">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
    </v-list>
</template>
<script>
import ListItem from '../List/ListItem.vue'
export default {
    components: {
        ListItem,
    },
    props: {
        value: Object
    }
}
</script>