<template>
    <v-app>
		<v-progress-linear indeterminate v-if="loading" fixed top style="z-index: 100000"></v-progress-linear>
		<transition name="page-transition" mode="out-in">
			<router-view></router-view>
		</transition>
	</v-app>
</template>
<script>
import { mapState } from 'vuex'
export default {
    computed: {
        ...mapState({
            loading: state => state.navbar.loading
        })
    },
    components: {
    }
}
</script>