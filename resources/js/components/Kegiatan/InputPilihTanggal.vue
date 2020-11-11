<template>
    <v-menu
        ref="tanggal"
        v-model="menu"
        :close-on-content-click="false"
        transition="scale-transition"
        offset-y
        min-width="290px">
        <template v-slot:activator="{ on, attrs }">
            <v-text-field
                v-model="tanggal"
                name="tanggal"
                label="Tanggal Kegiatan"
                append-icon="mdi-calendar"
                readonly
                :error-messages="errors.tanggal"
                v-bind="attrs"
                v-on="on"/>
        </template>
        <v-date-picker v-model="tanggal" no-title scrollable>
            <v-spacer/>
            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
            <v-btn text color="primary" @click="$refs.tanggal.save(tanggal); clearError()">OK</v-btn>
        </v-date-picker>
    </v-menu>
</template>
<script>
export default {
    props: {
        value: String,
        errors: {},
    },
    computed: {
        tanggal: {
            get(){
                return this.value
            },
            set(val){
                this.$emit('input', val)
            }
        },
    },
    data(){
        return {
            menu: false,
        }
    },
    methods: {
        clearError(){
            this.$emit('clear:error')
        }
    }
}
</script>