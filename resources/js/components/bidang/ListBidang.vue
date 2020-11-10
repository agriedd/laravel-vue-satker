<template>
    <div>
        <v-slide-x-transition mode="out-in">
            <div :key="id">
                <div v-if="id != null">
                    <v-list>
                        <v-list-item>
                            <v-list-item-action>
                                <v-btn @click="id = null" icon>
                                    <v-icon>mdi-arrow-left</v-icon>
                                </v-btn>
                            </v-list-item-action>
                        </v-list-item>
                        <v-divider></v-divider>
                        <info-bidang-template :bidang="bidang"/>
                    </v-list>
                </div>
                <div v-else>
                    <v-card-text class="d-flex">
                        <v-text-field type="search" hide-details outlined dense placeholder="Temukan..." v-model="search" :loading="loading"/>
                    </v-card-text>
                    <v-list v-if="total">
                        <v-list-item-group v-model="id">
                            <template v-for="item in items">
                                <v-list-item :key="item.id">
                                    <v-list-item-icon>
                                        <v-icon>mdi-crown</v-icon>
                                    </v-list-item-icon>
                                    <v-list-item-content>
                                        <v-list-item-title>
                                            {{ item.nama_bidang }}
                                        </v-list-item-title>
                                        <v-list-item-subtitle>
                                            {{ item.nama_kepala_b }}
                                        </v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>
                                <v-divider :key="`${item.id}-2`"/>
                            </template>
                        </v-list-item-group>
                    </v-list>
                    <v-list v-else-if="!loading">
                        <v-list-item>
                            <v-list-title>
                                Tidak Ada Data Bidang
                            </v-list-title>
                        </v-list-item>
                    </v-list>
                    <v-list v-else-if="loading">
                        <div class="d-flex justify-center py-10">
                            <v-progress-circular indeterminate/>
                        </div>
                    </v-list>
                </div>
            </div>
        </v-slide-x-transition>
        <slot v-bind:update="update"></slot>
        <v-snackbar v-if="snackbar.status" :message="snackbar.message"/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
import InfoBidangTemplate from './InfoBidangTemplate.vue'
export default {
    components: {
        InfoBidangTemplate,
    },
    props: {
        params: Object,
    },
    computed: {
        bidang(){
            return this.items[this.id]
        }
    },
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
            id: null,
        }
    },
    methods: {
        ...mapActions({
            getpimpinan: 'bidang/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getpimpinan({...this.options, search: this.search, ...this.params}).catch(e => {
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