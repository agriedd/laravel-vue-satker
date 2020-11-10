<template>
    <div>
        <v-card-text class="d-flex">
            <v-text-field type="search" hide-details outlined dense placeholder="Temukan..." v-model="search" :loading="loading"/>
        </v-card-text>
        <v-list v-if="total">
            <v-list-item v-for="item in items" :key="item.id">
                <div class="d-flex justify-center pb-3" style="position: relative; width: 100%">
                    <v-img :src="item.gambar_url" class="rounded" max-width="100%" max-height="100vh"/>
                </div>
            </v-list-item>
        </v-list>
        <v-list v-else-if="!loading">
            <v-list-item>
                <v-list-title>
                    Tidak Ada Data Struktur Organisasi
                </v-list-title>
            </v-list-item>
        </v-list>
        <v-list v-else-if="loading">
            <div class="d-flex justify-center py-10">
                <v-progress-circular indeterminate/>
            </div>
        </v-list>
        <slot v-bind:update="update"></slot>
        <v-snackbar v-if="snackbar.status" :message="snackbar.message"/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    props: {
        params: Object,
    },
    components: {},
    data(){
        return {
            items: [],
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
            getStruktur: 'struktur/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getStruktur({...this.options, search: this.search, ...this.params}).catch(e => {
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
        this.getData()
    }
}
</script>