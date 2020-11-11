<template>
    <v-list>
        <list-item v-model="petugas.nama" label="Nama Petugas"></list-item>
        <list-item v-model="petugas.nip" label="NIP"></list-item>
        <list-item v-model="petugas.pangkat" label="Pangkat | Golongan">
            <v-list-item-icon>
                <v-icon>mdi-crown</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="petugas.status" label="Status">
            <v-list-item-icon v-if="petugas.status == 'PNS'">
                <v-icon>mdi-star</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="petugas.alamat" label="Alamat">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
        <v-divider/>
        <slot></slot>
    </v-list>
</template>
<script>
import ListItem from '../List/ListItem.vue'
export default {
    components: {
        ListItem,
    },
    props: {
        petugas: Object,
    }
}
</script>