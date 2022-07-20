<template>
    <v-app>
                <v-container fluid class="fill-height" v-if="loading">
            <v-row align="center" justify="center">
                <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </v-row>
        </v-container>
        <div v-else>
        <Nav/>
        <v-container class="my-16">
            <p class="display-1">Data Laporan</p>
            <v-data-table 
            :headers="headers"
            :items="laporan"
            group-by="area"
            ></v-data-table>
        </v-container>
        <Footer/>
        </div>
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
    data () {
      return {
        loading: true,
        headers: [
          {
            text: '',
            align: 'start',
            value: 'laporan',
            groupable: false,
          },
          { text: '', value: 'area'},
          { text: 'Minyak', value: 'minyak' },
          { text: 'Non-Minyak', value: 'minyak' },
            { text: 'Semua', value: 'all' },
        ],
        laporan: [],
      }
    },

    methods: {
        async loadData(){
            await axios.get('/api/laporan/laporan').then(response => {
                this.laporan = response.data
            })
            this.loading = false
        }
    },

    mounted() {
        this.loadData()
    },
}
</script>