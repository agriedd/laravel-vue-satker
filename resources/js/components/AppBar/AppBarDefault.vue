<template>
    <v-app-bar
        :color="color"
        dark
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
                <v-app-bar-nav-icon @click.stop="toggleDrawer" :color="colorAccent"></v-app-bar-nav-icon>
                <slot name="append"></slot>
            </div>
            <div class="d-flex pb-2">
                <slot name="append.bottom"></slot>
            </div>
        </div>
        <div class="d-flex flex-column justify-center fill-height ml-auto">
            <slot>
                
            </slot>
        </div>
    </v-app-bar>
</template>
<script>
import { mapMutations } from 'vuex'
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
    methods: {
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