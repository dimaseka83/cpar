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
            <v-menu
        ref="menu"
        v-model="menu"
        transition="scale-transition"
        offset-y
        min-width="auto"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="date"
            label="Tanggal Laporan"
            prepend-icon="mdi-calendar"
            readonly
            v-bind="attrs"
            v-on="on"
            clearable
            @click:clear="date = null"
          ></v-text-field>
        </template>
        <v-date-picker
          v-model="date"
          no-title
          scrollable
        >
          <v-spacer></v-spacer>
          <v-btn
            text
            color="primary"
            @click="menu = false"
          >
            Cancel
          </v-btn>
          <v-btn
            text
            color="primary"
            @click="$refs.menu.save(date)"
          >
            OK
          </v-btn>
        </v-date-picker>
      </v-menu>
            <v-data-table 
            :headers="headers"
            :items="filterdatelaporan"
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
        menu: false,
              date: null,
      menu: false,
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

    computed: {
        filterdatelaporan(){
            if(this.date == null){
                return this.laporan
            }
            else{
                return this.laporan.filter(laporan => {
                    return laporan.tanggal == this.date
                })
            }
        }
    },

    mounted() {
        this.loadData()
    },
}
</script>