<template>
    <v-list>
        <list-item v-model="kegiatan.nama_kegiatan" label="Nama Kegiatan"></list-item>
        <div v-if="kegiatan.gambar_url" class="pb-5" key="2">
            <v-img :src="kegiatan.gambar_url" max-width="100%" max-height="50vh" aspect-ratio="1"/>
        </div>
        <list-item v-model="kegiatan.lokasi" label="Lokasi">
            <v-list-item-icon>
                <v-icon>mdi-map-marker</v-icon>
            </v-list-item-icon>
        </list-item>
        <list-item v-model="kegiatan.tanggal" label="Tanggal">
            <v-list-item-icon>
                <v-icon>mdi-calendar</v-icon>
            </v-list-item-icon>
        </list-item>
        <v-divider/>
        <v-card-text>
            <v-list-item-subtitle class="text--disabled">
                Rincian Kegiatan
            </v-list-item-subtitle>
            <div v-html="kegiatan.rincian_kegiatan"></div>
        </v-card-text>
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
        kegiatan: Object,
    }
}
</script>