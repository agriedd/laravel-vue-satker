<template>
    <div>
        <v-card-text class="d-flex">
            <v-text-field type="search" hide-details outlined dense placeholder="Temukan..." v-model="search"/>
        </v-card-text>
        <v-data-table
            :headers="headers"
            :items="items"
            :options.sync="options"
            :server-items-length="total"
            :loading="loading"
            @update:options="update($event)"
            fixed-header
            :footer-props="{'items-per-page-options':[5, 10, 20, 30, 50, 100]}">
            <template #item.id_bidang="{ item }">
                <v-menu content-class="shadow-lg" open-on-hover max-width="400" min-width="300">
                    <template #activator="{ attrs, on }">
                        <div v-bind="attrs" v-on="on">
                            {{ item.bidang.nama_bidang }}
                        </div>
                    </template>
                    <!-- <info-satker-hover :value="item.satker"/> -->
                </v-menu>
            </template>
            <template #item.status="{ item }">
                <v-chip small :color="item.status == 'PNS' ? 'yellow' : null">
                    <v-icon v-if="item.status == 'PNS'" x-small left>mdi-asterisk</v-icon>
                    {{ item.status }}
                </v-chip>
            </template>
            <template #item.gambar="{ item }">
                <v-menu content-class="shadow-lg" open-on-hover max-width="400" min-width="300">
                    <template #activator="{ attrs, on }">
                        <div v-bind="attrs" v-on="on" class="pa-3">
                            <v-img max-height="3rem" height="3rem" width="3rem" class="rounded mx-auto" :src="item.gambar_url" aspect-ratio="1"></v-img>
                        </div>
                    </template>
                    <v-card>
                        <v-img :src="item.gambar_url"/>
                    </v-card>
                </v-menu>
            </template>
            <template #item.action="{ item }">
                <template v-if="!pimpinan">
                    <v-btn icon @click="openModal('ubah', item.id_kegiatan)">
                        <v-icon small>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn icon @click="openModal('hapus', item.id_kegiatan)">
                        <v-icon small>mdi-delete</v-icon>
                    </v-btn>
                </template>
                <v-btn icon @click="openModal('info', item.id_kegiatan)">
                    <v-icon small>mdi-arrow-left</v-icon>
                </v-btn>
            </template>
        </v-data-table>
        <slot v-bind:update="update"></slot>
        <v-snackbar v-if="snackbar.status" :message="snackbar.message"/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import InfoSatkerHover from '../Satker/InfoSatkerHover.vue'
export default {
    props: {
        pimpinan: Boolean,
    },
    components: {
        InfoSatkerHover,
    },
    data(){
        return {
            items: [],
            headers: [
                { text: 'ID', align: 'start', sortable: true, value: 'id_kegiatan' },
                { text: null, align: 'end', sortable: false, value: 'gambar' },
                { text: 'Nama Kegiatan', align: 'start', sortable: true, value: 'nama_kegiatan' },
                { text: 'Tanggal', align: 'start', sortable: true, value: 'tanggal' },
                { text: 'Lokasi', align: 'start', sortable: true, value: 'lokasi' },
                { text: 'Bidang', align: 'start', sortable: true, value: 'id_bidang' },
                { text: '', align: 'end', sortable: false, value: 'action' },
            ],
            options: {
                page: 1,
                itemsPerPage: 10,
                sortBy: ['created_at'],
                sortDesc: [true],
                groupBy: [],
                groupDesc: [],
                mustSort: false,
                multiSort: false,
            },
            total: 0,
            search: '',
            loading: false,
            snackbar: {
                status: true,
                message: "Error!",
            },
            lazyTransition: null,
        }
    },
    methods: {
        ...mapActions({
            getBidang: 'kegiatan/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getBidang({...this.options, search: this.search}).catch(e => {
                this.snackbar.status = true
                this.snackbar.message = e.message
                this.loading = false
            });

            this.loading = false
            
            if(res){
                this.items = res.data.data
                let meta = res.data.meta
                this.options = {
                    ...this.options,
                    page: parseInt(meta.current_page),
                    itemsPerPage: parseInt(meta.per_page),
                    mustSort: false,
                    multiSort: false,
                }
                this.total = parseInt(meta.total)
            }
        },
        update(){
            this.getData()
        },
        lazy(callback){
            if(this.lazyTransition)
                clearTimeout(this.lazyTransition);
            this.lazyTransition = setTimeout(()=>{
                callback();
                this.lazyTransition = null;
            }, 800);
        },
        openModal(t, id = null){
            if(t == 'tambah')
                this.$emit('modal:tambah')
            else if(t == 'ubah')
                this.$emit('modal:ubah', id)
            else if(t == 'hapus')
                this.$emit('modal:hapus', id)
            else if(t == 'info')
                this.$emit('modal:info', id)
        }
    },
    watch: {
        search(val, old){
            if(val != old)
                this.lazy(_=>this.getData())
        }
    },
    created(){
    }
}
</script>