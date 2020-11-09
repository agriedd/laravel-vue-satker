<template>
    <v-app>
		<v-progress-linear indeterminate fixed top style="z-index: 100000"></v-progress-linear>
        <sidebar-default/>
		<transition name="page-transition" mode="out-in">
			<router-view></router-view>
		</transition>
	</v-app>
</template>
<script>
import SidebarDefault from './Sidebar/SidebarDefault.vue'
export default {
    components: {
        SidebarDefault
    }
}
</script>