<template>
    <v-menu
        ref="tanggal_lahir"
        v-model="menu"
        :close-on-content-click="false"
        transition="scale-transition"
        offset-y
        min-width="290px">
        <template v-slot:activator="{ on, attrs }">
            <v-text-field
                v-model="tanggal_lahir"
                name="tanggal_lahir"
                label="Tanggal Lahir"
                append-icon="mdi-calendar"
                readonly
                :error-messages="errors.tanggal_lahir"
                v-bind="attrs"
                v-on="on"/>
        </template>
        <v-date-picker v-model="tanggal_lahir" no-title scrollable>
            <v-spacer/>
            <v-btn text color="primary" @click="menu = false">Cancel</v-btn>
            <v-btn text color="primary" @click="$refs.tanggal_lahir.save(tanggal_lahir); clearError()">OK</v-btn>
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
        tanggal_lahir: {
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