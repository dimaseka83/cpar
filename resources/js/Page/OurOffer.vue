<template>
    <v-app>
        <v-container fluid class="fill-height" v-if="loading">
            <v-row align="center" justify="center">
                <v-progress-circular indeterminate color="primary"></v-progress-circular>
            </v-row>
        </v-container>
      <div v-else>
          <Nav/>
        <!-- Page 1 -->
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/field.png);">
            <v-container class="fill-height py-16">
                <v-row class="justify-center">
                    <div> <h1 class="display-3 white--text text-uppercase">our offer</h1> 
                    <div class="d-flex justify-center">
                        <v-breadcrumbs :items="items" dark>
                        <template v-slot:divider>
                            <v-icon>mdi-circle-small</v-icon>
                        </template>
                    </v-breadcrumbs>
                    </div>
                    </div>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 2 -->
        <v-content class="bg-image" style="background-image: url(https://livewp.site/wp/md/agrosector/wp-content/uploads/sites/55/2019/02/Services_02.png); background-color: #262b2b;">
            <v-container class="my-16 white--text text-center">
                <v-row class="justify-center">
                    <p class="display-3 text-uppercase">{{ offer.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ offer.subtitle }}</p>
                </v-row>
                <v-row>
                    <v-col :cols="nosm ? '4' : '12'" v-for="(prd, i) in offer_prd" :key="'offer_prd'+i">
                        <v-card :height="height - 300">
                            <v-img :height="height - 300" :src="'./images/offer/offer_prd/'+prd.image"></v-img>
                        </v-card>
                        <p class="title font-weight-light mt-5">{{ prd.title }}</p>
                        <p class="subtitle font-weight-light grey--text">{{ prd.subtitle }}</p>
                    </v-col>
                </v-row>
                <p class="text-h5 font-weight-light mt-5">{{ offer_penawaran.title }}</p>
                <p class="subtitle font-weight-light grey--text">{{ offer_penawaran.subtitle }}</p>
                <div class="d-flex justify-center">
                    <v-btn class="mr-10" x-large color="green" dark>i want to purchase</v-btn>
                    <v-btn x-large color="green" dark>i want to sell</v-btn>
                </div>
            </v-container>
        </v-content>
        <!-- Page 3 -->
        <v-content>
            <v-container class="my-16">
                <v-row class="justify-center text-center">
                    <p class="display-3 text-uppercase">{{ page3.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ page3.subtitle }}</p>
                </v-row>
                <v-row>
                    <v-col>
                        <v-row align="end" justify="end" class="text-end">
                            <v-col cols="12" v-for="(left, i) in subpage3_left" :key="'left'+i">
                                <v-icon x-large color="green">{{ left.icon }}</v-icon>
                                <p class="title font-weight-light mt-5">{{ left.title }}</p>
                                <p class="subtitle font-weight-light grey--text">{{ left.subtitle }}</p>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col>
                        <v-img :height="height" src="https://agriwell.com/wp-content/uploads/2019/05/services-earth.png"></v-img>
                    </v-col>
                    <v-col>
                        <v-row align="start" justify="start" class="text-start">
                            <v-col cols="12" v-for="(right, i) in subpage3_right" :key="'right'+i">
                                <v-icon x-large color="green">{{ right.icon }}</v-icon>
                                <p class="title font-weight-light mt-5">{{ right.title }}</p>
                                <p class="subtitle font-weight-light grey--text">{{ right.subtitle }}</p>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
                <v-img class="mt-16" src="https://agriwell.com/wp-content/uploads/2020/01/organic-cyrcle.png"></v-img>
                <div class="d-flex justify-center">
                    <v-btn x-large color="green" dark>get in touch</v-btn>
                </div>
            </v-container>
        </v-content>
        <v-content class="bg-image" style="background-image: url(https://livewp.site/wp/md/agrosector/wp-content/uploads/sites/55/2019/02/Work.png); background-color: #262b2b;">
            <v-container class="my-16 white--text">
                <v-row class="justify-center text-center">
                    <p class="display-3 text-uppercase ">{{ page4.title }}</p> 
                    <p class="title font-weight-light grey--text">{{ page4.subtitle }}</p>
                </v-row>
                <div :class="nosm ? 'd-flex flex-wrap-reverse' : ''" v-if="nosm">
            <v-card class="rounded-circle mt-16 mx-auto transition-swing success" height="100" width="100" v-for="(prg, idx) in sub_page5" :key="'prg'+idx" >
                <v-card-title class=" justify-center mt-5" :class="nosm ? 'display-3' : 'h5-text pt-8'">
                    <v-icon dark x-large>{{ prg.icon }}</v-icon>
                </v-card-title>
            </v-card>
            </div>
            <v-row class="mt-5" v-if="nosm">
                <v-col v-for="(prg, idx) in sub_page5" :key="'prg1'+idx" class="text-center">
                    <p class="display-1">{{ prg.title }}</p>
                    <p class="font-weight-light grey--text">{{ prg.subtitle }}</p>
                </v-col>
            </v-row>
            <v-row v-if="sm">
                <v-col cols="12" v-for="(prg2, idx) in sub_page5" :key="'prg2'+idx" class="text-center">
                    <div class="d-flex justify-center">
                        <v-card class="rounded-circle success" height="100" width="30%">
                        <v-card-title class="white--text justify-center mt-5" :class="nosm ? 'display-3' : 'h5-text '">
                            <v-icon dark x-large>{{ prg2.icon }}</v-icon>
                        </v-card-title>
                    </v-card>
                    </div>
                    <p class="font-weight-black mt-5 text-h5">{{ prg2.title }}</p>
                    <p class="font-weight-light">{{ prg2.subtitle }}</p>
                </v-col>
            </v-row>
            </v-container>
        </v-content>
        <v-content>
            <v-container class="my-16">
                <v-row>
                    <v-col>
                        <v-img src="https://agriwell.com/wp-content/uploads/2019/08/services-earth2.png" :height="height"></v-img>
                    </v-col>
                    <v-col>
                        <v-row>
                            <v-col cols="12">
                                <p class="font-weight-bold display-3">{{ page6.title }}</p>
                                <p class="font-weight-light text-h5 grey--text mt-10">{{ page6.subtitle }}</p>
                            </v-col>
                            <v-col :cols="nosm ? '6' : '12'" v-for="(prg, idx) in subpage6" :key="'subpage6'+idx">
                                <number :from="0" :to="prg.number" :duration="2" easing="Power1.easeOut" class="mt-10 display-3 green--text"/>
                                <p class="text-h5 mt-5">{{ prg.title }}</p>
                                <p class="title grey--text">{{ prg.subtitle }}</p>
                            </v-col>
                        </v-row>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <Footer/>
      </div>
    </v-app>
</template>
<script>
import mix from '../mixins/mix.js'
import Nav from '../components/Nav.vue'
import Footer from '../components/Footer.vue'
import Number from '../../../node_modules/vue-number-animation/Number.vue'
export default {
    mixins: [mix],
    components: {
            Nav,
            Footer,
            Number
    },
    data() {
        return {
            loading: true,
            items: [
                 {
                text: 'Home',
                disabled: false,
                href: '/home',
                },
                {
                text: 'Our Offer',
                disabled: true,
                href: '/our-offer',
                },
            ],
            offer: [],
            offer_prd: [],
            offer_penawaran: [],
            page3: [],
            sub_page3: [],
            page4: [],
            sub_page5: [],
            page6: [],
            subpage6: []
        }
    },
    methods: {
        async loadData(){
            await axios.get('/api/offers/offer').then(res => {
                this.offer = res.data
            })

            await axios.get('/api/offers/offer_prd').then(res => {
                this.offer_prd = res.data
            })

            await axios.get('/api/offers/offer_penawaran').then(res => {
                this.offer_penawaran = res.data
            })

            await axios.get('/api/offers/page3').then(res => {
                this.page3 = res.data
            })

            await axios.get('/api/offers/sub_page3').then(res => {
                this.sub_page3 = res.data
            })

            await axios.get('/api/offers/page4').then(res => {
                this.page4 = res.data
            })

            await axios.get('/api/offers/sub_page5').then(res => {
                this.sub_page5 = res.data
            })

            await axios.get('/api/offers/page6').then(res => {
                this.page6 = res.data
            })
            
            await axios.get('/api/offers/sub_page6').then(res => {
                this.subpage6 = res.data
            })
            this.loading = false
        }
    },
    mounted() {
        this.loadData()
    },
    computed: {
        subpage3_left(){
            if(this.sub_page3.length > 0){
                return this.sub_page3.filter((item, i) => i < 2)
            }
        },
        subpage3_right(){
            if(this.sub_page3.length > 0){
                return this.sub_page3.filter((item, i) => i > 1)
            }
        }
    }
}
</script>