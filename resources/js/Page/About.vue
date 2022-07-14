<template>
    <v-app>
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
                <v-row v-if="nosm">
                    <v-col>
                        <h1 class="display-3">{{ mission.title }}</h1>
                <p class="font-weight-light">{{ mission.subtitle }}</p>
                <p class="font-weight-light green--text" v-for="(ctc, i) in contact_select" :key="'ctc_select'+i">{{ ctc.text }}</p>
                    </v-col>
                    <v-col v-for="(content, idx) in mission.content" :key="'ctc_mission'+idx">
                        <p class="font-weight-light">{{ content.text }}</p>
                    </v-col>
                </v-row>
                <div v-else>
                    <h1 class="display-3">{{ mission.title }}</h1>
                    <p class="font-weight-light">{{ mission.subtitle }}</p>
                    <p class="font-weight-light green--text" v-for="(ctc, i) in contact_select" :key="'ctc_select'+i">{{ ctc.text }}</p>
                    <v-row>
                        <v-col cols="12" v-for="(content, idx) in mission.content" :key="'ctc_mission'+idx">
                        <p class="font-weight-light">{{ content.text }}</p>
                        </v-col>
                    </v-row>
                </div>
            </v-container>
        </v-content>
        <!-- Page 3 -->
        <v-content class="mt-n16 black--text" style="background-color: #EEEEEE;">
            <v-container>
                <div :class="nosm ? 'd-flex' : ''">
                    <v-card :width="sm ? '100%' : 300">
                        <v-img :src="about_ceo.image" ></v-img>
                    </v-card>
                    <v-card class="mt-12" :height="nosm ? '300' : ''">
                        <v-card-text class="mx-auto">
                            <h1 class="display-2">{{ about_ceo.title }}</h1>
                            <p class="font-weight-light body-1">{{ about_ceo.subtitle }}</p>
                        </v-card-text>
                        <v-card-text class="mt-n5">
                            <p class="title font-weight-bold">{{ about_ceo.name_ceo }}</p>
                            <p class="subtitle font-weight-regular">{{ about_ceo.position_ceo }}</p>
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
                    <h1 class="display-3">{{ product.title }}</h1>
                    <p class="font-weight-light grey--text mt-5">{{ product.subtitle }}</p>
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
                        <v-btn x-large class="success mt-16">explore more</v-btn>
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
                    <v-btn x-large class="success mt-16">explore more</v-btn>
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
                            <v-img :src="tm.image" :height="height - 300"></v-img>
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
                <p v-for="(pg, i) in page6" :key="i" v-text="pg.title" class="display-3 white--text mt-16 text-center"></p>
                <v-carousel :continuous="false" hide-delimiter-background delimiter-icon="mdi-minus">
                    <v-carousel-item v-for="(sub, i) in sub_page6" :key="'sub_page6'+i">
                        <v-sheet :height="height" color="transparent" class="text-center white--text">
                        <v-row class="fill-height" align="center" justify="center">
                           <v-avatar size="200" :class="nosm ? '' : 'my-5' ">
                                <img :src="sub.image" :height="height" />
                           </v-avatar>
                           <span :class="nosm ? 'mt-n16 mx-16 title' : '' ">{{ sub.title }}</span>
                           <p :class="nosm ? 'mt-n16 pt-n16' : 'mt-16' "><span class="font-weight-bold text-h5">{{ sub.people_name }}</span> <br> {{ sub.people_position }}</p>
                        </v-row>
                        </v-sheet>
                    </v-carousel-item>
                </v-carousel>
            </v-container>
        </v-content>
        <Footer/>
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
            mission: {
                title: 'Our Mission',
                subtitle: 'We help farmers switch from conventional farming to organic farming.',
                content: [{
                    text: 'We are systematically building a vertically integrated business model that allows our customers to plan their future crops and control quality, thereby guaranteeing stable volumes of certified organic products.',
                },{
                    text: 'We advise and train farmers on planning, storage, seed selection, equipment, pest and weed control, best practices, risk management, technology, organic certification, and marketing.'
                }]
            },
            about_ceo: {
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                title: 'Organic Farming is not just a trend – it’s the future!',
                subtitle: 'Direct contacts with farmers and farms helped build a bridge between the West and the East. Only being in fields can let you understand the problems of farmers, agricultural producers and the requirements of the market in which they want to bring their products.',
                name_ceo: 'Valery Kuznetsov',
                position_ceo: 'CEO',
            },
            progress: [{
                number: '10',
                title: 'Over 10 Years on the Market',
                subtitle: 'We have been exporting and importing agricultural goods in the EU for over a decade.'
            },{
                number: '26',
                title: 'Over 26.000 Tonnes of Goods',
                subtitle: 'We imported over 26.000 tonnes of goods to the EU from CIS countries in the 2019–2020 harvest year.'
            },{
                number: '54',
                title: 'Over 54.000 Hectares of Land',
                subtitle: 'We use vast amounts of land for growing organic cultures in conjunction with our farmers.'
            },{
                number: '20',
                title: 'Over 20 Farms in Our Group',
                subtitle: 'Farms in 6 countries participate in our projects.'
            }],
            product: {
                title: 'Our Products',
                subtitle: 'During the harvest period of 2019–2020, we produced, shipped, delivered, and sold first-class certified organic raw materials:',
            },
            percentage_products: [{
                products: 'Oilseeds',
                percentage: 80
            },{
                products: 'Grains',
                percentage: 4.5
            },{
                products: 'Pulses',
                percentage: 1.5
            },{
                products: 'Other Products',
                percentage: 3
            }],
            services: [{
                icon: 'mdi-biohazard',
                title: 'BIO Certification',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            },
            {
                icon: 'mdi-barn',
                title: 'Organic Farming',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            },
            {
                icon: 'mdi-warehouse',
                title: 'Warehousing & Storage',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            },
            {
                icon: 'mdi-biohazard',
                title: 'BIO Certification',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            },
            {
                icon: 'mdi-barn',
                title: 'Organic Farming',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            },
            {
                icon: 'mdi-warehouse',
                title: 'Warehousing & Storage',
                subtitle: 'We provide informational support and we prepare and collect required documents and certificates for organic farming.'
            }],
            team: {
                title: 'The Best Team',
                subtitle: 'The most important asset our company has is our team of professionals, all of whom share the same goals and views: for healthy organic nutrition and improving the environmental situation worldwide.'
            },
            team_detail: [{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            },{
                image: 'https://agriwell.com/wp-content/uploads/2019/09/valery.png',
                name: 'Valery Kuznetsov',
                position: 'CEO',
            }],
                        page6: [{
                title : 'What People Say'
            }],
            sub_page6: [{
                image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80',
                title: '“Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quisquam ipsa reiciendis amet quas, vel quam dolorum omnis vitae quia fugiat a dolore, corrupti consectetur, reprehenderit nemo doloremque quis accusantium.”',
                people_name: 'John Doe',
                people_position: 'CEO'
            },{
                image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80',
                title: '“Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quisquam ipsa reiciendis amet quas, vel quam dolorum omnis vitae quia fugiat a dolore, corrupti consectetur, reprehenderit nemo doloremque quis accusantium.”',
                people_name: 'John Doe',
                people_position: 'CEO'
            },{
                image: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80',
                title: '“Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quisquam ipsa reiciendis amet quas, vel quam dolorum omnis vitae quia fugiat a dolore, corrupti consectetur, reprehenderit nemo doloremque quis accusantium.”',
                people_name: 'John Doe',
                people_position: 'CEO'
            }],
        }
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