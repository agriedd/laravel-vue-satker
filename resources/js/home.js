/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { Carousel, Tooltip } from 'bootstrap'
window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data(){
        return {
            carousel: {},
            login: true,
        }
    },
    methods: {
        nextSlide(name = 'main'){
            let carousel = this.carousel[name]
            if(carousel) carousel.next()
        },
        prevSlide(name = 'main'){
            let carousel = this.carousel[name]
            if(carousel) carousel.prev()
        },
        previousSlide(name = 'main'){ this.prevSlide(name) },
        toggleLogin(){
            this.login = !this.login
        }
    },
    mounted(){
        let carousel = document.getElementById('main-slide')
        if(!this.carousel['main'] && carousel){
            let objCarousel = new Carousel(carousel, {
                interval: 6000,
                pause: "hover",
            })
            this.$set(this.carousel, 'main', objCarousel)
        }
        let tooltip = document.querySelectorAll('[data-toggle="tooltip"]')
        if(tooltip){
            Array.from(tooltip).forEach(e => {
                new Tooltip(e)
            })
        }
    }
});
