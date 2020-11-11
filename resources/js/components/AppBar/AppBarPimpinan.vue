<template>
    <v-app-bar
        :color="'orange'"
        light
        extended
        flat
        app
        absolute
        :height="height"
        :src="img"
        @click="imgClick($event)">
        <template v-slot:img="{ props }">
            <v-img
                v-if="img"
                v-bind="props"
                gradient="to top right, rgba(19,84,122,.5), rgba(128,208,199,.8)"/>
        </template>
        <div class="d-flex flex-column">
            <div class="d-flex pb-2">
                <slot name="append.top"></slot>
            </div>
            <div class="d-flex pb-2">
                <slot name="prepend"></slot>
                <slot name="append"></slot>
            </div>
            <div class="d-flex pb-2">
                <slot name="append.bottom"></slot>
            </div>
        </div>
        <div class="d-flex flex-column justify-center fill-height ml-auto">
            <slot>
                <div class="d-inline-block">
                    <form :action="host('logout')" class="wrap d-inline-block" method="POST">
                        <input type="hidden" name="_token" :value="token">
                        <v-tooltip bottom>
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
            </slot>
        </div>
    </v-app-bar>
</template>
<script>
import { mapMutations } from 'vuex'
import { host, csrf_token } from '../../configs/main'
export default {
    props: {
        title: {
            default: "Panel Admin",
        },
        color: {},
        img: { default: null },
        height: { default: "100px" },
        colorAccent: {},
    },
    data(){
        return {
            token: csrf_token
        }
    },
    methods: {
        host,
        ...mapMutations({
            toggleDrawer: 'navbar/TOGGLE_DRAWER'
        }),
        imgClick(e){
            if(e.target == document.querySelector('div.v-toolbar__content'))
                this.$emit('img:click')
        }
    }
}
</script>