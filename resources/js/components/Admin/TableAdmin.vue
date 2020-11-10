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
            <template #item.action="{ item }">
                <v-btn icon @click="openModal('ubah', item.id)">
                    <v-icon small>mdi-pencil</v-icon>
                </v-btn>
                <v-btn icon @click="openModal('hapus', item.id)">
                    <v-icon small>mdi-delete</v-icon>
                </v-btn>
            </template>
        </v-data-table>
        <slot v-bind:update="update"></slot>
        <v-snackbar v-if="snackbar.status" :message="snackbar.message"/>
    </div>
</template>
<script>
import { mapActions } from 'vuex'
export default {
    data(){
        return {
            items: [],
            headers: [
                { text: 'ID', align: 'start', sortable: true, value: 'id' },
                { text: 'Nama', align: 'start', sortable: true, value: 'nama' },
                { text: 'Email', align: 'start', sortable: true, value: 'email' },
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
            getAdmin: 'admin/get',
        }),
        async getData(){
            this.loading = true

            let res = await this.getAdmin({...this.options, search: this.search}).catch(e => {
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