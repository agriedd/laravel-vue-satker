<template>
    <v-list nav class="grow mx-auto" style="max-width: 270px">
        <template
            v-for="item in listtop">
            <v-list-item
                :key="item.title"
                :to="item.link"
                :color="color"
                link
                exact>
                <v-list-item-icon>
                    <v-icon>{{ item.icon }}</v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                    <v-list-item-title>{{ item.title }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </template>
        <template v-for="item in listgroup">
            <v-list-group
                :color="color"
                :key="item.title" v-model="item.active" :prepend-icon="item.icon" :dense="dense">
                <template v-slot:activator>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.title"></v-list-item-title>
                    </v-list-item-content>
                </template>
                <template v-for="child in item.items">
                    <v-list-item
                        :key="child.title"
                        :to="child.link"
                        :color="color"
                        class="px-5"
                        link
                        :dense="dense"
                        exact>
                        <v-list-item-icon>
                            <v-icon small>{{ child.icon }}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>{{ child.title }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list-group>
        </template>
        <template v-for="item in listbottom">
            <template>
                <template v-if="item.items">
                    <v-list-group
                        :color="color"
                        :key="item.title" v-model="item.active" :prepend-icon="item.icon">
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title v-text="item.title"></v-list-item-title>
                            </v-list-item-content>
                        </template>
                        <template v-for="child in item.items">
                            <v-list-item
                                :key="child.title"
                                :to="child.link"
                                :color="color"
                                class="px-5"
                                link
                                :dense="false"
                                exact>
                                <v-list-item-icon>
                                    <v-icon small>{{ child.icon }}</v-icon>
                                </v-list-item-icon>
                                <v-list-item-content>
                                    <v-list-item-title>{{ child.title }}</v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </template>
                    </v-list-group>
                </template>
                <template v-else>
                    <v-list-item
                        :key="item.title"
                        :to="item.link"
                        :color="color"
                        link
                        exact>
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>
                        <v-list-item-content>
                            <v-list-item-title>{{ item.title }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </template>
        </template>
    </v-list>
</template>
<script>
import { mapState } from 'vuex'
export default {
    props: {
        color: { default: 'primary' },
        config: { default(){
            return {}
        } },
        listtop: { required: true },
        listbottom: { required: true },
        listgroup: { required: true },
    },
    computed: {
        ...mapState({
            'statusDrawer': state => state.navbar.drawer,
            'minidrawer': state => state.navbar.mini_drawer,
            // admin: state => state.admin.user,
        }),
        isAdmin(){
            // return this.admin.admin || this.admin.developer
        },
        drawer: {
            get(){ return this.statusDrawer },
            set(value){ /** */ },
        },
        dense(){
            return !this.minidrawer
        }
    }
}
</script>