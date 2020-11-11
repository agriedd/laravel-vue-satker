<template>
    <v-navigation-drawer
        v-model="drawer"
        app
        :mini-variant="minidrawer"
        mini-variant-width="80"
        width="275"
        class="nav-drawer"
        :color="color"
        dark>
        <template v-slot:prepend>
            <div>
                <v-list>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{ admin.nama }}
                            </v-list-item-title>
                            <v-list-item-subtitle>
                                {{ admin.email }}
                            </v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-icon>
                            <v-chip small color="green">
                                On
                            </v-chip>
                        </v-list-item-icon>
                    </v-list-item>
                </v-list>
                <v-divider/>
            </div>
        </template>
        <sidebar-nav/>
        <template v-slot:append>
            <v-divider/>
            <v-row v-if="!minidrawer">
                <v-col cols="12" class="mx-auto" style="max-width: 250px">
                    <div class="flex-wrap d-flex">
                        <!-- <v-btn text icon @click="openSettings()">
                            <v-icon>mdi-cog</v-icon>
                        </v-btn> -->
                        <v-tooltip top>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn text icon @click="toggleMode"
                                    v-bind="attrs"
                                    v-on="on">
                                    <v-icon v-if="!$vuetify.theme.dark">mdi-weather-night</v-icon>
                                    <v-icon v-else>mdi-weather-sunny</v-icon>
                                </v-btn>
                            </template>
                            <span>Ganti Tema</span>
                        </v-tooltip>
                        <div class="d-inline-block">
                            <form :action="host('logout')" class="wrap d-inline-block" method="POST">
                                <input type="hidden" name="_token" :value="token">
                                <v-tooltip top>
                                    <template v-slot:activator="{ on, attrs }">
                                        <v-btn text icon type="submit"
                                            v-bind="attrs"
                                            v-on="on">
                                            <v-icon>mdi-power</v-icon>
                                        </v-btn>
                                    </template>
                                    <span>Keluar</span>
                                </v-tooltip>
                            </form>
                        </div>
                        <v-tooltip top>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn text icon @click="toggleMini"
                                    v-bind="attrs"
                                    v-on="on"
                                    class="ml-auto">
                                    <v-icon>mdi-chevron-left</v-icon>
                                </v-btn>
                            </template>
                            <span>Minimalis</span>
                        </v-tooltip>
                    </div>
                </v-col>
            </v-row>
            <template v-else>
                <v-list nav>
                    <v-list-item @click="toggleMini()">
                        <v-icon>mdi-chevron-right</v-icon>
                    </v-list-item>
                    <!-- <v-list-item>
                        <v-icon>mdi-cog</v-icon>
                    </v-list-item> -->
                </v-list>
            </template>
        </template>
    </v-navigation-drawer>
</template>
<script>
import { mapState, mapMutations, mapActions } from 'vuex'
import SidebarNav from './SidebarNav.vue'
import { host, csrf_token } from '../../configs/main'
export default {
    components: {
        SidebarNav,
    },
    props: {
    },
    computed: {
        ...mapState({
            'statusDrawer': state => state.navbar.drawer,
            'statusMiniDrawer': state  => state.navbar.mini_drawer,
            admin: state => state.admin.user
        }),
        drawer: {
            get(){ return this.statusDrawer },
            set(val){ this.setDrawer(val) }
        },
        minidrawer: {
            get(){ return this.statusMiniDrawer },
            set(val){ this.setMiniDrawer(val) }
        },
        color(){
            return null
            return this.$vuetify.theme.dark ? 'dark' : 'dark'
        }
    },
    data(){
        return {
            expandOnHover: false,
            miniVariant: false,
            right: false,
            permanent: true,
            bg: null,
            listbottom: [
                { title: "Rayon", icon: "mdi-bookmark", link: "/admin/rayon" },
            ],
            dialogs: {
                settings: false,
            },
            token: csrf_token
        }
    },
    methods: {
        ...mapActions({
            toggleDrawerTambahan: 'sidebar/toggle',
        }),
        ...mapMutations({
            setDrawer: 'navbar/SET_DRAWER',
            setMiniDrawer: 'navbar/SET_MINI_DRAWER',
            toggleMiniDrawer: 'navbar/TOGGLE_MINI_DRAWER',
        }),
        toggleMode(){
            this.$vuetify.theme.dark = !this.$vuetify.theme.dark;
        },
        toggleMini(){
            this.toggleMiniDrawer()
        },
        host,
    },
    created(){
        console.log(this.$store);
    }
}
</script>