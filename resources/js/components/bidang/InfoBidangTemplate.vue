<template>
    <v-list>
        <list-item v-model="bidang.nama_bidang" label="Nama Bidang"></list-item>
        <list-item v-model="bidang.nama_kepala_b" label="Nama Kepala Bidang">
            <v-list-item-icon>
                <v-icon>mdi-account</v-icon>
            </v-list-item-icon>
        </list-item>
        <v-divider/>
        <v-card-text>
            <v-list-item-subtitle class="text--disabled">
                Visi Misi
            </v-list-item-subtitle>
            <div v-html="bidang.visi_misi_html"></div>
        </v-card-text>
        <v-divider/>
        <list-item v-model="bidang.tujuan" label="Tujuan">
            <v-list-item-icon>
                <v-icon>mdi-target</v-icon>
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
        bidang: Object,
    }
}
</script>