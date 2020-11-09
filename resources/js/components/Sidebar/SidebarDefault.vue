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
                <!-- <InfoAdmin>
                    <v-list-item-action>
                        <v-btn icon @click="toggleDrawerTambahan()">
                            <v-icon>mdi-chevron-triple-left</v-icon>
                        </v-btn>
                    </v-list-item-action>
                </InfoAdmin> -->
                <v-divider/>
            </div>
        </template>
        <!-- <sidebar-nav/> -->
        <template v-slot:append>
            <v-divider/>
            <v-row v-if="!minidrawer">
                <v-col cols="12" class="mx-auto" style="max-width: 250px">
                    <div class="flex-wrap d-flex">
                        <v-btn text icon @click="openSettings()">
                            <v-icon>mdi-cog</v-icon>
                        </v-btn>
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
                            <form :action="`${$store.state.navbar.host}logout`" class="wrap d-inline-block" method="POST">
                                <input type="hidden" name="_token" :value="$store.state.navbar.token">
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
                    <v-list-item>
                        <v-icon>mdi-cog</v-icon>
                    </v-list-item>
                </v-list>
            </template>
        </template>
    </v-navigation-drawer>
</template>
<script>
import { mapState, mapMutations, mapActions } from 'vuex'
import SidebarNav from './SidebarNav.vue'
// import SettingsDialog from '../Modal/Settings/SettingDefault'
// import InfoAdmin from '../Info/Admin/InfoAdmin.vue'
export default {
    components: {
        SidebarNav,
        // SettingsDialog,
        // InfoAdmin,
    },
    props: {
    },
    computed: {
        ...mapState({
            'statusDrawer': state => state.navbar.drawer,
            'statusMiniDrawer': state  => state.navbar.mini_drawer,
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
            }
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
    },
    created(){
        console.log(this.$store);
    }
}
</script>