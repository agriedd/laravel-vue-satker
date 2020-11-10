<template>
    <v-list>
        <list-item v-model="pimpinan.nama" label="Nama Pimpinan"></list-item>
        <list-item v-model="pimpinan.nip" label="NIP"></list-item>
        <list-item v-model="pimpinan.pangkat" label="Pangkat / Golongan">
            <v-list-item-icon>
                <v-icon>mdi-crown</v-icon>
            </v-list-item-icon>
        </list-item>
        <v-divider/>
        <list-item v-model="pimpinan.tempat_lahir" label="Tempat Lahir">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="pimpinan.tanggal_lahir" label="Tanggal Lahir">
            <v-list-item-icon>
                <v-icon>mdi-calendar</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="pimpinan.alamat" label="Alamat">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
        <v-divider/>
        <slot></slot>
    </v-list>
</template>
<script>
import ListItem from '../List/ListItem'
export default {
    components: {
        ListItem,
    },
    props: {
        pimpinan: Object,
    }
}
</script>