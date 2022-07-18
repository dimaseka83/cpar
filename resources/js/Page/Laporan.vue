<template>
    <v-app>
        <Nav/>
        <Footer/>
    </v-app>
</template>
<script>
import mix from '../mixins/mix.js'
import Nav from '../components/Nav.vue'
import Footer from '../components/Footer.vue'
export default {
        mixins: [mix],
    components: {
        Nav,
        Footer
    },
}
</script>