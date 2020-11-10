<template>    
    <v-list-item>
        <v-list-item-content>
            <v-list-item-subtitle>
                {{ label }}
            </v-list-item-subtitle>
            <v-list-item-title>
                {{ value }}
            </v-list-item-title>
        </v-list-item-content>
        <slot></slot>
    </v-list-item>
</template>
<script>
export default {
    props: {
        label: String|Number,
        value: { default: '-' },
    }
}
</script>