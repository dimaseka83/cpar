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
        <v-content class="bg-image" style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/sunflower-header.png);">
            <v-container class="fill-height py-16">
                <v-row class="justify-center">
                    <div> <h1 class="display-3 white--text">ABOUT US</h1> 
                    <div class="d-flex justify-center">
                        <v-breadcrumbs :items="items">
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
        <v-content  class="bg-image" style="background-image: url('/images/mission.png'); background-color: #262b2b;">
            <v-container class="my-16 white--text">
                <div v-if="nosm">
                    <v-row v-for="(ctcx, i) in mission" :key="'mission'+i">
                        <v-col>
                        <h1 class="display-3">{{ ctcx.title }}</h1>
                        <p class="font-weight-light">{{ ctcx.subtitle }}</p>
                        <p class="font-weight-light green--text" v-for="(ctc, i) in contact_select" :key="'ctc_select'+i">{{ ctc.text }}</p>
                        </v-col>
                        <v-col v-for="(content, idx) in ctcx.mission_content" :key="'ctc_mission'+idx">
                            <p class="font-weight-light">{{ content.text }}</p>
                        </v-col>
                    </v-row>
                </div>
                <div v-else>
                    <div v-for="(ctcx, i) in mission" :key="'mission1'+i">
                        <h1 class="display-3">{{ ctcx.title }}</h1>
                        <p class="font-weight-light">{{ ctcx.subtitle }}</p>
                        <p class="font-weight-light green--text" v-for="(ctc, i) in contact_select" :key="'ctc_select'+i">{{ ctc.text }}</p>
                        <v-row>
                            <v-col cols="12" v-for="(content, idx) in ctcx.mission_content" :key="'ctc_mission'+idx">
                            <p class="font-weight-light">{{ content.text }}</p>
                            </v-col>
                        </v-row>
                    </div>
                </div>
            </v-container>
        </v-content>
        <!-- Page 3 -->
        <v-content class="mt-n16 black--text" style="background-color: #EEEEEE;">
            <v-container>
                <div :class="nosm ? 'd-flex' : ''" v-for="(about, idx) in about_ceo" :key="'about_ceo'+idx">
                    <v-card :width="sm ? '100%' : 300">
                        <v-img :src="'./images/about/about_ceo/'+about.image" ></v-img>
                    </v-card>
                    <v-card class="mt-12" :height="nosm ? '300' : ''">
                        <v-card-text class="mx-auto">
                            <h1 class="display-2">{{ about.title }}</h1>
                            <p class="font-weight-light body-1">{{ about.subtitle }}</p>
                        </v-card-text>
                        <v-card-text class="mt-n5">
                            <p class="title font-weight-bold">{{ about.name_ceo }}</p>
                            <p class="subtitle font-weight-regular">{{ about.position_ceo }}</p>
                        </v-card-text>
                    </v-card>
                </div>
                <div :class="nosm ? 'd-flex flex-wrap-reverse' : ''" v-if="nosm">
                    <v-card class="rounded-circle mt-16 mx-auto transition-swing success" :height="nosm ? '200' : '100'" :width="nosm ? '20%' : '30%'" v-for="(prg, idx) in progress" :key="'prg'+idx" >
                        <v-card-title class="white--text justify-center mt-12" :class="nosm ? 'display-3' : 'h5-text pt-8'">
                            <number :from="0" :to="prg.number" :duration="2" easing="Power1.easeOut"/>
                        </v-card-title>
                    </v-card>
                    </div>
                <v-row class="mt-5" v-if="nosm">
                    <v-col v-for="(prg, idx) in progress" :key="'prg1'+idx" class="text-center">
                        <p class="font-weight-black text-h5">{{ prg.title }}</p>
                        <p class="font-weight-light">{{ prg.subtitle }}</p>
                    </v-col>
                </v-row>
                <v-row v-else class="mt-5">
                    <v-col cols="12" v-for="(prg2, idx) in progress" :key="'prg2'+idx" class="text-center">
                        <div class="d-flex justify-center">
                            <v-card class="rounded-circle success" height="100" width="30%">
                            <v-card-title class="white--text justify-center mt-5" :class="nosm ? 'display-3' : 'h5-text '">
                                <number :from="0" :to="prg2.number" :duration="2" easing="Power1.easeOut"/>
                            </v-card-title>
                        </v-card>
                        </div>
                        <p class="font-weight-black text-h5">{{ prg2.title }}</p>
                        <p class="font-weight-light">{{ prg2.subtitle }}</p>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 4 -->
        <v-content>
            <v-container class="my-16">
                <v-row>
                    <v-col>
                    <div v-for="(percntg, i) in product" :key="'percentage_products'+i">
                    <h1 class="display-3">{{ percntg.title }}</h1>
                    <p class="font-weight-light grey--text mt-5">{{ percntg.subtitle }}</p>
                    </div>
                        <v-row>
                            <v-col>
                                <div v-for="(prg, i) in percentage_products" :key="'percentage'+i">
                                    <div class="d-flex mt-5">
                                        <p class="font-weight-light">{{ prg.products }}</p>
                                        <v-spacer></v-spacer>
                                        <p class="font-weight-bold">{{ prg.percentage }}%</p>
                                    </div>
                                    <v-progress-linear
                                        :value="prg.percentage"
                                        color="green"
                                        ></v-progress-linear>
                                </div>
                            </v-col>     
                        </v-row>
                        <v-btn @click="menuklik('/our-products')" x-large class="success mt-16">explore more</v-btn>
                    </v-col>
                    <v-col>
                        <v-img src="https://agriwell.com/wp-content/uploads/2019/05/about-hand.png" :height="height"></v-img>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 5 -->
        <v-content class="bg-image" style="background-image: url('/images/services.png'); background-color: #262b2b;">
            <v-container class="my-16">
                <v-row class="justify-center">
                    <p class="display-3 white--text">Services</p>
                </v-row>
                <v-row>
                    <v-col :cols="nosm ? '4' : '12'" v-for="(sub, i) in services" :key="'sub_page3'+i">
                        <div class="d-flex justify-center">
                            <v-icon x-large color="green">{{ sub.icon }}</v-icon>
                        </div>
                        <p class="font-weight-regular mt-5 white--text text-center text-h5">{{ sub.title }}</p>
                        <p class="font-weight-light mt-5 white--text text-center body-2">{{ sub.subtitle }}</p>
                    </v-col>
                </v-row>
                <div class="d-flex justify-center">
                    <v-btn @click="menuklik('/our-offer')" x-large class="success mt-16">explore more</v-btn>
                </div>
            </v-container>
        </v-content>
        <!-- Page 6 -->
        <v-content>
            <v-container class="my-16">
                 <v-row class="justify-center">
                    <p class="display-3">{{ team.title }}</p>
                    <p class="font-weight-light grey--text">{{ team.subtitle }}</p>
                </v-row>
                <v-row>
                    <v-col :cols="nosm ? '3' : '12'" v-for="(tm, i) in team_detail" :key="'team_detail'+i">
                        <v-card :height="height - 300">
                            <v-img :src="'./images/about/team_detail/'+tm.image" :height="height - 300"></v-img>
                        </v-card>
                        <p class="font-weight-black mt-5 text-center text-h5">{{ tm.name }}</p>
                        <p class="font-weight-light mt-5 text-center text-h5">{{ tm.position }}</p>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <!-- Page 7 -->
        <v-content style="background-image: url(https://agriwell.com/wp-content/uploads/2019/05/people-say.png); background-color: #262b2b;">
                <v-container class="mb-16">
                    <p v-for="(pg, i) in page6" :key="i" v-text="pg.title"
                        class="display-3 white--text mt-16 text-center"></p>
                    <v-carousel :continuous="false" hide-delimiter-background delimiter-icon="mdi-minus">
                        <v-carousel-item v-for="(sub, i) in sub_page6" :key="'sub_page6'+i">
                            <v-sheet :height="height" color="transparent" class="text-center white--text">
                                <div class="my-10">
                                    <v-avatar size="200" :class="nosm ? '' : 'my-5' ">
                                        <img :src="'./images/home/subpage6/'+sub.image" :height="height" />
                                    </v-avatar>
                                </div>
                                <span >{{ sub.title }}</span>
                                <p class="mt-16"><span
                                        class="font-weight-bold text-h5">{{ sub.people_name }}</span> <br>
                                    {{ sub.people_position }}</p>
                            </v-sheet>
                        </v-carousel-item>
                    </v-carousel>
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
import axios from 'axios'
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
                text: 'About',
                disabled: true,
                href: '/about',
                },
            ],
            mission: [],
            about_ceo: {},
            progress: [],
            product: [],
            percentage_products: [],
            services: [],
            team: [],
            team_detail: [],
            page6: [],
            sub_page6: [],
        }
    },
    methods: {
        async loadData() {
            await axios.get('/api/about/mission').then(res => {
                this.mission = res.data
            })
            await axios.get('/api/about/about_ceo').then(res => {
                this.about_ceo = res.data
            })

            await axios.get('/api/home/progress').then(res => {
                this.progress = res.data
            })

            await axios.get('/api/about/products').then(res => {
                this.product = res.data
            })

            await axios.get('/api/about/percentage_products').then(res => {
                this.percentage_products = res.data
            })

            await axios.get('/api/home/services').then(res => {
                this.services = res.data
            })

            await axios.get('/api/about/team').then(res => {
                this.team = res.data
            })

            await axios.get('/api/about/team_details').then(res => {
                this.team_detail = res.data
            })

            await axios.get('/api/home/page6').then(res => {
                this.page6 = res.data
            })

            await axios.get('/api/home/sub_page6').then(res => {
                this.sub_page6 = res.data
            })

            this.loading = false
        }
    },
    mounted() {
        this.loadData()
    },
    computed: {
        contact_select(){
            return this.contact.filter((element, idx) => idx < 2)
        }
    },
}
</script>
<style>
    .bg-image {
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
    }
</style>